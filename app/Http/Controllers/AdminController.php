<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id= Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        } else{
            return Redirect::to('admin')->send();
        }
    }
    public function index(){
        return view('DangnhapAdmin');
    }
    public function showdashboard(){
        $this->AuthLogin();
        return view('admin.dashboard');
    }
    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_matkhau = $request->admin_matkhau;
        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_matkhau',$admin_matkhau)->first();
        if ($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
           return Redirect::to('/dashboard');
        } else {
            Session::put('message','Sai mật khẩu hoặc tài khoản');
            return Redirect::to('/admin');
        }
       
    }
    public function dangxuat(){
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }
}
