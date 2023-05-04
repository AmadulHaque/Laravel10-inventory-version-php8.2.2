<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\{ExpenseType,Expense};
use Auth,Validator,Image,File,DB;
class ExpenseController extends Controller
{
    //
    public function ExpenseAll(Request $request)
    {
      if ($request->ajax()) {
          $search = @$request->search;
          $perPage = @$request->perPage ? $request->perPage : 10;
          $data=Expense::orderBy('id', 'desc');
          if($request->search){
              $data->where('tag', 'like', '%'.$request->search.'%')
              ->orWhere('note', 'like', '%'.$request->search.'%')
              ->orWhere('date', 'like', '%'.$request->search.'%')
              ->orWhere('amount', 'like', '%'.$request->search.'%');
          }
          $datas = $data->paginate($perPage);
          return view('backend.components.Expense.table',compact('datas'));
      }
      $ExpenseType =ExpenseType::all();
      return view('backend.pages.Expense.index',compact('ExpenseType'));
    }

    public function ExpenseStore(Request $request)
    {
      $validator =  Validator::make($request->all(), [
          'typeId' => 'required',
          'amount' => 'required',
          'note' => 'required',
          'date' => 'required',
      ]);
      if ($validator->passes()) {
            Expense::insert([
              'typeId' => $request->typeId,
              'amount' => $request->amount,
              'note' => $request->note,
              'date' => $request->date,
              'status' =>'1',
              'created_at' => Carbon::now(),
            ]);
           return response()->json(['success'=>1]);
        }else{
             return response()->json([$validator->errors()]);
         }
    }

    public  function ExpenseEdit($id)
    {
        $ExpenseType =ExpenseType::all();
        $data = Expense::findOrFail($id);
        return view('backend.components.Expense.edit',compact('data','ExpenseType'));
    }

    public function ExpenseUpdate(Request $request){
      $validator =  Validator::make($request->all(), [
        'typeId' => 'required',
        'amount' => 'required',
        'note' => 'required',
        'date' => 'required',
      ]);
      if ($validator->passes()) {
            Expense::findOrFail($request->id)->update([
                'typeId' => $request->typeId,
                'amount' => $request->amount,
                'note' => $request->note,
                'date' => $request->date,
                'status' =>'1',
                'created_at' => Carbon::now(),
           ]);
           return response()->json(['success'=>1]);
        }else{  
             return response()->json([$validator->errors()]);
        }
    }

    public function ExpenseRemove($id)
    {
        Expense::findOrFail($id)->delete();
      
    }
}
