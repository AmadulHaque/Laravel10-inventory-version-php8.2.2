<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Brand;
use Auth,Validator,Image,File,DB;

class BrandController extends Controller
{
    //
    public function BrandAll(Request $request)
    {
      if ($request->ajax()) {
          $search = @$request->search;
          $perPage = @$request->perPage ? $request->perPage : 10;
          $data=Brand::orderBy('id', 'desc');
          if($request->search){
              $data->where('name', 'like', '%'.$request->search.'%');
          }
          $datas = $data->paginate($perPage);
          return view('backend.components.brand.table',compact('datas'));
      }
      return view('backend.pages.brand.index');
    }

    public function BrandStore(Request $request)
    {
      $validator =  Validator::make($request->all(), [
          'name' => 'required|unique:brands',
      ]);
      if ($validator->passes()) {
           Brand::insert([
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


    public  function BrandEdit($id)
    {
      $data = Brand::findOrFail($id);
       return view('backend.components.brand.edit',compact('data'));
    }

    public function BrandUpdate(Request $request){
      $validator =  Validator::make($request->all(), [
          'name' => 'required',
      ]);
      if ($validator->passes()) {
          Brand::findOrFail($request->id)->update([
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

    public function BrandRemove($id)
    {
      Brand::findOrFail($id)->delete();
    }
}
