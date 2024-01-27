<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Contact\DeleteContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::select(['id', 'name', 'email', 'phone', 'subject', 'message', 'status'])->get();
        return view('admin.pages.contact.index', compact('contacts'));
    }

    public function delete(DeleteContactRequest $request)
    {
        $contact = Contact::where([
            ['status', 'Approved'],
            ['id', $request->id]
        ])->first();
        if ($contact) {
            $contact->delete();
            toast('Contact Was Deleted Successfully', 'success');
            return back();
        }
        toast('Sorry, Can\'t Delete This Contact Record', 'error');
        return back();
    }
}
