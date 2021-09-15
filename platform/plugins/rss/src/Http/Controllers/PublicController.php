<?php

namespace Botble\Rss\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Rss\Http\Requests\RssRequest;
use Botble\Rss\Models\Rss;
use Botble\Rss\Repositories\Interfaces\RssInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Rss\Tables\RssTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Rss\Forms\RssForm;
use Botble\Base\Forms\FormBuilder;

class PublicController extends BaseController
{
    /**
     * @var RssInterface
     */
    protected $rssRepository;

    /**
     * @param RssInterface $rssRepository
     */
    public function __construct(RssInterface $rssRepository)
    {
        $this->rssRepository = $rssRepository;
    }

    /**
     * @param RssTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index()
    {
//        page_title()->setTitle(trans('plugins/rss::rss.name'));

//        return $table->renderTable();
    }

    public function Rss()
    {
        Rss::GetRSS('google-news-sa');
        Rss::GetRSS('sabq');
        Rss::GetRSS('argaam');
        Rss::GetRSS('al-jazeera-english');
    }
}
