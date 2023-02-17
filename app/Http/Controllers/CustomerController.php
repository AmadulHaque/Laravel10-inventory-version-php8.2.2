<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Customer;
use Auth,Validator,Image,File,DB;
class CustomerController extends Controller
{
    //
    public function customerAll(Request $request)
    {
      if ($request->ajax()) {
          $search = @$request->search;
          $perPage = @$request->perPage ? $request->perPage : 10;
          $data=Customer::orderBy('id', 'desc');
          if($request->search){
              $data->where('name', 'like', '%'.$request->search.'%');
          }
          $datas = $data->paginate($perPage);
          return view('backend.components.customer.table',compact('datas'));
      }

      return view('backend.pages.customer.index');
    }


    public function customerStore(Request $request)
    {
      $validator =  Validator::make($request->all(), [
          'mobile_no' => 'required|unique:customers',
          'email' => 'required|unique:customers',
      ]);
      if ($validator->passes()) {
          if ($request->file('customer_image')) {
              $image = $request->file('customer_image');
              $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // 343434.png
              Image::make($image)->resize(200,200)->save('images/customer/'.$name_gen);
              $save_url = 'images/customer/'.$name_gen;
          }else{
            $save_url =null;
          }
           Customer::insert([
              'name' => $request->name,
              'mobile_no' => $request->mobile_no,
              'email' => $request->email,
              'address' => $request->address,
              'customer_image' => $save_url ,
              'created_by' => Auth::user()->id,
              'created_at' => Carbon::now(),
           ]);
           return response()->json(['success'=>1]);
        }else{
             return response()->json([$validator->errors()]);
         }
    }


    function customerEdit($id)
    {
      $customer = Customer::findOrFail($id);
       return view('backend.components.customer.edit',compact('customer'));
    }

    public function CustomerUpdate(Request $request){
      $validator =  Validator::make($request->all(), [
          'mobile_no' => 'required',
          'email' => 'required',
      ]);
      if ($validator->passes()) {
        $img=DB::table('customers')->where('id',$request->id)->first();  //product data get

          if ($request->file('customer_image')) {
              $image = $request->file('customer_image');
              $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // 343434.png
              Image::make($image)->resize(200,200)->save('images/customer/'.$name_gen);
              $save_url = 'images/customer/'.$name_gen;
              //
              unlink($img->customer_image);
          }else{
            $save_url =$img->customer_image;
          }
          Customer::findOrFail($request->id)->update([
              'name' => $request->name,
              'mobile_no' => $request->mobile_no,
              'email' => $request->email,
              'address' => $request->address,
              'customer_image' => $save_url ,
              'created_by' => Auth::user()->id,
              'created_at' => Carbon::now(),
           ]);
           return response()->json(['success'=>1]);
        }else{
             return response()->json([$validator->errors()]);
         }
    }


    public function CustomerRemove($id)
    {
      $img=DB::table('customers')->where('id',$id)->first();
      unlink($img->customer_image);
      Customer::findOrFail($id)->delete();
    }


}
