<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\Paginator;
session_start();
class HomeController extends Controller
{
    public function index(){
        Paginator::useBootstrap();
        $all_baiviet = DB::table('tbl_baiviet')->paginate(3);
        return view('pages.home')->with('all_baiviet',$all_baiviet);
    } 
    public function gioithieu(){
        return view('pages.gioithieu');
    } 
    public function lienhe(){
        return view('pages.lienhe');
    } 
}
