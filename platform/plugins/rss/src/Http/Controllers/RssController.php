<?php

namespace Botble\Rss\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Rss\Http\Requests\RssRequest;
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

class RssController extends BaseController
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
    public function index(RssTable $table)
    {
        page_title()->setTitle(trans('plugins/rss::rss.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/rss::rss.create'));

        return $formBuilder->create(RssForm::class)->renderForm();
    }

    /**
     * @param RssRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(RssRequest $request, BaseHttpResponse $response)
    {
        $rss = $this->rssRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(RSS_MODULE_SCREEN_NAME, $request, $rss));

        return $response
            ->setPreviousUrl(route('rss.index'))
            ->setNextUrl(route('rss.edit', $rss->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function edit($id, FormBuilder $formBuilder, Request $request)
    {
        $rss = $this->rssRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $rss));

        page_title()->setTitle(trans('plugins/rss::rss.edit') . ' "' . $rss->name . '"');

        return $formBuilder->create(RssForm::class, ['model' => $rss])->renderForm();
    }

    /**
     * @param $id
     * @param RssRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, RssRequest $request, BaseHttpResponse $response)
    {
        $rss = $this->rssRepository->findOrFail($id);

        $rss->fill($request->input());

        $this->rssRepository->createOrUpdate($rss);

        event(new UpdatedContentEvent(RSS_MODULE_SCREEN_NAME, $request, $rss));

        return $response
            ->setPreviousUrl(route('rss.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function destroy(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $rss = $this->rssRepository->findOrFail($id);

            $this->rssRepository->delete($rss);

            event(new DeletedContentEvent(RSS_MODULE_SCREEN_NAME, $request, $rss));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage($exception->getMessage());
        }
    }

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws Exception
     */
    public function deletes(Request $request, BaseHttpResponse $response)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $rss = $this->rssRepository->findOrFail($id);
            $this->rssRepository->delete($rss);
            event(new DeletedContentEvent(RSS_MODULE_SCREEN_NAME, $request, $rss));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
