		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<a href="/dashboard">
					<img src="{{(!empty($setting->logo)) ? url('images/setting/'.$setting->logo):url('images/profile/no_image.jpeg') }}" class="logo-icon" alt="logo icon">
					</a>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
					<ul>
						<li> <a href="/dashboard"><i class="bx bx-right-arrow-alt"></i>Dashboard</a>
						</li>
					</ul>
				</li>

				<!--Manage Supplier  -->
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Manage Supplier</div>
					</a>
					<ul>
						<li> <a href="{{route('supplierAll')}}"><i class="bx bx-right-arrow-alt"></i>All Supplier</a>
						</li>
					</ul>
				</li>

				<!--Manage Customer  -->
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Manage Customer</div>
					</a>
					<ul>
						<li> <a href="{{route('customerAll')}}"><i class="bx bx-right-arrow-alt"></i>All Customer</a></li>
						<li> <a href="{{route('CreditCustomer')}}"><i class="bx bx-right-arrow-alt"></i>Credit Customer</a></li>
						<li> <a href="{{route('paid.customer')}}"><i class="bx bx-right-arrow-alt"></i>Paid Customer</a></li>
						<li> <a href="{{route('customer.wise.report')}}"><i class="bx bx-right-arrow-alt"></i>Customer Wise Report</a></li>
					</ul>
				</li>


				<!--Manage Unit  -->
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Manage Unit</div>
					</a>
					<ul>
						<li> <a href="{{route('unitAll')}}"><i class="bx bx-right-arrow-alt"></i>All Unit</a>
						</li>
					</ul>
				</li>

				<!--Manage Category  -->
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Manage Category</div>
					</a>
					<ul>
						<li> <a href="{{route('CategoryAll')}}"><i class="bx bx-right-arrow-alt"></i>All Category</a>
						</li>
					</ul>
				</li>

				<!--Manage Brand  -->
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Manage Brand</div>
					</a>
					<ul>
						<li> <a href="{{route('BrandAll')}}"><i class="bx bx-right-arrow-alt"></i>All Brand</a>
						</li>
					</ul>
				</li>

				<!--Manage Product  -->
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Manage Product</div>
					</a>
					<ul>
						<li> <a href="{{route('ProductAll')}}"><i class="bx bx-right-arrow-alt"></i>All Product</a>
						</li>
					</ul>
				</li>

				<!--Manage Purchase  -->
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Manage Purchase</div>
					</a>
					<ul>
						<li> <a href="{{route('PurchaseAll')}}"><i class="bx bx-right-arrow-alt"></i>All Purchase</a>
						</li>
						<li> <a href="{{route('PurchaseAdd')}}"><i class="bx bx-right-arrow-alt"></i>Add Purchase</a>
						</li>
						<li> <a href="{{route('PurchasePending')}}"><i class="bx bx-right-arrow-alt"></i> Purchase Pending</a>	</li>
						<li> <a href="{{route('PurchaseDailyReport')}}"><i class="bx bx-right-arrow-alt"></i>Daily Purchase Report</a>	</li>
					</ul>
				</li>

				<!--Manage Purchase  -->
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Manage Invoice</div>
					</a>
					<ul>
						<li> <a href="{{route('InvoiceAll')}}"><i class="bx bx-right-arrow-alt"></i>All Invoice</a>
						</li>
						<li> <a href="{{route('InvoiceAdd')}}"><i class="bx bx-right-arrow-alt"></i>Add Invoice</a>
						</li>
						<li> <a href="{{route('InvoicePendinglist')}}"><i class="bx bx-right-arrow-alt"></i>Invoice Pending</a>
						</li>
						<li> <a href="{{route('InvoicePrintList')}}"><i class="bx bx-right-arrow-alt"></i>Invoice Print List</a>
						</li>
						<li> <a href="{{route('daily.invoice.report')}}"><i class="bx bx-right-arrow-alt"></i>Daily Invoice Report</a>
						</li>
					</ul>
				</li>

						<!--Manage Purchase  -->
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Manage Stock</div>
					</a>
					<ul>
						<li> <a href="{{route('stock.report')}}"><i class="bx bx-right-arrow-alt"></i>Stock Report</a></li>
						<li> <a href="{{route('stock.supplier.wise')}}"><i class="bx bx-right-arrow-alt"></i>Supplier / Product Wise</a></li>
					</ul>
				</li>

					<!--Manage Setting  -->
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Manage Setting</div>
					</a>
					<ul>
						<li> <a href="{{route('GetSetting')}}"><i class="bx bx-right-arrow-alt"></i>All Settings</a></li>
					</ul>
				</li>



			</ul>
		</div>
