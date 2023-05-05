<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\{Customer,Payment,PaymentDetail};
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
              if ($img->customer_image) {
                unlink($img->customer_image);
              }
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



    public function CreditCustomer(Request $request)
    {
      if ($request->ajax()) {
          $search = @$request->search;
          $perPage = @$request->perPage ? $request->perPage : 10;
          $data=Payment::whereIn('paid_status',['full_due','partial_paid']);
          $datas = $data->paginate($perPage);
          return view('backend.components.customer.credit_table',compact('datas'));
      }
      return view('backend.pages.customer.credit_customer');
    }



    public function CreditCustomerPrintPdf(){

         $allData = Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
         return view('backend.pages.pdf.customer_credit_pdf',compact('allData'));

     }// End Method

     public function CustomerEditInvoice($invoice_id){

          $payment = Payment::where('invoice_id',$invoice_id)->first();
          return view('backend.pages.customer.edit_customer_invoice',compact('payment'));

      }// End Method
      public function CustomerUpdateInvoice(Request $request,$invoice_id){
          if ($request->new_paid_amount < $request->paid_amount) {

              $notification = array(
              'message' => 'Sorry You Paid Maximum Value',
              'alert-type' => 'error'
          );
          return redirect()->back()->with($notification);
          } else{
              $payment = Payment::where('invoice_id',$invoice_id)->first();
              $payment_details = new PaymentDetail();
              $payment->paid_status = $request->paid_status;

              if ($request->paid_status == 'full_paid') {
                   $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->new_paid_amount;
                   $payment->due_amount = '0';
                   $payment_details->current_paid_amount = $request->new_paid_amount;

              } elseif ($request->paid_status == 'partial_paid') {
                  $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->paid_amount;
                  $payment->due_amount = Payment::where('invoice_id',$invoice_id)->first()['due_amount']-$request->paid_amount;
                  $payment_details->current_paid_amount = $request->paid_amount;
              }

              $payment->save();
              $payment_details->invoice_id = $invoice_id;
              $payment_details->date = date('Y-m-d',strtotime($request->date));
              $payment_details->updated_by = Auth::user()->id;
              $payment_details->save();
              $notification = array(
              'message' => 'Invoice Update Successfully',
              'alert-type' => 'success'
          );
          return redirect()->route('CreditCustomer')->with($notification);
          }
      }// End Method

      public function CustomerInvoiceDetails($invoice_id){
        $payment = Payment::where('invoice_id',$invoice_id)->first();
        return view('backend.pages.pdf.invoice_details_pdf',compact('payment'));
      }// End Method

      public function PaidCustomer(Request $request){
        $allData = Payment::where('paid_status','!=','full_due')->get();
        if ($request->ajax()) {
          $search = @$request->search;
          $perPage = @$request->perPage ? $request->perPage : 10;
          $data=Payment::where('paid_status','!=','full_due');
          $datas = $data->paginate($perPage);
          return view('backend.components.customer.paid_table',compact('datas'));
      }
        return view('backend.pages.customer.customer_paid');
      }// End Method


    public function PaidCustomerPrintPdf(){
        $allData = Payment::where('paid_status','!=','full_due')->get();
        return view('backend.pages.pdf.customer_paid_pdf',compact('allData'));
    }// End Method


    public function CustomerWiseReport(){
        $customers = Customer::all();
        return view('backend.pages.customer.customer_wise_report',compact('customers'));
    }// End Method



    public function CustomerWiseCreditReport(Request $request){

         $allData = Payment::where('customer_id',$request->customer_id)->whereIn('paid_status',['full_due','partial_paid'])->get();
        return view('backend.pages.pdf.customer_wise_credit_pdf',compact('allData'));
    }// End Method


    public function CustomerWisePaidReport(Request $request){

         $allData = Payment::where('customer_id',$request->customer_id)->where('paid_status','!=','full_due')->get();
        return view('backend.pages.pdf.customer_wise_paid_pdf',compact('allData'));
    }// End Method









}
