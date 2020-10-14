<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    //登录页面
    public function create()
    {
        return view('sessions.create');
    }
    //验证逻辑
    public function store(Request $request)
    {
//        dd($request);有很多东西
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);
//        dd($credentials);array:2 ["email" => "1536520127@qq.com", "password" => "123456789"]
        if (Auth::attempt($credentials, $request->has('remember'))) {//验证用户名密码一致
            session()->flash('success', '欢迎回来');
            return redirect()->route('users.show', [Auth::user()]);//Auth::user()可以获取当前登录用户的信息
        } else {
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back()->withInput();
        }
    }

    //登出
    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '您已成功退出！');
        return redirect('login');
    }
}
