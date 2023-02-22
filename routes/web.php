<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


 Route::middleware('auth')->group(function(){


Route::controller(AdminController::class)->group(function () {
  Route::get('/dashboard','adminDashboard')->name('dashboard');
   Route::get('/admin/logout', 'adminLogout')->name('admin.logout');
   Route::get('/admin/profile', 'adminProfile')->name('admin.profile');
   Route::post('/admin/profile/update', 'AdminProfileUpdate')->name('admin.profile.update');

   Route::get('/admin/change/password', 'AdminChangePassword')->name('admin.change.password');
   Route::post('/admin/update/password', 'AdminUpdatePassword')->name('update.password');

});

Route::controller(SupplierController::class)->group(function () {
  Route::get('/suppliers','supplierAll')->name('supplierAll');
  Route::post('/supplier/store','SupplierStore')->name('supplierStore');
  Route::get('/supplier/remove/{id}','SupplierRemove')->name('SupplierRemove');
  Route::get('/supplier/edit/{id}','SupplierEdit')->name('SupplierEdit');
  Route::post('/supplier/update','SupplierUpdate')->name('SupplierUpdate');
});

Route::controller(CustomerController::class)->group(function () {
  Route::get('/customers','customerAll')->name('customerAll');
  Route::post('/customer/store','customerStore')->name('customerStore');
  Route::get('/customer/edit/{id}','customerEdit')->name('customerEdit');
  Route::post('/customer/update','CustomerUpdate')->name('CustomerUpdate');
  Route::get('/customer/remove/{id}','CustomerRemove')->name('CustomerRemove');

  Route::get('/credit/customer','CreditCustomer')->name('CreditCustomer');
  Route::get('/credit/customer/print/pdf', 'CreditCustomerPrintPdf')->name('credit.customer.print.pdf');

  Route::get('/customer/edit/invoice/{invoice_id}', 'CustomerEditInvoice')->name('customer.edit.invoice');
  Route::get('/customer/invoice/details/{invoice_id}', 'CustomerInvoiceDetails')->name('customer.invoice.details.pdf');
  Route::post('/customer/update/invoice/{invoice_id}', 'CustomerUpdateInvoice')->name('customer.update.invoice');
  Route::get('/paid/customer', 'PaidCustomer')->name('paid.customer');
  Route::get('/paid/customer/print/pdf', 'PaidCustomerPrintPdf')->name('paid.customer.print.pdf');

  Route::get('/customer/wise/report', 'CustomerWiseReport')->name('customer.wise.report');
  Route::get('/customer/wise/credit/report', 'CustomerWiseCreditReport')->name('customer.wise.credit.report');
  Route::get('/customer/wise/paid/report', 'CustomerWisePaidReport')->name('customer.wise.paid.report');


});

Route::controller(UnitController::class)->group(function () {
  Route::get('/units','unitAll')->name('unitAll');
  Route::post('/unit/store','unitStore')->name('unitStore');
  Route::get('/unit/edit/{id}','unitEdit')->name('unitEdit');
  Route::post('/unit/update','unitUpdate')->name('unitUpdate');
  Route::get('/unit/remove/{id}','unitRemove')->name('unitRemove');
});

Route::controller(CategoryController::class)->group(function () {
  Route::get('/categories','CategoryAll')->name('CategoryAll');
  Route::post('/categorie/store','CategoryStore')->name('CategoryStore');
  Route::get('/categorie/edit/{id}','CategoryEdit')->name('CategoryEdit');
  Route::post('/categorie/update','CategoryUpdate')->name('CategoryUpdate');
  Route::get('/categorie/remove/{id}','CategoryRemove')->name('CategoryRemove');
});

Route::controller(BrandController::class)->group(function () {
  Route::get('/brands','BrandAll')->name('BrandAll');
  Route::post('/brand/store','BrandStore')->name('BrandStore');
  Route::get('/brand/edit/{id}','BrandEdit')->name('BrandEdit');
  Route::post('/brand/update','BrandUpdate')->name('BrandUpdate');
  Route::get('/brand/remove/{id}','BrandRemove')->name('BrandRemove');
});

Route::controller(ProductController::class)->group(function () {
  Route::get('/products','ProductAll')->name('ProductAll');
  Route::post('/product/store','ProductStore')->name('ProductStore');
  Route::get('/product/edit/{id}','ProductEdit')->name('ProductEdit');
  Route::post('/product/update','ProductUpdate')->name('ProductUpdate');
  Route::get('/product/remove/{id}','ProductRemove')->name('ProductRemove');
});


Route::controller(PurchaseController::class)->group(function () {
  Route::get('/purchases','PurchaseAll')->name('PurchaseAll');
  Route::get('/purchase/add','PurchaseAdd')->name('PurchaseAdd');
  Route::post('/purchase-store','PurchaseStore')->name('PurchaseStore');
  Route::get('/purchase/remove/{id}','PurchaseRemove')->name('PurchaseRemove');
  Route::get('/purchase/pending','PurchasePending')->name('PurchasePending');
  Route::get('/purchase/daily/report', 'PurchaseDailyReport')->name('PurchaseDailyReport');
  Route::get('/daily/purchase/pdf', 'DailypurchasePdf')->name('DailypurchasePdf');
  Route::get('/purchase/approve/{id}', 'PurchaseApprove')->name('purchase.approve');

});


// Invoice
Route::controller(InvoiceController::class)->group(function () {
  Route::get('invoices','InvoiceAll')->name('InvoiceAll');
  Route::get('/invoice/add','InvoiceAdd')->name('InvoiceAdd');
  Route::post('/invoice/store','InvoiceStore')->name('InvoiceStore');

  Route::get('/invoice/pending/list','InvoicePendinglist')->name('InvoicePendinglist');
  Route::get('/invoice/remove/{id}','InvoiceRemove')->name('InvoiceRemove');
  Route::get('/invoice/approve/{id}','InvoiceApprove')->name('InvoiceApprove');

  Route::post('/invoice/approve/store/{id}','ApprovalStore')->name('ApprovalStore');
  Route::get('/invoice/print/list','InvoicePrintList')->name('InvoicePrintList');
  Route::get('/print/invoice/{id}', 'PrintInvoice')->name('print.invoice');

  Route::get('/daily/invoice/report', 'DailyInvoiceReport')->name('daily.invoice.report');
  Route::get('/daily/invoice/pdf', 'DailyInvoicePdf')->name('daily.invoice.pdf');
});


Route::controller(StockController::class)->group(function () {
    Route::get('/stock/report', 'StockReport')->name('stock.report');
    Route::get('/stock/report/pdf', 'StockReportPdf')->name('stock.report.pdf');

    Route::get('/stock/supplier/wise', 'StockSupplierWise')->name('stock.supplier.wise');
    Route::get('/supplier/wise/pdf', 'SupplierWisePdf')->name('supplier.wise.pdf');
    Route::get('/product/wise/pdf', 'ProductWisePdf')->name('product.wise.pdf');

});



// settings All Route
Route::controller(SettingController::class)->group(function () {
    Route::get('/settings', 'GetSetting')->name('GetSetting');
    Route::post('/setting/update', 'updateSetting')->name('updateSetting');





    //////////
    Route::get('/setting/header_bg', 'SettingHeader')->name('SettingHeader');
    Route::get('/setting/sideber_bg', 'SettingSideber')->name('SettingSideber');
});







}); // End Group Middleware


// Default All Route
Route::controller(DefaultController::class)->group(function () {
    Route::get('/get-category', 'GetCategory')->name('get-category');
    Route::get('/get-brand', 'GetBrand')->name('get-brand');
    Route::get('/get-product', 'GetProduct')->name('get-product');
    Route::get('/check-product', 'GetStock')->name('check-product-stock');
});




require __DIR__.'/auth.php';
