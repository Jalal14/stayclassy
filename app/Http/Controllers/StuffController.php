<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Admin;
use App\Http\Requests\StuffRequest;
use App\Http\Requests\EditPasswordRequest;

class StuffController extends Controller
{
    public function index(Request $req)
    {
        $stuffs = Admin::all();
        return view('admin.stuff.list')
            ->with('stuffs', $stuffs);
    }
    public function create(Request $req)
    {
        return view('admin.stuff.add');
    }
    public function store(StuffRequest $req)
    {
        $stuff = new Admin();
        $stuff->name = $req->name;
        $stuff->username = $req->username;
        $stuff->phone = $req->phone;
        $stuff->email= $req->email;
        $stuff->password = Crypt::encryptString($req->password);
        $stuff->save();
        return redirect()->route('stuff.index');
    }
    public function edit(Request $req)
    {
        $stuff = Admin::find($req->session()->get('loggedAdmin'));
        return view('admin.stuff.edit')
            ->with('stuff', $stuff);
    }
    public function update(Request $req)
    {
        $stuff = Admin::find($req->session()->get('loggedAdmin'));
        $stuff->name = $req->name;
        $stuff->phone = $req->phone;
        $stuff->email = $req->email;
        if ($stuff->save() > 0){
            $req->session()->flash('msg', "Account updated");
        }else{
            $req->session()->flash('msg', "Account update failed");
        }
        return redirect()->route('stuff.edit');
    }
    public function editPassword(Request $req)
    {
        return view('admin.stuff.edit-password');
    }
    public function updatePassword(EditPasswordRequest $req)
    {
        $stuff = Admin::find($req->session()->get('loggedAdmin'));
        $password = Crypt::decryptString($stuff->password);
        if ($password == $req->old_password){
            $stuff->password = Crypt::encryptString($req->new_password);
            if ($stuff->save() == 1){
                $req->session()->flash('msg', "Password updated");
            }else{
                $req->session()->flash('msg', "Error happened, please try again");
            }
        }else{
            $req->session()->flash('msg', "Wrong password");
        }
        return redirect()->route('stuff.editPassword');
    }
}
