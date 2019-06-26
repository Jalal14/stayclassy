<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Order;
use App\Admin;
use App\PasswordToken;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginRequest;
use App\Mail\AdminPasswordMail;
use Mail;

class AdminController extends Controller
{
    public function dashboard(Request $req)
    {
        $orders = DB::table('view_order')
            ->where('status', '3')
            ->orderBy('order_date', 'DESC')
            ->limit(20)
            ->get();
        $order = Order::all()
            ->count();
        $pending = Order::where('status', '3')
            ->count();
        $delivered = Order::where('status', '4')
            ->count();
        $returned = Order::where('status', '5')
            ->count();
        return view('admin.dashboard')
            ->with('orders', $orders)
            ->with('order', $order)
            ->with('pending', $pending)
            ->with('delivered', $delivered)
            ->with('returned', $returned);
    }
    public function login(Request $req)
    {
        return view('admin.login');
    }
    public function validateLogin(LoginRequest $req)
    {
        $admins = Admin::where('username', $req->username)
            ->get();
        if (count($admins) == 1){
            $admin = $admins->first();
            if (Crypt::decryptString($admin->password) == $req->password){
                $req->session()->put('loggedAdmin', $admin->id);
                return redirect()->route('admin.dashboard');
            }
        }
        $req->session()->flash('msg', "Wrong username or password");
        return redirect()->route('admin.login');
    }
    public function logout(Request $req)
    {
        $req->session()->flush();
        return redirect()->route('admin.login');
    }
    public function forgotPassword(Request $req)
    {
        return view('admin.recover-password');
    }
    public function recoverPassword(Request $req)
    {

        $stuff = Admin::where('email', $req->email)
            ->first();
        if ($stuff){
            $token = new PasswordToken();
            $token->email = $stuff->email;
            $token->token = sha1(time());
            $token->verified = 0;
            if ($token->save()){
                Mail::send(new AdminPasswordMail($token));
                $req->session()->flash('msg', "Password reset link has been sent, please check");
            }else{
                $req->session()->flash('msg', "Mail send failed, please try again");
            }
        }else{
            $req->session()->flash('msg', "Email not found");
        }
        return redirect()->route('admin.forgotPassword');
    }
}
