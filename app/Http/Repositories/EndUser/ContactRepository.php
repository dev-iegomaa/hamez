<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\ContactInterface;
use App\Models\Contact;

class ContactRepository implements ContactInterface
{

    public function index()
    {
        return view('endUser.pages.contact');
    }

    public function store($request)
    {
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => 'Pending'
        ]);
        toast('Contact Request Is Sent Successfully', 'success');
        return back();
    }
}
