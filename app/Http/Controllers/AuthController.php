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
    // Hiển thị form nhập tuổi
    public function showAgeForm()
    {
        return view('age');
    }

    // Lưu tuổi vào session
    public function saveAge(Request $request)
    {
        $age = $request->input('age');
        if (!is_numeric($age) || $age < 0) {
            return redirect()->back()->with('error', 'Vui lòng nhập tuổi hợp lệ!');
        }
        $request->session()->put('age', $age);
        return redirect()->back()->with('message', 'Đã lưu tuổi vào session!');
    }
}
