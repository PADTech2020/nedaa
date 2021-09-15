<?php

namespace Botble\Subscribe\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Subscribe\Http\Requests\SubscribeRequest;
use Botble\Subscribe\Repositories\Interfaces\SubscribeInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Subscribe\Tables\SubscribeTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Subscribe\Forms\SubscribeForm;
use Botble\Base\Forms\FormBuilder;

class SubscribeController extends BaseController
{
    /**
     * @var SubscribeInterface
     */
    protected $subscribeRepository;

    /**
     * @param SubscribeInterface $subscribeRepository
     */
    public function __construct(SubscribeInterface $subscribeRepository)
    {
        $this->subscribeRepository = $subscribeRepository;
    }

    /**
     * @param SubscribeTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(SubscribeTable $table)
    {
        page_title()->setTitle(trans('plugins/subscribe::subscribe.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/subscribe::subscribe.create'));

        return $formBuilder->create(SubscribeForm::class)->renderForm();
    }

    /**
     * @param SubscribeRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(SubscribeRequest $request, BaseHttpResponse $response)
    {
        $subscribe = $this->subscribeRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(SUBSCRIBE_MODULE_SCREEN_NAME, $request, $subscribe));

        return $response
            ->setPreviousUrl(route('subscribe.index'))
            ->setNextUrl(route('subscribe.edit', $subscribe->id))
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
        $subscribe = $this->subscribeRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $subscribe));

        page_title()->setTitle(trans('plugins/subscribe::subscribe.edit') . ' "' . $subscribe->name . '"');

        return $formBuilder->create(SubscribeForm::class, ['model' => $subscribe])->renderForm();
    }

    /**
     * @param $id
     * @param SubscribeRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, SubscribeRequest $request, BaseHttpResponse $response)
    {
        $subscribe = $this->subscribeRepository->findOrFail($id);

        $subscribe->fill($request->input());

        $this->subscribeRepository->createOrUpdate($subscribe);

        event(new UpdatedContentEvent(SUBSCRIBE_MODULE_SCREEN_NAME, $request, $subscribe));

        return $response
            ->setPreviousUrl(route('subscribe.index'))
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
            $subscribe = $this->subscribeRepository->findOrFail($id);

            $this->subscribeRepository->delete($subscribe);

            event(new DeletedContentEvent(SUBSCRIBE_MODULE_SCREEN_NAME, $request, $subscribe));

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
            $subscribe = $this->subscribeRepository->findOrFail($id);
            $this->subscribeRepository->delete($subscribe);
            event(new DeletedContentEvent(SUBSCRIBE_MODULE_SCREEN_NAME, $request, $subscribe));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
