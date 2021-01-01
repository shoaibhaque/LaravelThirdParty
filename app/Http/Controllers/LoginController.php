<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(){
    	return view('login.index');
    }

    public function login(Request $req){
    	if(count(DB::table('users')->where('username',$req->username)->where('password',$req->password)->first())>0){
    		return redirect()->route('home.index');
    	}
    	else{
    		$req->session()->flash('msg', 'Invalid Username no or Password');
    		return redirect()->route('login.index');
    	}
    }
}
