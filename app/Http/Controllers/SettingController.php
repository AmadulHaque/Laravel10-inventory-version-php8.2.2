<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SettingController extends Controller
{
    //


    public function GetSetting()
    {
        return view('backend.pages.setting.index');
    }









    public function SettingHeader(Request $request)
    {
       DB::table('settings')->update({
        'header_color'=>$request->bg,
       });
    }

    public function SettingSideber(Request $request)
    {
       DB::table('settings')->update({
        'sideber_color'=>$request->bg,
       });
    }








}
