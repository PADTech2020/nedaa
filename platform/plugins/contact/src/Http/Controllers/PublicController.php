<?php

namespace Botble\Contact\Http\Controllers;

use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Contact\Events\SentContactEvent;
use Botble\Contact\Http\Requests\ContactRequest;
use Botble\Contact\Repositories\Interfaces\ContactInterface;
use EmailHandler;
use Exception;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * @var ContactInterface
     */
    protected $contactRepository;

    /**
     * @param ContactInterface $contactRepository
     */
    public function __construct(ContactInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    /**
     * @param ContactRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws \Throwable
     */
    public function postSendContact(ContactRequest $request, BaseHttpResponse $response)
    {
        try {
            $contact = $this->contactRepository->getModel();
            $contact->fill($request->input());
            $this->contactRepository->createOrUpdate($contact);

            event(new SentContactEvent($contact));

            EmailHandler::setModule(CONTACT_MODULE_SCREEN_NAME)
                ->setVariableValues([
                    'contact_name' => $contact->name ?? 'N/A',
                    'contact_subject' => $contact->subject ?? 'N/A',
                    'contact_email' => $contact->email ?? 'N/A',
                    'contact_phone' => $contact->phone ?? 'N/A',
                    'contact_address' => $contact->address ?? 'N/A',
                    'contact_content' => $contact->content ?? 'N/A',
                ])
                ->sendUsingTemplate('notice');

            return $response->setMessage(__('Send message successfully!'));
        } catch (Exception $exception) {
            info($exception->getMessage());
            return $response
                ->setError()
                ->setMessage(trans('plugins/contact::contact.email.failed'));
        }
    }

    public function subscribe(Request $request, BaseHttpResponse $response)
    {
        $getUserByEmail = DB::table('subscribes')->where('email', $request->input('email'))->first();
//        DB::insert('insert into student (name) values(?)',[$name]);
        if (!$getUserByEmail) {
            $res = DB::table('subscribes')->insert(
                array(
                    // 'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    // 'phone' => $request->input('phone'),
                    // 'address' => $request->input('address'),
                    // 'subject' => $request->input('subject'),
                    // 'content' => $request->input('content'),
//                'date'   =>  date("Y-m-d H:i:s"),
                )
            );
            return $response->setMessage(__('شكرا لك, لقد قمنا بتسجيل بريدك الإلكتروني.'));
        } else {
            return $response->setMessage(__('لقد قمت بالتسجيل  مسبقا.'));
        }

    }
}
