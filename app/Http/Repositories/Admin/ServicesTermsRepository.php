<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\ServicesTermsInterface;
use App\Models\ServiceTerm;

class ServicesTermsRepository implements ServicesTermsInterface
{

    public function index()
    {
        $services_terms = ServiceTerm::select(['id', 'service'])->get();
        confirmDelete(__('Delete Services Terms !'), __('Are you sure you want to delete?'));
        return view('admin.pages.terms.index', compact('services_terms'));
    }

    public function create()
    {
        return view('admin.pages.terms.form');
    }

    public function store($request)
    {
        ServiceTerm::create([
            'service' => [
                'en' => $request->service_en,
                'ar' => $request->service_ar,
            ]
        ]);
        toast(__('Services Terms Was Created Successfully'), 'success');
        return redirect(route('admin.services.terms.index'));
    }

    public function delete($id)
    {
        ServiceTerm::select('id')->find(base64_decode($id))->delete();
        toast(__('Services Terms Was Deleted Successfully'), 'success');
        return back();
    }

    public function edit($id)
    {
        $service_term = ServiceTerm::select('id', 'service')->find(base64_decode($id));
        if ($service_term) {
            return view('admin.pages.terms.form', compact('service_term'));
        }
        toast(__("Sorry, Can't Services Terms Found"), 'error');
        return back();
    }

    public function update($request)
    {
        ServiceTerm::find($request->id)->update([
            'service' => [
                'en' => $request->service_en,
                'ar' => $request->service_ar,
            ]
        ]);
        toast(__('Services Terms Was Updated Successfully'), 'success');
        return redirect(route('admin.services.terms.index'));
    }
}
