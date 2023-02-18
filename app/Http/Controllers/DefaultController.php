<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Unit;
use App\Models\Category;
use Auth;
class DefaultController extends Controller
{
    //
    public function GetCategory(Request $request){
        $supplier_id = $request->supplier_id;
        $allCategory = Product::with(['category'])->select('category_id')->where('supplier_id',$supplier_id)->groupBy('category_id')->get();
        return response()->json($allCategory);
    }

    public function GetBrand(Request $request){
        $supplier_id = $request->supplier_id;
        $allBrand = Product::with(['brand'])->select('brand_id')->where('supplier_id',$supplier_id)->groupBy('brand_id')->get();
        return response()->json($allBrand);
    }

    public function GetProduct(Request $request){
       $category_id = $request->category_id;
       $brand_id = $request->brand_id;
       $query = Product::orderBy('id','ASC');
       if ($request->category_id) {
         $query->where('category_id',$category_id);
       }
       if ($request->brand_id) {
        $query->where('brand_id',$brand_id);
       }
       $allProduct = $query->get();
       return response()->json($allProduct);
   }



}
