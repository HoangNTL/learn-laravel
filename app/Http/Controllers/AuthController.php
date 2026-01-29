<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function SignIn()
    {
        return view('SignIn');
    }

    public function CheckSignIn(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $repass = $request->input('repass');
        $mssv = $request->input('mssv');
        $lopmonhoc = $request->input('lopmonhoc');
        $gioitinh = $request->input('gioitinh');

        if (
            $password === $repass &&
            $username === 'Hoangntl' &&
            $mssv === '0031167' &&
            $lopmonhoc === '67PM2' &&
            $gioitinh === 'nam'
        ) {
            return redirect()->back()->with('message', 'Đăng ký thành công!');
        } else {
            return redirect()->back()->with('message', 'Đăng ký thất bại');
        }
    }
}
