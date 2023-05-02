<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\{User,InvoiceDetail};
use Image,DB;
class AdminController extends Controller
{
    //
    public function adminLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function adminDashboard()
    {
        $purchases = DB::table('purchases')->where('status',1)->sum('buying_price');
        $invoice = DB::table('invoice_details')->where('status',1)->sum('selling_price');
        $expense = DB::table('expenses')->where('status',1)->sum('amount');
        $products = DB::table('products')->where('status',1)->count();
        // amount sum end
        $customers =  DB::table('customers')->count();
        $suppliers =  DB::table('suppliers')->count();
        $purchasesCount =  DB::table('purchases')->where('status',1)->count();
        $invoiceCount =  DB::table('invoices')->where('status',1)->count();
        //  count end
        $productStockOut = DB::table('products')->where('status',1)->where('quantity',">",0)->get();
        $saleList = InvoiceDetail::where('status',1)->orderBy('id','asc')->latest()->limit(10)->get();
        // salse  monthly chart
        $amount_sales = InvoiceDetail::select(DB::raw("(SUM(selling_price)) as price"))
            ->whereYear('created_at',date('Y'))
            ->where('status',1)
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('price');
        $salse_months = InvoiceDetail::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at',date('Y'))
            ->where('status',1)
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');
        $datas = [0,0,0,0,0,0,0,0,0,0,0,0];
        foreach($salse_months as $index => $month)
        {
        $datas[$month-1] = $amount_sales[$index];
        }
        $data = compact('saleList','productStockOut','purchases','invoice','products','expense','customers','suppliers','purchasesCount','invoiceCount','datas');
        return view('backend.index',$data);
    }

    public function adminProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.components.profile.index',compact('user'));
    }

    public function AdminProfileUpdate(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('images/profile/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images/profile/'),$filename);
            $data['photo'] = $filename;
        }

        $data->save();
        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function AdminChangePassword(){
        return view('backend.components.profile.setting');
    }


  public function AdminUpdatePassword(Request $request){
        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with("error", "Old Password Doesn't Match!!");
        }

        // Update The new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)

        ]);
        return back()->with("status", " Password Changed Successfully");

    } // End Mehtod


}
