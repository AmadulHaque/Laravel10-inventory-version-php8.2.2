<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\{Product,Supplier,Category,Unit,Brand};
use Auth,Validator,Image,File,DB;
class ProductController extends Controller
{
    //
    public function ProductAll(Request $request)
    {
      if ($request->ajax()) {
          $search = @$request->search;
          $perPage = @$request->perPage ? $request->perPage : 10;
          $data=Product::orderBy('id', 'desc');
          if($request->search){
              $data->where('name', 'like', '%'.$request->search.'%');
          }
          $datas = $data->paginate($perPage);
          return view('backend.components.product.table',compact('datas'));
      }
      $supplier = Supplier::all();
      $category = Category::all();
      $unit = Unit::all();
      $brand = Brand::all();
      return view('backend.pages.product.index',compact('supplier','category','unit','brand'));
    }

    public function ProductStore(Request $request){
        $validator =  Validator::make($request->all(), [
            'name' => 'required|unique:products',
        ]);

        if ($validator->passes()) {
            if ($request->file('image')) {
                $image = $request->file('image');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // 343434.png
                Image::make($image)->resize(400,400)->save('images/product/'.$name_gen);
                $save_url = 'images/product/'.$name_gen;
            }else{
              $save_url =null;
            }
            Product::insert([
                'name' => $request->name,
                'supplier_id' => $request->supplier_id,
                'unit_id' => $request->unit_id,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'image' => $save_url,
                'quantity' => '0',
                'created_by' => Auth::user()->id,
                'created_at' => Carbon::now(),
            ]);
             return response()->json(['success'=>1]);
          }else{
               return response()->json([$validator->errors()]);
           }

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product.all')->with($notification);

    }


    function ProductEdit($id)
    {
      $supplier = Supplier::all();
      $category = Category::all();
      $unit = Unit::all();
      $brand = Brand::all();
      $product = Product::findOrFail($id);
       return view('backend.components.product.edit',compact('product','supplier','category','unit','brand'));
    }


    public function ProductUpdate(Request $request){
        $validator =  Validator::make($request->all(), [
            'name' => 'required',
        ]);

        $img=DB::table('products')->where('id',$request->id)->first();  //product data get
        if ($validator->passes()) {
            if ($request->file('image')) {
                unlink($img->image);
                $image = $request->file('image');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // 343434.png
                Image::make($image)->resize(400,400)->save('images/product/'.$name_gen);
                $save_url = 'images/product/'.$name_gen;
            }else{
              $save_url =$img->image;
            }
            Product::findOrFail($request->id)->update([
                'name' => $request->name,
                'supplier_id' => $request->supplier_id,
                'unit_id' => $request->unit_id,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'image' => $save_url,
                'quantity' => '0',
                'created_by' => Auth::user()->id,
                'created_at' => Carbon::now(),
            ]);
             return response()->json(['success'=>1]);
          }else{
               return response()->json([$validator->errors()]);
           }
        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('product.all')->with($notification);
    }

    public function ProductRemove($id)
    {
      $img=DB::table('products')->where('id',$id)->first();
      unlink($img->image);
      Product::findOrFail($id)->delete();
    }



}
