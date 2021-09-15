<?php

namespace Botble\AutoReloadPosts\Tables;

use Auth;
use BaseHelper;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\AutoReloadPosts\Repositories\Interfaces\AutoReloadPostsInterface;
use Botble\Table\Abstracts\TableAbstract;
use Illuminate\Contracts\Routing\UrlGenerator;
use Yajra\DataTables\DataTables;
use Botble\AutoReloadPosts\Models\AutoReloadPosts;
use Html;

class AutoReloadPostsTable extends TableAbstract
{

    /**
     * @var bool
     */
    protected $hasActions = true;

    /**
     * @var bool
     */
    protected $hasFilter = true;

    /**
     * AutoReloadPostsTable constructor.
     * @param DataTables $table
     * @param UrlGenerator $urlGenerator
     * @param AutoReloadPostsInterface $autoReloadPostsRepository
     */
    public function __construct(DataTables $table, UrlGenerator $urlGenerator, AutoReloadPostsInterface $autoReloadPostsRepository)
    {
        $this->repository = $autoReloadPostsRepository;
        $this->setOption('id', 'plugins-auto-reload-posts-table');
        parent::__construct($table, $urlGenerator);

        if (!Auth::user()->hasAnyPermission(['auto-reload-posts.edit', 'auto-reload-posts.destroy'])) {
            $this->hasOperations = false;
            $this->hasActions = false;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function ajax()
    {
        $data = $this->table
            ->eloquent($this->query())
            ->editColumn('name', function ($item) {
                if (!Auth::user()->hasPermission('auto-reload-posts.edit')) {
                    return $item->name;
                }
                return Html::link(route('auto-reload-posts.edit', $item->id), $item->name);
            })
            ->editColumn('checkbox', function ($item) {
                return $this->getCheckbox($item->id);
            })
            ->editColumn('created_at', function ($item) {
                return BaseHelper::formatDate($item->created_at);
            })
            ->editColumn('status', function ($item) {
                return $item->status->toHtml();
            });

        return apply_filters(BASE_FILTER_GET_LIST_DATA, $data, $this->repository->getModel())
            ->addColumn('operations', function ($item) {
                return $this->getOperations('auto-reload-posts.edit', 'auto-reload-posts.destroy', $item);
            })
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * {@inheritDoc}
     */
    public function query()
    {
        $model = $this->repository->getModel();
        $select = [
            'auto_reload_posts.id',
            'auto_reload_posts.name',
            'auto_reload_posts.created_at',
            'auto_reload_posts.status',
        ];

        $query = $model->select($select);

        return $this->applyScopes(apply_filters(BASE_FILTER_TABLE_QUERY, $query, $model, $select));
    }

    /**
     * {@inheritDoc}
     */
    public function columns()
    {
        return [
            'id' => [
                'name'  => 'auto_reload_posts.id',
                'title' => trans('core/base::tables.id'),
                'width' => '20px',
            ],
            'name' => [
                'name'  => 'auto_reload_posts.name',
                'title' => trans('core/base::tables.name'),
                'class' => 'text-left',
            ],
            'created_at' => [
                'name'  => 'auto_reload_posts.created_at',
                'title' => trans('core/base::tables.created_at'),
                'width' => '100px',
            ],
            'status' => [
                'name'  => 'auto_reload_posts.status',
                'title' => trans('core/base::tables.status'),
                'width' => '100px',
            ],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function buttons()
    {
        $buttons = $this->addCreateButton(route('auto-reload-posts.create'), 'auto-reload-posts.create');

        return apply_filters(BASE_FILTER_TABLE_BUTTONS, $buttons, AutoReloadPosts::class);
    }

    /**
     * {@inheritDoc}
     */
    public function bulkActions(): array
    {
        return $this->addDeleteAction(route('auto-reload-posts.deletes'), 'auto-reload-posts.destroy', parent::bulkActions());
    }

    /**
     * {@inheritDoc}
     */
    public function getBulkChanges(): array
    {
        return [
            'auto_reload_posts.name' => [
                'title'    => trans('core/base::tables.name'),
                'type'     => 'text',
                'validate' => 'required|max:120',
            ],
            'auto_reload_posts.status' => [
                'title'    => trans('core/base::tables.status'),
                'type'     => 'select',
                'choices'  => BaseStatusEnum::labels(),
                'validate' => 'required|in:' . implode(',', BaseStatusEnum::values()),
            ],
            'auto_reload_posts.created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'type'  => 'date',
            ],
        ];
    }

    /**
     * @return array
     */
    public function getFilters(): array
    {
        return $this->getBulkChanges();
    }
}
