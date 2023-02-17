<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Unit;
use Auth,Validator,Image,File,DB;

class UnitController extends Controller
{
    //
    public function unitAll(Request $request)
    {
      if ($request->ajax()) {
          $search = @$request->search;
          $perPage = @$request->perPage ? $request->perPage : 10;
          $data=Unit::orderBy('id', 'desc');
          if($request->search){
              $data->where('name', 'like', '%'.$request->search.'%');
          }
          $datas = $data->paginate($perPage);
          return view('backend.components.unit.table',compact('datas'));
      }

      return view('backend.pages.unit.index');
    }


    public function unitStore(Request $request)
    {
      $validator =  Validator::make($request->all(), [
          'name' => 'required|unique:units',
      ]);
      if ($validator->passes()) {
           Unit::insert([
              'name' => $request->name,
              'status' =>'1',
              'created_by' => Auth::user()->id,
              'created_at' => Carbon::now(),
           ]);
           return response()->json(['success'=>1]);
        }else{
             return response()->json([$validator->errors()]);
         }
    }


    function unitEdit($id)
    {
      $data = Unit::findOrFail($id);
       return view('backend.components.unit.edit',compact('data'));
    }

    public function unitUpdate(Request $request){
      $validator =  Validator::make($request->all(), [
          'name' => 'required',
      ]);
      if ($validator->passes()) {
        $img=DB::table('customers')->where('id',$request->id)->first();  //product data get

          Unit::findOrFail($request->id)->update([
              'name' => $request->name,
              'status' => '1',
              'created_by' => Auth::user()->id,
              'created_at' => Carbon::now(),
           ]);
           return response()->json(['success'=>1]);
        }else{
             return response()->json([$validator->errors()]);
         }
    }

    public function unitRemove($id)
    {
      Unit::findOrFail($id)->delete();
    }


}
