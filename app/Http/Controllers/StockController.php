<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Product,Unit,Category,Supplier,Brand};
use Illuminate\Support\Carbon;
use Auth;

class StockController extends Controller
{
    //

      public function StockReport(Request $request){

        if ($request->ajax()) {
            $search = @$request->search;
            $perPage = @$request->perPage ? $request->perPage : 10;
            $data=Product::orderBy('supplier_id','asc')->orderBy('category_id','asc');
            if($request->search){
                $data->where('name', 'like', '%'.$request->search.'%');
            }
            $datas = $data->paginate($perPage);
            return view('backend.components.stock.table',compact('datas'));
        }
        $supplier = Supplier::all();
        $category = Category::all();
        $unit = Unit::all();
        $brand = Brand::all();
        return view('backend.pages.stock.index',compact('supplier','category','unit','brand'));
    }


    public function StockReportPdf(){
        $allData = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
        return view('backend.pages.pdf.stock_report_pdf',compact('allData'));
    }

    public function StockSupplierWise(){

        $supppliers = Supplier::all();
        $category = Category::all();
        return view('backend.pages.stock.supplier_product_wise_report',compact('supppliers','category'));

    } // End Method



    public function SupplierWisePdf(Request $request){
        $allData = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->where('supplier_id',$request->supplier_id)->get();
        return view('backend.pages.pdf.supplier_wise_report_pdf',compact('allData'));

    } // End Method


    public function ProductWisePdf(Request $request){

        $product = Product::where('category_id',$request->category_id)->where('id',$request->product_id)->first();
        return view('backend.pages.pdf.product_wise_report_pdf',compact('product'));
    } // End Method







}
