<?php

namespace App\Http\Controllers;

use App\Mail\SendToMail;
use App\ResetPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
class SendMailController extends Controller
{
    public function mailView()
    {
        return view('reset-form');
    }

    public function send(Request $request)
    {
        $email = $request->email;
        $body = rand(10000, 99999);
        ResetPassword::create([
            'email' => $email,
            'code' => $body
        ]);
        $data = [
            'title' => 'Parolni tiklash uchun code',
            'body' => $body
        ];
        Mail::to($email)->send(new SendToMail($data));
        return view('code', compact('email'));
    }

    public function check(Request $request)
    {
        $code = $request->code;
        $email  = $request->email;
        $check = ResetPassword::where('email', $email)->where('code', $code)->latest('id')->first();
        if($check){
            return view('new-password', compact('email'));
        } else{
            return back();
        }
    }

    public  function changePassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if($user){
            $user->update([
                'password' => bcrypt($request->password)
            ]);
            return redirect()->route('login');
        } else{
            return back();
        }

    }
}
