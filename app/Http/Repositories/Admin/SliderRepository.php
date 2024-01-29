<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\SliderInterface;
use App\Http\Traits\ImageTrait;
use App\Models\Slider;

class SliderRepository implements SliderInterface
{
    const PATH = 'slider';
    use ImageTrait;
    public function index()
    {
        $sliders = Slider::select(['id', 'title', 'image'])->get();
        confirmDelete(__('Delete Slider !'), __('Are you sure you want to delete?'));
        return view('admin.pages.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.pages.slider.form');
    }

    public function store($request)
    {
        $imageName = $this->uploadImage($request->image, self::PATH);
        Slider::create([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar
            ],
            'image' => $imageName
        ]);
        toast(__('Slider Was Created Successfully'), 'success');
        return redirect(route('admin.slider.index'));
    }

    public function delete($id)
    {
        $slider = Slider::select('id', 'image')->find(base64_decode($id));
        unlink(public_path($slider->image));
        $slider->delete();
        toast(__('Slider Was Deleted Successfully'), 'success');
        return back();
    }

    public function edit($id)
    {
        $slider = Slider::select('id', 'title', 'image')->find(base64_decode($id));
        if ($slider) {
            return view('admin.pages.slider.form', compact('slider'));
        }
        toast(__("Sorry, Can't Slider Found"), 'error');
        return back();
    }

    public function update($request)
    {
        $slider = Slider::find($request->id);
        if ($request->has('image')) {
            $imageName = $this->uploadImage($request->image, self::PATH, $slider->image);
        }
        $slider->update([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar
            ],
            'image' => $imageName ?? $slider->getRawOriginal('image')
        ]);
        toast(__('Slider Was Updated Successfully'), 'success');
        return redirect(route('admin.slider.index'));
    }
}
