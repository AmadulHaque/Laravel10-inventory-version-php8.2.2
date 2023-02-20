		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<a href="/dashboard">
					<img src="{{asset('backend/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
					</a>
				</div>
				<div>
					<a href="/dashboard">
					<h4 class="logo-text">Rukada</h4>
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
						<li> <a href="{{route('customerAll')}}"><i class="bx bx-right-arrow-alt"></i>All Customer</a>
						</li>
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
						<li> <a href="{{route('PurchasePending')}}"><i class="bx bx-right-arrow-alt"></i> Purchase Pending</a>
						</li>
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

					</ul>
				</li>




			</ul>
		</div>
