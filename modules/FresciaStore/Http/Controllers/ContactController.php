<?php

namespace Modules\FresciaStore\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Modules\FresciaStore\Emails\ContactMailer;
use Modules\FresciaStore\Http\Requests\ContactRequest;
use Modules\FresciaStore\Services\ConfigService;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function view()
    {
        return view('fresciastore::pages.contact');
    }

    public function send(ContactRequest $request)
    {
        $data = $request->all();
        Mail::to((new ConfigService())->getCompanyData()->email_contact)->send(new ContactMailer($data));
        // Flash a success message to the session
        $request->session()->flash('status', 'Email trimis cu succes!');
        // Then return a redirect or a view
        return redirect()->back();
    }
}
