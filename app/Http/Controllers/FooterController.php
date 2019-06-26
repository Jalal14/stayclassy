<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Social;
use App\Footer;
use App\Http\Requests\FooterRequest;

class FooterController extends Controller
{
    public function social()
    {
        $social = Social::first();
        return view('admin.footer.social')
            ->with('social', $social);
    }
    public function socialUpdate(Request $request)
    {
        $social = Social::first();
        if ($request->facebook != null)
        {
            $social->facebook = $request->facebook;
        }
        else{
            $social->facebook = "#";
        }
        if ($request->instagram != null)
        {
            $social->instagram = $request->instagram;
        }
        else{
            $social->instagram = "#";
        }
        if ($request->twitter != null)
        {
            $social->twitter = $request->twitter;
        }
        else{
            $social->twitter = "#";
        }
        if ($request->youtube != null)
        {
            $social->youtube = $request->youtube;
        }
        else{
            $social->youtube = "#";
        }
        $social->save();
        return redirect()->route('footer.social');
    }
    public function quality(Request $request)
    {
        $footer = Footer::first();
        $data = json_decode($footer->quality);
        return view('admin.footer.quality')
            ->with('data', $data);
    }
    public function qualityUpdate(FooterRequest $request)
    {
        $footer = Footer::first();
        $quality = json_encode(['heading' => $request->heading, 'title' => $request->title, 'description' => $request->description]);
        $footer->quality = $quality;
        $footer->save();
        return redirect()->route('footer.quality');
    }
    public function return(Request $request)
    {
        $footer = Footer::first();
        $data = json_decode($footer->return_policy);
        return view('admin.footer.return')
            ->with('data', $data);
    }
    public function returnUpdate(FooterRequest $request)
    {
        $footer = Footer::first();
        $return_policy = json_encode(['heading' => $request->heading, 'title' => $request->title, 'description' => $request->description]);
        $footer->return_policy = $return_policy;
        $footer->save();
        return redirect()->route('footer.return');
    }
    public function shipping(Request $request)
    {
        $footer = Footer::first();
        $data = json_decode($footer->shipping);
        return view('admin.footer.shipping')
            ->with('data', $data);
    }
    public function shippingUpdate(FooterRequest $request)
    {
        $footer = Footer::first();
        $shipping = json_encode(['heading' => $request->heading, 'title' => $request->title, 'description' => $request->description]);
        $footer->shipping = $shipping;
        $footer->save();
        return redirect()->route('footer.shipping');
    }
    public function service(Request $request)
    {
        $footer = Footer::first();
        $data = json_decode($footer->service);
        return view('admin.footer.service')
            ->with('data', $data);
    }
    public function serviceUpdate(FooterRequest $request)
    {
        $footer = Footer::first();
        $service = json_encode(['heading' => $request->heading, 'title' => $request->title, 'description' => $request->description]);
        $footer->service = $service;
        $footer->save();
        return redirect()->route('footer.service');
    }
    public function contact(Request $request)
    {
        $footer = Footer::first();
        $contact = json_decode($footer->contact);
        return view('admin.footer.contact')
            ->with('contact', $contact);
    }
    public function contactUpdate(Request $request)
    {
        $footer = Footer::first();
        $contact = json_encode(['heading' => $request->heading, 'number' => $request->number, 'email' => $request->email]);
        $footer->contact = $contact;
        $footer->save();
        return redirect()->route('footer.contact');
    }
    public function policy(Request $request)
    {
        $footer = Footer::first();
        $data = json_decode($footer->policy);
        return view('admin.footer.policy')
            ->with('data', $data);
    }
    public function policyUpdate(FooterRequest $request)
    {
        $footer = Footer::first();
        $policy = json_encode(['heading' => $request->heading, 'title' => $request->title, 'description' => $request->description]);
        $footer->policy = $policy;
        $footer->save();
        return redirect()->route('footer.policy');
    }
    public function about(Request $request)
    {
        $footer = Footer::first();
        $data = json_decode($footer->about);
        return view('admin.footer.about')
            ->with('data', $data);
    }
    public function aboutUpdate(FooterRequest $request)
    {
        $footer = Footer::first();
        $about = json_encode(['heading' => $request->heading, 'title' => $request->title, 'description' => $request->description]);
        $footer->about = $about;
        $footer->save();
        return redirect()->route('footer.about');
    }
}
