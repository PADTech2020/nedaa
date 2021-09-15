<?php

namespace Botble\Subscribe\Tables;

use Auth;
use BaseHelper;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Subscribe\Repositories\Interfaces\SubscribeInterface;
use Botble\Table\Abstracts\TableAbstract;
use Illuminate\Contracts\Routing\UrlGenerator;
use Yajra\DataTables\DataTables;
use Botble\Subscribe\Models\Subscribe;
use Html;

class SubscribeTable extends TableAbstract
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
     * SubscribeTable constructor.
     * @param DataTables $table
     * @param UrlGenerator $urlGenerator
     * @param SubscribeInterface $subscribeRepository
     */
    public function __construct(DataTables $table, UrlGenerator $urlGenerator, SubscribeInterface $subscribeRepository)
    {
        $this->repository = $subscribeRepository;
        $this->setOption('id', 'plugins-subscribe-table');
        parent::__construct($table, $urlGenerator);

        if (!Auth::user()->hasAnyPermission(['subscribe.edit', 'subscribe.destroy'])) {
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
            ->editColumn('email', function ($item) {
                if (!Auth::user()->hasPermission('subscribe.edit')) {
                    return $item->email;
                }
                return Html::link(route('subscribe.edit', $item->id), $item->email);
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
                return $this->getOperations('subscribe.edit', 'subscribe.destroy', $item);
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
            'subscribes.id',
            'subscribes.email',
            'subscribes.created_at',
            'subscribes.status',
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
                'name'  => 'subscribes.id',
                'title' => trans('core/base::tables.id'),
                'width' => '20px',
            ],
            'email' => [
                'name'  => 'subscribes.email',
                'title' => trans('core/base::tables.email'),
                'class' => 'text-left',
            ],
            'created_at' => [
                'name'  => 'subscribes.created_at',
                'title' => trans('core/base::tables.created_at'),
                'width' => '100px',
            ],
            'status' => [
                'name'  => 'subscribes.status',
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
        $buttons = $this->addCreateButton(route('subscribe.create'), 'subscribe.create');

        return apply_filters(BASE_FILTER_TABLE_BUTTONS, $buttons, Subscribe::class);
    }

    /**
     * {@inheritDoc}
     */
    public function bulkActions(): array
    {
        return $this->addDeleteAction(route('subscribe.deletes'), 'subscribe.destroy', parent::bulkActions());
    }

    /**
     * {@inheritDoc}
     */
    public function getBulkChanges(): array
    {
        return [
            'subscribes.email' => [
                'title'    => trans('core/base::tables.email'),
                'type'     => 'text',
                'validate' => 'required|max:120',
            ],
            'subscribes.status' => [
                'title'    => trans('core/base::tables.status'),
                'type'     => 'select',
                'choices'  => BaseStatusEnum::labels(),
                'validate' => 'required|in:' . implode(',', BaseStatusEnum::values()),
            ],
            'subscribes.created_at' => [
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
