<?php

namespace Botble\Rss\Tables;

use Auth;
use BaseHelper;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Rss\Repositories\Interfaces\RssInterface;
use Botble\Table\Abstracts\TableAbstract;
use Illuminate\Contracts\Routing\UrlGenerator;
use Yajra\DataTables\DataTables;
use Botble\Rss\Models\Rss;
use Html;

class RssTable extends TableAbstract
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
     * RssTable constructor.
     * @param DataTables $table
     * @param UrlGenerator $urlGenerator
     * @param RssInterface $rssRepository
     */
    public function __construct(DataTables $table, UrlGenerator $urlGenerator, RssInterface $rssRepository)
    {
        $this->repository = $rssRepository;
        $this->setOption('id', 'plugins-rss-table');
        parent::__construct($table, $urlGenerator);

        if (!Auth::user()->hasAnyPermission(['rss.edit', 'rss.destroy'])) {
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
                if (!Auth::user()->hasPermission('rss.edit')) {
                    $html='<img width="150" src="'.$item->imageUrl.'"/><br>'.$item->name;
                    return $html;
                }
                $html='<img width="120" src="'.$item->imageUrl.'"/><br>'.$item->name.'<br><a target="_blank" href="'.$item->url.'">Read More</a>';
                return $html;
//                return Html::link(route('rss.edit', $item->id), $item->name);
            })

            ->editColumn('checkbox', function ($item) {
                return $this->getCheckbox($item->id);
            })
         ;

        return apply_filters(BASE_FILTER_GET_LIST_DATA, $data, $this->repository->getModel())
            ->addColumn('operations', function ($item) {
                return $this->getOperations('rss.edit', 'rss.destroy', $item);
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
            'rss.id',
            'rss.imageUrl',
            'rss.name',
            'rss.description',
            'rss.src',
            'rss.url',
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
                'name'  => 'rss.id',
                'title' => trans('core/base::tables.id'),
                'width' => '20px',
            ],
            'name' => [
                'name'  => 'rss.name',
                'title' => trans('core/base::tables.name'),
                'class' => 'text-left',
            ],
            'description' => [
                'name'  => 'rss.description',
                'title' => trans('Description'),
                'class' => 'text-left',
            ],
            'src' => [
                'name'  => 'rss.src',
                'title' => trans('Sources'),
                'class' => 'text-left',
            ],



        ];
    }

    /**
     * {@inheritDoc}
     */
    public function buttons()
    {
        $buttons = $this->addCreateButton(route('rss.create'), 'rss.create');

        return apply_filters(BASE_FILTER_TABLE_BUTTONS, $buttons, Rss::class);
    }

    /**
     * {@inheritDoc}
     */
    public function bulkActions(): array
    {
        return $this->addDeleteAction(route('rss.deletes'), 'rss.destroy', parent::bulkActions());
    }

    /**
     * {@inheritDoc}
     */
    public function getBulkChanges(): array
    {
        return [
            'rss.name' => [
                'title'    => trans('core/base::tables.name'),
                'type'     => 'text',
                'validate' => 'required|max:120',
            ],
            'rss.src' => [
                'title'    => trans('src'),
                'type'     => 'text',
                'validate' => 'required|max:120',
            ],
            'rss.status' => [
                'title'    => trans('core/base::tables.status'),
                'type'     => 'select',
                'choices'  => BaseStatusEnum::labels(),
                'validate' => 'required|in:' . implode(',', BaseStatusEnum::values()),
            ],
            'rss.created_at' => [
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
