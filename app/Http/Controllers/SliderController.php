<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class SliderController extends Controller
{
    public function index(){
      return view('admin.add_slider');
    }
    public function save_slider(Request,$request){

      $data=array();
      $data['publication_status']=$request->publication_status

      if($image){
        $image_name=str_random(20);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='slider/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        if($success){
          $data['product_image']=$image_url;

          DB::table('tbl_slider')->insert($data);
          Session::put('message','Product added successfully!!');
          return Redirect::to('/add-slider');
        }
      }
      $data['product_image']='';
        DB::table('tbl_products')->insert($date);
        Session::put('message','Slider added successfully without image');
        return Redirect::to('/add-slider');

    }
}
