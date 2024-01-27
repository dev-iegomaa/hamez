<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Faq\DeleteFaqRequest;
use App\Http\Requests\Admin\Faq\FaqRequest;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::select(['id', 'question', 'answer'])->get();
        return view('admin.pages.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.pages.faq.form');
    }

    public function store(FaqRequest $request)
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
        toast('Faq Was Created Successfully', 'success');
        return redirect(route('admin.faq.index'));
    }

    public function delete(DeleteFaqRequest $request)
    {
        Faq::select('id')->find($request->id)->delete();
        toast('Faq Was Deleted Successfully', 'success');
        return back();
    }

    public function edit($id)
    {
        $faq = Faq::select('id', 'question', 'answer')->find(base64_decode($id));
        if ($faq) {
            return view('admin.pages.faq.form', compact('faq'));
        }
        toast('Sorry, Can\'t Faq Found', 'error');
        return back();
    }

    public function update(FaqRequest $request)
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
        toast('Faq Was Updated Successfully', 'success');
        return redirect(route('admin.faq.index'));
    }
}
