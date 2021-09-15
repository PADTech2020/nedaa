<?php

namespace Botble\AutoReloadPosts\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\AutoReloadPosts\Http\Requests\AutoReloadPostsRequest;
use Botble\AutoReloadPosts\Repositories\Interfaces\AutoReloadPostsInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\AutoReloadPosts\Tables\AutoReloadPostsTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\AutoReloadPosts\Forms\AutoReloadPostsForm;
use Botble\Base\Forms\FormBuilder;

class AutoReloadPostsController extends BaseController
{
    /**
     * @var AutoReloadPostsInterface
     */
    protected $autoReloadPostsRepository;

    /**
     * @param AutoReloadPostsInterface $autoReloadPostsRepository
     */
    public function __construct(AutoReloadPostsInterface $autoReloadPostsRepository)
    {
        $this->autoReloadPostsRepository = $autoReloadPostsRepository;
    }

    /**
     * @param AutoReloadPostsTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(AutoReloadPostsTable $table)
    {
        page_title()->setTitle(trans('plugins/auto-reload-posts::auto-reload-posts.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/auto-reload-posts::auto-reload-posts.create'));

        return $formBuilder->create(AutoReloadPostsForm::class)->renderForm();
    }

    /**
     * @param AutoReloadPostsRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(AutoReloadPostsRequest $request, BaseHttpResponse $response)
    {
        $autoReloadPosts = $this->autoReloadPostsRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(AUTO_RELOAD_POSTS_MODULE_SCREEN_NAME, $request, $autoReloadPosts));

        return $response
            ->setPreviousUrl(route('auto-reload-posts.index'))
            ->setNextUrl(route('auto-reload-posts.edit', $autoReloadPosts->id))
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
        $autoReloadPosts = $this->autoReloadPostsRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $autoReloadPosts));

        page_title()->setTitle(trans('plugins/auto-reload-posts::auto-reload-posts.edit') . ' "' . $autoReloadPosts->name . '"');

        return $formBuilder->create(AutoReloadPostsForm::class, ['model' => $autoReloadPosts])->renderForm();
    }

    /**
     * @param $id
     * @param AutoReloadPostsRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, AutoReloadPostsRequest $request, BaseHttpResponse $response)
    {
        $autoReloadPosts = $this->autoReloadPostsRepository->findOrFail($id);

        $autoReloadPosts->fill($request->input());

        $this->autoReloadPostsRepository->createOrUpdate($autoReloadPosts);

        event(new UpdatedContentEvent(AUTO_RELOAD_POSTS_MODULE_SCREEN_NAME, $request, $autoReloadPosts));

        return $response
            ->setPreviousUrl(route('auto-reload-posts.index'))
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
            $autoReloadPosts = $this->autoReloadPostsRepository->findOrFail($id);

            $this->autoReloadPostsRepository->delete($autoReloadPosts);

            event(new DeletedContentEvent(AUTO_RELOAD_POSTS_MODULE_SCREEN_NAME, $request, $autoReloadPosts));

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
            $autoReloadPosts = $this->autoReloadPostsRepository->findOrFail($id);
            $this->autoReloadPostsRepository->delete($autoReloadPosts);
            event(new DeletedContentEvent(AUTO_RELOAD_POSTS_MODULE_SCREEN_NAME, $request, $autoReloadPosts));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
