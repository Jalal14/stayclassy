<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\PasswordToken;
use Illuminate\Support\Facades\Crypt;
use Mail;
use App\Http\Requests\ResetPasswordRequest;

class PasswordController extends Controller
{
    public function passToken(Request $req, $token, $id)
    {
        $token = PasswordToken::where('id', $id)
            ->where('token', $token)
            ->first();
        if ($token!=null && $token->verfified == 0)
        {
            $stuff = Admin::where('email', $token->email)
                ->first();
            if ($stuff != null){
                $req->session()->put('email', $stuff->email);
                $req->session()->put('token', $token->token);
                return redirect()->route('password.resetPassword');
            }else{
                $req->session()->flash('msg', 'User not found for this email.');
                return redirect()->route('admin.login');
            }
        }
        else{
            $req->session()->flash('msg', 'Link has been expired.');
            return redirect()->route('admin.login');
        }
    }
    public function resetPassword(Request $req)
    {
        $token = PasswordToken::where('email', $req->session()->get('email'))
            ->where('token', $req->session()->get('token'))
            ->first();
        if ($token->verified == 0){
            return view('admin.set-password');
        }else{
            $req->session()->flash('msg', 'Link has been expired.');
            return redirect()->route('admin.login');
        }

    }
    public function setPassword(ResetPasswordRequest $req)
    {
        $token = PasswordToken::where('email', $req->session()->get('email'))
            ->where('token', $req->session()->get('token'))
            ->first();
        if ($token != null){
            $stuff = Admin::where('email', $token->email)
                ->first();
            $stuff->password = Crypt::encryptString($req->new_password);
            if ($stuff->save() > 0){
                $token->verified = 1;
                $token->save();
                $req->session()->flash('msg', 'Password changed, please login');
                return redirect()->route('admin.login');
            }
        }
        $req->session()->flash('msg', 'Link has expired, please try again');
        return redirect()->route('admin.forgotPassword');
    }
}
