<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Auth;
class SettingController extends Controller
{
    //


    public function GetSetting()
    {
        return view('backend.pages.setting.index');
    }



    public function SettingHeader(Request $request)
    {
       DB::table('users')->where('id',Auth::user()->id)->update([
        'header_color'=>$request->bg,
      ]);
    }

    public function SettingSideber(Request $request)
    {
       DB::table('users')->where('id',Auth::user()->id)->update([
        'sideber_color'=>$request->bg,
      ]);
    }



    public function updateSetting(Request $request)
    {
      $dd =DB::table('settings')->first();
        $data = array();
        if ($request->file('logo_img')) {
            $file = $request->file('logo_img');
            @unlink(public_path('images/setting/'.$dd->logo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images/setting/'),$filename);
            $data['logo'] = $filename;
        }
        if ($request->file('favicon')) {
            $file = $request->file('favicon');
            @unlink(public_path('images/setting/'.$dd->favicon));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images/setting/'),$filename);
            $data['favicon'] = $filename;
        }
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['shop_title'] = $request->shop_title;
        $data['address'] = $request->address;
        $data['address_two'] = $request->address_two;
        DB::table('settings')->update($data);
        $notification = array('message' => 'Update Success!','alert-type' => 'success');
        return redirect()->back()->with($notification);
    }





}
