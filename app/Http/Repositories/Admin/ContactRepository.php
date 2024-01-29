<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\ContactInterface;
use App\Models\Contact;

class ContactRepository implements ContactInterface
{

    public function index()
    {
        $contacts = Contact::select(['id', 'name', 'email', 'phone', 'subject', 'message', 'status'])->paginate(5);
        confirmDelete(__('Delete Contact !'), __('Are you sure you want to delete?'));
        return view('admin.pages.contact.index', compact('contacts'));
    }

    public function delete($id)
    {
        $contact = Contact::where([
            ['status', 'Approved'],
            ['id', base64_decode($id)]
        ])->first();
        if ($contact) {
            $contact->delete();
            toast(__('Contact Was Deleted Successfully'), 'success');
            return back();
        }
        toast(__("Sorry, Can't Delete This Contact Record Before Be Approved"), 'error');
        return back();
    }

    public function edit($id)
    {
        $contact = Contact::select(['id', 'name', 'email', 'phone', 'subject', 'message', 'status'])->find(base64_decode($id));
        if ($contact) {
            return view('admin.pages.contact.form', compact('contact'));
        }
        toast(__("Sorry, Can't Contact Found"), 'error');
        return back();
    }

    public function update($request)
    {
        Contact::find($request->id)->update([
            'status' => $request->status
        ]);
        toast('Contact Was Updated Successfully', 'success');
        return redirect(route('admin.contact.index'));
    }
}
