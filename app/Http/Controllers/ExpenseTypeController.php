<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ExpenseType;
use Auth,Validator,Image,File,DB;
class ExpenseTypeController extends Controller
{
    //
    public function ExpenseTypeAll(Request $request)
    {
      if ($request->ajax()) {
          $search = @$request->search;
          $perPage = @$request->perPage ? $request->perPage : 10;
          $data=ExpenseType::orderBy('id', 'desc');
          if($request->search){
              $data->where('name', 'like', '%'.$request->search.'%');
          }
          $datas = $data->paginate($perPage);
          return view('backend.components.ExpenseType.table',compact('datas'));
      }
      return view('backend.pages.ExpenseType.index');
    }

    public function ExpenseTypeStore(Request $request)
    {
      $validator =  Validator::make($request->all(), [
          'name' => 'required|unique:categories',
      ]);
      if ($validator->passes()) {
        ExpenseType::insert([
              'name' => $request->name,
              'status' =>'1',
              'created_at' => Carbon::now(),
           ]);
           return response()->json(['success'=>1]);
        }else{
             return response()->json([$validator->errors()]);
         }
    }

    public  function ExpenseTypeEdit($id)
    {
      $data = ExpenseType::findOrFail($id);
       return view('backend.components.ExpenseType.edit',compact('data'));
    }

    public function ExpenseTypeUpdate(Request $request){
      $validator =  Validator::make($request->all(), [
          'name' => 'required',
      ]);
      if ($validator->passes()) {
        ExpenseType::findOrFail($request->id)->update([
              'name' => $request->name,
              'status' => '1',
              'created_at' => Carbon::now(),
           ]);
           return response()->json(['success'=>1]);
        }else{
             return response()->json([$validator->errors()]);
         }
    }

    public function ExpenseTypeRemove($id)
    {
      $check = DB::table('expenses')->where('TypeId',$id)->count();
      if ($check > 0) {
          return response()->json([
            "status"=>305,
            "message"=>"This Expense Type is used!"
          ]);
      }else{
        ExpenseType::findOrFail($id)->delete();
      }
    }
}
