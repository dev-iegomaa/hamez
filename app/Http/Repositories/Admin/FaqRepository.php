<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\FaqInterface;
use App\Models\Faq;

class FaqRepository implements FaqInterface
{

    public function index()
    {
        $faqs = Faq::select(['id', 'question', 'answer'])->get();
        confirmDelete(__('Delete Faq !'), __('Are you sure you want to delete?'));
        return view('admin.pages.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.pages.faq.form');
    }

    public function store($request)
    {
        Faq::create([
            'question' => [
                'en' => $request->question_en,
                'ar' => $request->question_ar,
            ],
            'answer' => [
                'en' => $request->answer_en,
                'ar' => $request->answer_ar,
            ]
        ]);
        toast(__('Faq Was Created Successfully'), 'success');
        return redirect(route('admin.faq.index'));
    }

    public function delete($id)
    {
        Faq::select('id')->find(base64_decode($id))->delete();
        toast(__('Faq Was Deleted Successfully'), 'success');
        return back();
    }

    public function edit($id)
    {
        $faq = Faq::select('id', 'question', 'answer')->find(base64_decode($id));
        if ($faq) {
            return view('admin.pages.faq.form', compact('faq'));
        }
        toast(__("Sorry, Can't Faq Found"), 'error');
        return back();
    }

    public function update($request)
    {
        Faq::find($request->id)->update([
            'question' => [
                'en' => $request->question_en,
                'ar' => $request->question_ar,
            ],
            'answer' => [
                'en' => $request->answer_en,
                'ar' => $request->answer_ar,
            ]
        ]);
        toast(__('Faq Was Updated Successfully'), 'success');
        return redirect(route('admin.faq.index'));
    }
}
