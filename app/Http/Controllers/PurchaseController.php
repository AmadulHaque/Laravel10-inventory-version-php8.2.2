<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\{Purchase,Product,Supplier,Category,Unit,Brand};
use Auth,Validator,Image,File,DB;

class PurchaseController extends Controller
{
    //

    public function PurchaseAll(Request $request)
    {
      if ($request->ajax()) {
          $search = @$request->search;
          $perPage = @$request->perPage ? $request->perPage : 10;
          $data=Purchase::orderBy('id', 'desc');
          $datas = $data->paginate($perPage);
          return view('backend.components.purchase.table',compact('datas'));
      }
      $supplier = Supplier::all();
      $category = Category::all();
      $unit = Unit::all();
      $brand = Brand::all();
      return view('backend.pages.purchase.index',compact('supplier','category','unit','brand'));
    }

    public function PurchaseAdd(){
        $supplier = Supplier::all();
        $unit = Unit::all();
        $category = Category::all();
        $category = Brand::all();
        return view('backend.pages.purchase.purchase_add',compact('supplier','unit','category'));

    }



}
