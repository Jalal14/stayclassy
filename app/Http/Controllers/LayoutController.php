<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Layout;
use App\Http\Requests\LayoutRequest;

class LayoutController extends Controller
{
    public function slider(Request $request)
    {
        $layout = Layout::first();
        return view('admin.layout.slider')
            ->with('layout', $layout);
    }
    public function sliderStore(Request $request)
    {
        $layout = Layout::first();
        if ($request->hasFile('image1')){
            $image = $request->file('image1');
            $ext = strtolower($image->getClientOriginalExtension());
            if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png'){
                $request->session()->flash('msg', "Please upload .jpg or .jpeg or .png file");
                return redirect()->route('layout.slider');
            }
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(2047, 746);
            $imageName = "banner-1.".$image->getClientOriginalExtension();
            $image_resize->save(public_path('images/'
                .$imageName));
            $layout->slider1 = $imageName;
        }
        if ($request->hasFile('image2')){
            $image = $request->file('image2');
            $ext = strtolower($image->getClientOriginalExtension());
            if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png'){
                $request->session()->flash('msg', "Please upload .jpg or .jpeg or .png file");
                return redirect()->route('layout.slider');
            }
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(2047, 746);
            $imageName = "banner-2.".$image->getClientOriginalExtension();
            $image_resize->save(public_path('images/'
                .$imageName));
            $layout->slider2 = $imageName;
        }
        if ($request->hasFile('image3')){
            $image = $request->file('image3');
            $ext = strtolower($image->getClientOriginalExtension());
            if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png'){
                $request->session()->flash('msg', "Please upload .jpg or .jpeg or .png file");
                return redirect()->route('layout.slider');
            }
            $filename    = $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(2047, 746);
            $imageName = "banner-3.".$image->getClientOriginalExtension();
            $image_resize->save(public_path('images/'
                .$imageName));
            $layout->slider3 = $imageName;
        }
        $layout->save();
        $request->session()->flash('msg', "Image successfully uploaded");
        return redirect()->route('layout.slider');
    }
    public function leftImage(Request $request)
    {
        $layout = Layout::first();
        return view('admin.layout.left-image')
            ->with('layout', $layout);
    }
    public function leftImageStore(LayoutRequest $request)
    {
        $layout = Layout::first();
        if ($request->hasFile('image1')){
            $image = $request->file('image1');
            $ext = strtolower($image->getClientOriginalExtension());
            if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png'){
                $request->session()->flash('msg', "Please upload .jpg or .jpeg or .png file");
            }
            else{
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(640, 400);
                $imageName = "left-image.".$image->getClientOriginalExtension();
                $image_resize->save(public_path('images/'
                    .$imageName));
                $layout->left_image = $imageName;
                $request->session()->flash('msg', "Image successfully uploaded");
            }
        }
        if ($request->title){
            $layout->left_title = $request->title;
        }
        $layout->save();
        return redirect()->route('layout.leftImage');
    }
    public function rightImage(Request $request)
    {
        $layout = Layout::first();
        return view('admin.layout.right-image')
            ->with('layout', $layout);
    }
    public function rightImageStore(LayoutRequest $request)
    {

        $layout = Layout::first();
        if ($request->hasFile('image1')){
            $image = $request->file('image1');
            $ext = strtolower($image->getClientOriginalExtension());
            if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png'){
                $request->session()->flash('msg', "Please upload .jpg or .jpeg or .png file");
            }
            else{
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(640, 400);
                $imageName = "right-image.".$image->getClientOriginalExtension();
                $image_resize->save(public_path('images/'
                    .$imageName));
                $layout->right_image = $imageName;
                $request->session()->flash('msg', "Successfully updated");
            }
        }
        if ($request->title){
            $layout->right_title = $request->title;
        }
        $layout->save();
        return redirect()->route('layout.rightImage');
    }
    public function icon(Request $request)
    {
        $layout = Layout::first();
        return view('admin.layout.icon')
            ->with('layout', $layout);
    }
    public function iconStore(LayoutRequest $request)
    {
        $layout = Layout::first();
        if ($request->hasFile('image1')){
            $image = $request->file('image1');
            $ext = strtolower($image->getClientOriginalExtension());
            if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png'){
                $request->session()->flash('msg', "Please upload .jpg or .jpeg or .png file");
            }
            else{
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(50, 50);
                $imageName = "icon.".$image->getClientOriginalExtension();
                $image_resize->save(public_path('images/'
                    .$imageName));
                $layout->icon = $imageName;
                $request->session()->flash('msg', "Image successfully uploaded");
                $layout->save();
            }
        }
        return redirect()->route('layout.icon');
    }
}
