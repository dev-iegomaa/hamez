<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Service\DeleteServiceRequest;
use App\Http\Requests\Admin\Service\ServiceRequest;
use App\Models\Category;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::select(['id', 'title', 'price', 'description', 'category_id'])->get();
        return view('admin.pages.service.index', compact('services'));
    }

    public function create()
    {
        $categories = Category::select(['id', 'title'])->get();
        return view('admin.pages.service.form', compact('categories'));
    }

    public function store(ServiceRequest $request)
    {
        Service::create([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar
            ],
            'description' => [
                'en' => $request->description_en,
                'ar' => $request->description_ar
            ],
            'price' => [
                'en' => $request->price_en,
                'ar' => $request->price_ar
            ],
            'category_id' => $request->category_id
        ]);
        toast('Service Was Created Successfully', 'success');
        return redirect(route('admin.service.index'));
    }

    public function delete(DeleteServiceRequest $request)
    {
        Service::select('id')->find($request->id)->delete();
        toast('Service Was Deleted Successfully', 'success');
        return back();
    }

    public function edit($id)
    {
        $service = Service::select(['id', 'title', 'price', 'description', 'category_id'])->find(base64_decode($id));
        if ($service) {
            $categories = Category::select(['id', 'title'])->get();
            return view('admin.pages.service.form', compact('service', 'categories'));
        }
        toast('Sorry, Can\'t Service Found', 'error');
        return back();
    }

    public function update(ServiceRequest $request)
    {
        Service::find($request->id)->update([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar
            ],
            'description' => [
                'en' => $request->description_en,
                'ar' => $request->description_ar
            ],
            'price' => [
                'en' => $request->price_en,
                'ar' => $request->price_ar
            ],
            'category_id' => $request->category_id
        ]);
        toast('Service Was Updated Successfully', 'success');
        return redirect(route('admin.service.index'));
    }
}
