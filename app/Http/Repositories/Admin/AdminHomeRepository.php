<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminHomeInterface;
use App\Models\Contact;

class AdminHomeRepository implements AdminHomeInterface
{

    public function index()
    {
        $contacts = Contact::select(['id', 'name', 'subject', 'status', 'created_at'])->orderBy('created_at')->get();
        $latest_contacts = $contacts->take(3);
        $count_of_approved = $contacts->where('status', 'Approved')->count();
        $count_of_rejected = $contacts->where('status', 'Rejected')->count();
        $count_of_in_progress = $contacts->where('status', 'In Progress')->count();
        $count_of_pending = $contacts->where('status', 'Pending')->count();
        return view('admin.index', compact('contacts', 'latest_contacts', 'count_of_approved', 'count_of_rejected', 'count_of_pending', 'count_of_in_progress'));
    }

    public function pageNotFound()
    {
        return view('admin.pages.404');
    }
}
