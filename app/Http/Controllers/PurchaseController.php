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

    public function PurchaseStore(Request $request){
        if ($request->category_id == null) {
           $notification = array(
            'message' => 'Sorry you do not select any item',
            'alert-type' => 'error'
        );
        return redirect()->back( )->with($notification);
        } else {
            $count_category = count($request->category_id);
            for ($i=0; $i < $count_category; $i++) {
                $purchase = new Purchase();
                $purchase->date = date('Y-m-d', strtotime($request->date[$i]));
                $purchase->purchase_no = $request->purchase_no[$i];
                $purchase->supplier_id = $request->supplier_id[$i];
                $purchase->category_id = $request->category_id[$i];
                $purchase->brand_id =$request->brand_id[$i];
                $purchase->product_id = $request->product_id[$i];
                $purchase->buying_qty = $request->buying_qty[$i];
                $purchase->unit_price = $request->unit_price[$i];
                $purchase->buying_price = $request->buying_price[$i];
                $purchase->description = $request->description[$i];
                $purchase->created_by = Auth::user()->id;
                $purchase->status = '0';
                $purchase->save();
            } // end foreach
        } // end else
        $notification = array(
            'message' => 'Data Save Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('PurchaseAll')->with($notification);
    } // End Method

    public function PurchaseRemove($id){
      Purchase::findOrFail($id)->delete();
    }

    public function PurchasePending(Request $request)
    {
      if ($request->ajax()) {
          $search = @$request->search;
          $perPage = @$request->perPage ? $request->perPage : 10;
          $data=Purchase::where('status',0);
          $datas = $data->paginate($perPage);
          return view('backend.components.purchase.tablePending',compact('datas'));
      }
      $supplier = Supplier::all();
      $category = Category::all();
      $unit = Unit::all();
      $brand = Brand::all();
      return view('backend.pages.purchase.pending',compact('supplier','category','unit','brand'));
    }

    public function PurchaseApprove($id){
      $purchase = Purchase::findOrFail($id);
      $product = Product::where('id',$purchase->product_id)->first();
      $purchase_qty = ((float)($purchase->buying_qty))+((float)($product->quantity));
      $product->quantity = $purchase_qty;
      if($product->save()){
          Purchase::findOrFail($id)->update([
              'status' => '1',
          ]);
          $notification = array('message' => 'Status Approved Successfully', 'alert-type' => 'success');
          return redirect()->route('PurchaseAll')->with($notification);
      }
    }

    public function PurchaseDailyReport()
    {
      return view('backend.pages.purchase.purchase_daily_report');

    }



public function DailypurchasePdf(Request $request)
{
  $sdate = date('Y-m-d',strtotime($request->start_date));
  $edate = date('Y-m-d',strtotime($request->end_date));
  $allData = Purchase::whereBetween('date',[$sdate,$edate])->where('status','1')->get();


  $start_date = date('Y-m-d',strtotime($request->start_date));
  $end_date = date('Y-m-d',strtotime($request->end_date));
  return view('backend.pages.pdf.daily_purchase_report_pdf',compact('allData','start_date','end_date'));
}









}
