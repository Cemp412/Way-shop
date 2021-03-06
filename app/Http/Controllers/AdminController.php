<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class AdminController extends Controller
{
    public function login(Request $request)
    { 
    	if($request->isMethod('post'))
    	{
    		$data = $request->input();
    		if(Auth::attempt(['email' =>$data['username'],'password' => $data['password']])){
    			return redirect('admindashboard');
    	    }else{
    			return redirect('/admin')->with('flash_message_error', 'Invalid username or password');
    		}
    	}
    	return view('admin.admin_login');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/admin')->with('flash_message_success', 'You are Logged Out..!');
    }

    public function dashboard()
    {
    	return view('admin.dashboard');
    }
}
