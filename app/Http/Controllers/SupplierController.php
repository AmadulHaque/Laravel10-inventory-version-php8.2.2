<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Carbon;
use Auth,Validator;
class SupplierController extends Controller
{
    //
    public function supplierAll(Request $request)
    {
      if ($request->ajax()) {
          $search = @$request->search;
          $perPage = @$request->perPage ? $request->perPage : 10;
          $data=Supplier::orderBy('id', 'desc');
          if($request->search){
              $data->where('name', 'like', '%'.$request->search.'%');
          }
          $datas = $data->paginate($perPage);
          return view('backend.components.supplier.table',compact('datas'));
      }

      return view('backend.pages.supplier.index');
    }

    public function SupplierStore(Request $request){
      $validator =  Validator::make($request->all(), [
          'mobile_no' => 'required|unique:suppliers',
          'email' => 'required|unique:suppliers',
      ]);
      if ($validator->passes()) {
           Supplier::insert([
               'name' => $request->name,
               'mobile_no' => $request->mobile_no,
               'email' => $request->email,
               'address' => $request->address,
               'created_by' => Auth::user()->id,
               'created_at' => Carbon::now(),
           ]);
        return response()->json(['success'=>1]);
        }else{
             return response()->json([$validator->errors()]);
         }
    }

    public function SupplierRemove($id)
    {
       Supplier::findOrFail($id)->delete();
    }

    function SupplierEdit($id)
    {
      $data =    Supplier::findOrFail($id);
       return view('backend.components.supplier.edit',compact('data'));
    }


   public function SupplierUpdate(Request $request){
      $validator =  Validator::make($request->all(), [
          'mobile_no' => 'required',
          'email' => 'required',
          'name' => 'required',
          'address' => 'required',
      ]);
      if ($validator->passes()) {
          $id = $request->id;
          Supplier::findOrFail($id)->update([
               'name' => $request->name,
               'mobile_no' => $request->mobile_no,
               'email' => $request->email,
               'address' => $request->address,
               'created_by' => Auth::user()->id,
               'created_at' => Carbon::now(),
           ]);
        return response()->json(['success'=>1]);
        }else{
             return response()->json([$validator->errors()]);
         }
    }














}
