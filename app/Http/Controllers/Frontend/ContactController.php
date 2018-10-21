<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Contact\StoreRequest;
use App\Jobs\ContactEmailSent;
use App\Mail\SendContactEmail;
use App\Mail\SendThanksContactEmail;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Torann\LaravelMetaTags\Facades\MetaTag;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        MetaTag::set('title', 'Contact us - ' . config('app_name'));
        MetaTag::set('keywords', 'tea, turmeric, ginger, sugar, sweet, pure, natural');
        MetaTag::set('description', config('settings.app_slogan', 'Sell khmer natural products..'));
        MetaTag::set('image', asset('storage/default/ico/android-icon-192x192.png'));
        return view('frontend.contact.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function store(StoreRequest $request)
    {
        DB::beginTransaction();
        $object = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'message' => $request->get('message'),
            'subject' => $request->get('subject')
        ];
        $contact = new Contact(array_filter($object));
        $contact = $contact->save();
        // dispatch(new ContactEmailSent($object));
        if ($contact) {
            Mail::to(config('settings.app_email'))->send(new SendContactEmail($object));
            Mail::to($object['email'])->send(new SendThanksContactEmail());
        }
        DB::commit();
        return redirect()->back()->with('success', 'Thanks for contacting us!');
    }
}
