<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\Paginator;
session_start();

class QuanLyBaiViet extends Controller
{
    public function AuthLogin(){
        $admin_id= Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        } else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_baiviet(){
        $this->AuthLogin();
        return view('admin.add_baiviet');
    }
    public function all_baiviet(){
        $this->AuthLogin();
        Paginator::useBootstrap();
        $all_baiviet = DB::table('tbl_baiviet')
        ->paginate(10);
        $manager_baiviet = view('admin.all_baiviet')->with('all_baiviet',$all_baiviet);
        return view('Admin')->with('admin.all_baiviet',$manager_baiviet);
    }
    public function save_baiviet(Request $request){
       $this->AuthLogin();
       $time=Carbon::now('Asia/Ho_Chi_Minh');
       $data = array();
       $data['baiviet_name'] = $request->baiviet_name; 
       $data['baiviet_noidung'] = $request->baiviet_noidung;
       $data['created_at'] = $time;  
       $id_cmt= DB::table('tbl_baiviet')->insertGetId($data);

       $get_image = $request->file('baiviet_image');
       if($get_image){
           foreach($get_image as $get_img)
           {
               $a=array();
           $get_name_image = $get_img->getClientOriginalName();
           $name_image = current(explode('.', $get_name_image));   
           $new_image=$name_image.rand(0,99).'.'.$get_img->getClientOriginalExtension();
           $get_img->move(base_path().'/public/upload/baiviet',$new_image);
           $a['id_baiviet'] = $id_cmt;
           $a['hinh'] = $new_image;
           
           DB::table('tbl_hinhanh')->insert($a);
           
           }
           Session::put('message','Đã thêm bài viết thành công');
           return Redirect::to('all-baiviet');
       }
     
       Session::put('message','Đã thêm bài viết thành công');
       return Redirect::to('all-baiviet');
    }
    public function edit_baiviet($baiviet_id){
        $this->AuthLogin();
        $edit_baiviet = DB::table('tbl_baiviet')->where('baiviet_id',$baiviet_id)->get();
        $manager_baiviet = view('admin.edit_baiviet')->with('edit_baiviet',$edit_baiviet);
        return view('Admin')->with('admin.edit_baiviet',$manager_baiviet);
    }
    public function update_baiviet(Request $request,$baiviet_id){
        $this->AuthLogin();
        $data = array();
        $data['baiviet_name'] = $request->baiviet_name; 
        $data['baiviet_noidung'] = $request->baiviet_noidung; 
        $get_image = $request->file('$phim_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));   
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move(base_path().'/public/upload/baiviet',$new_image);
            $data['baiviet_image'] = $new_image;
            DB::table('tbl_baiviet')->where('baiviet_id',$baiviet_id)->update($data);
            Session::put('message','Đã sửa thành công');
            return Redirect::to('all-baiviet');
        }
        DB::table('tbl_baiviet')->where('baiviet_id',$baiviet_id)->update($data);
        Session::put('message','Đã sửa thành công');
        return Redirect::to('all-baiviet');
    }   
    public function delete_baiviet($baiviet_id){
        $this->AuthLogin();
        $get_hinh = DB::table('tbl_hinhanh')->where('id_baiviet',$baiviet_id)->get();
        foreach($get_hinh as $img)
        {
        $link ='public/upload/baiviet/'.$img->hinh;
        if(File::exists($link))
        {
            File::delete($link);
            
        }
         }
        DB::table('tbl_hinhanh')->where('id_baiviet',$baiviet_id)->delete();
        DB::table('tbl_baiviet')->where('baiviet_id',$baiviet_id)->delete();
        Session::put('message','Xóa bài viết thành công');
        return Redirect::to('all-baiviet');
    }
    //end backend
    // Details
    public function details($baiviet_id){
        $details_baiviet = DB::table('tbl_baiviet')->where('baiviet_id',$baiviet_id)
        ->first();
        $baiviet_moi = DB::table('tbl_baiviet')->orderBy('baiviet_id','Desc')->limit(3)
        ->whereNotIn('baiviet_id', [$baiviet_id])
        ->get();
        $hinh = DB::table('tbl_hinhanh')->where('id_baiviet',$baiviet_id)->get();

        return view('pages.baiviet.show_details')
        ->with('hinh',$hinh)
        ->with('baiviet_moi',$baiviet_moi)
        ->with('baiviet_details',$details_baiviet);
    }
    public function all_hinh($id)
    {
        $this->AuthLogin();
   
        $img = DB::table('tbl_baiviet')
        ->where('id_baiviet',$id)
        ->join('tbl_hinhanh','tbl_baiviet.baiviet_id','=','tbl_hinhanh.id_baiviet')
        ->get();
     
        $manager_baiviet = view('admin.all_hinhanh')->with('images',$img)->with('id',$id);
        return view('Admin')->with('admin.all_hinhanh',$manager_baiviet);
    }
    public function save_img(Request $request)
    {
        $this->AuthLogin();
        $get_image = $request->file('baiviet_image');
        if($get_image){
            foreach($get_image as $get_img)
            {
                $a=array();
            $get_name_image = $get_img->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));   
            $new_image=$name_image.rand(0,99).'.'.$get_img->getClientOriginalExtension();
            $get_img->move(base_path().'/public/upload/baiviet',$new_image);
            $a['id_baiviet'] = $request->id;
            $a['hinh'] = $new_image;
            
            DB::table('tbl_hinhanh')->insert($a);
            
            }
      
            return redirect()->back()->with('message','Đã thêm bài viết thành công');
        }
     
    }
    public function delete_hinh($id)
    {
        $this->AuthLogin();
        $get_hinh = DB::table('tbl_hinhanh')->where('id',$id)->first();
        $link ='public/upload/baiviet/'.$get_hinh->hinh;
        if(File::exists($link))
        {
            File::delete($link);
            
        }
        DB::table('tbl_hinhanh')->where('id',$id)->delete();
       
        return redirect()->back()->with('message','Xóa hình thành công');
    }
}
