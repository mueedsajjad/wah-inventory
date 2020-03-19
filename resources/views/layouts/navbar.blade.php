<nav class="main-header navbar navbar-expand-md navbar-dark  py-0">
    <div class="container-fluid">
        <a href="#" class="navbar-brand">
            <!-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                  style="opacity: .8">-->
            <span class="brand-text font-weight-normal"><img class=" pr-3" src="{{asset('public/img/logo.png ')}}" alt="logo" > SGA - WAH Industries</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                @if(auth()->user()->can('Dashboard'))
                <li class="nav-item">
                    <a class="btn m-0 btn-app" href="{{url('store/dashboard')}}">
                        <i class="fas fa-chart-line"></i>Dashboard
                    </a>
                </li>
                @endif

                @if(auth()->user()->can('Production'))
                <li class="nav-item dropdown">
                    <a class=" dropdown-toggle btn m-0 btn-app" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-spray-can"></i>
                        Production
                    </a>

                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{url('production/dashboard')}}">Production Dashboard</a>
                        <a class="dropdown-item" href="{{url('production/componentDashboard')}}">Component Dashboard</a>
                        <a class="dropdown-item" href="{{url('production/newOrder')}}">New Production Order</a>
                        <a class="dropdown-item" href="{{url('production/orderComponent')}}">New Component Order</a>

                        <a class="dropdown-item" href="{{url('production/materialRequisition')}}">Request For Material</a>
                        <a class="dropdown-item" href="{{url('production/orderComponent')}}">Request For Component</a>
                    </div>
                </li>
                @endif

{{--                <li class="nav-item dropdown">--}}
{{--                    <a id="dropdownSubMenu1" href="gate.html"  class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-edit"></i>--}}
{{--                        Gate Pass</a>--}}
{{--                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                        <li><a href="#" class="dropdown-item">Some action </a></li>--}}
{{--                        <li><a href="#" class="dropdown-item">Some other action</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
                @if(auth()->user()->can('Gate'))
                <li class="nav-item dropdown">
                    <a class=" dropdown-toggle btn m-0 btn-app" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-edit"></i>
                        Gate
                    </a>

                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{url('gate/dashboard')}}">Dashboard</a>
                        <a class="dropdown-item" href="{{url('gate/inwardGatePass')}}">Inward Gate Pass</a>
                        <a class="dropdown-item" href="{{url('admin/attendance')}}"> Attendance</a>
                        <a class="dropdown-item" href="{{url('gate/security')}}"> Security</a>
                        <a class="dropdown-item" href="{{url('gate/outVehicle')}}">Vehicle Out</a>
                        <a class="dropdown-item" href="{{url('gate/inVehicle')}}">Vehicle In</a>
                        <a class="dropdown-item" href="{{url('gate/report')}}"> Reports</a>
                    </div>
                </li>
                @endif

                @if(auth()->user()->can('Supplier'))
                        <li class="nav-item dropdown">
                            <a class=" dropdown-toggle btn m-0 btn-app" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-truck"></i></i>
                                Supplier
                            </a>

                            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{url('supplier/supplier')}}">Add Supplier</a>
                                <a class="dropdown-item" href="{{url('supplier/viewSuppliers')}}">View Suppliers</a>
                                <a class="dropdown-item" href="{{url('supplier/setting')}}">Setting</a>
                            </div>
                        </li>

{{--                <li class="nav-item dropdown">--}}
{{--                    <a id="dropdownSubMenu3" href="#"  class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-truck"></i>--}}
{{--                        Supplier</a>--}}
{{--                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                        <li><a href="{{url('supplier/supplier')}}" class="dropdown-item">Supplier </a></li>--}}
{{--                        <li><a href="{{url('supplier/setting')}}" class="dropdown-item">Setting </a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
                @endif

                @if(auth()->user()->can('Sale'))
                <li class="nav-item dropdown">
                    <a class=" dropdown-toggle btn m-0 btn-app" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-dollar-sign"></i>
                        Sale
                    </a>

                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{url('sale/sale')}}">Sales</a>
                        <a class="dropdown-item" href="{{url('sale/saleOrder')}}">Sales Order</a>
                        <a class="dropdown-item" href="#">List Sale</a>
                        <a class="dropdown-item" href="{{url('sale/customer')}}"> Customer</a>
                    </div>
                </li>
                @endif

{{--                <li class="nav-item dropdown">--}}
{{--                    <a id="dropdownSubMenu7" href="sales.html" class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-dollar-sign"></i>--}}
{{--                        Sales</a>--}}
{{--                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                        <li><a href="#" class="dropdown-item">Some action </a></li>--}}
{{--                        <li><a href="#" class="dropdown-item">Some other action</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

{{--                <li class="nav-item dropdown">--}}
{{--                    <a class=" dropdown-toggle btn m-0 btn-app" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-boxes"></i>--}}
{{--                        Purchase--}}
{{--                    </a>--}}

{{--                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">--}}
{{--                        <a class="dropdown-item" href="{{url('gate/dashboard')}}">Dashboard</a>--}}
{{--                        <a class="dropdown-item" href="{{url('gate/gate')}}">Gate</a>--}}
{{--                        <a class="dropdown-item" href="{{url('gate/attendance')}}"> Store</a>--}}
{{--                        <a class="dropdown-item" href="{{url('gate/security')}}"> Security</a>--}}
{{--                        <a class="dropdown-item" href="{{url('gate/vehicle')}}">Vehicle Management</a>--}}
{{--                        <a class="dropdown-item" href="{{url('gate/report')}}"> Reports</a>--}}
{{--                    </div>--}}
{{--                </li>--}}

                @if(auth()->user()->can('Purchase'))
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu4" href="{{url('purchase/purchase')}}" class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-boxes"></i>
                        Purchase</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">
                        <li><a href="#" class="dropdown-item">Some action </a></li>
                        <li><a href="#" class="dropdown-item">Some other action</a></li>
                    </ul>
                </li>

                @endif
                @if(auth()->user()->can('Store'))
                <li class="nav-item dropdown">
                    <a class=" dropdown-toggle btn m-0 btn-app" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-edit"></i>
                        Store
                    </a>

                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{url('store/dashboard')}}">Dashboard</a>
                        @if(auth()->user()->can('Assign Stores'))
                        <a class="dropdown-item" href="{{url('store/assignStore')}}">Assign Stores</a>
                        @endif
                        <a class="dropdown-item" href="{{url('store/allStores')}}">Stores</a>
{{--                        <a class="dropdown-item" href="{{url('store/addMaterial')}}">Add New</a>--}}
{{--                        <a class="dropdown-item" href="{{url('store/rawMaterial')}}">Material</a>--}}
{{--                        <a class="dropdown-item" href="{{url('store/product')}}">Products</a>--}}
                        <a class="dropdown-item" href="{{url('store/newBuiltyArrival')}}">New Builty Arrivals</a>
                        <a class="dropdown-item" href="{{url('store/approveForInspectionNote')}}">Approve for I-Note</a>
                        <a class="dropdown-item" href="{{url('store/inwardInspectionNote')}}">Inward I-Note</a>
                        <a class="dropdown-item" href="{{url('store/inwardGoodsReceipt')}}">Inward Goods Receipt</a>
                        <a class="dropdown-item" href="{{url('store/deliveryOrder')}}">Delivery Order</a>
                        <a class="dropdown-item" href="{{url('store/IssueRequisition')}}">Issue / Requisition</a>
                        <a class="dropdown-item" href="{{url('store/report')}}">Reports</a>
                    </div>
                </li>
                @endif

                @if(auth()->user()->can('Quality'))
                <li class="nav-item dropdown">
                    <a class=" dropdown-toggle btn m-0 btn-app" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-edit"></i>
                        Quality
                    </a>

                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{url('qa/dashboard')}}">Dashboard</a>
                        <a class="dropdown-item" href="{{url('qa/qualityControl')}}">Quality Control</a>
                        <a class="dropdown-item" href="#"> Quality Assurance</a>
                        <a class="dropdown-item" href="{{url('qa/report')}}"> Reports</a>
                    </div>
                </li>
                @endif

                @if(auth()->user()->can('HR'))
                <li class="nav-item dropdown">
                    <a class=" dropdown-toggle btn m-0 btn-app" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-edit"></i>
                      HR
                    </a>

                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{url('qa/dashboard')}}">Dashboard</a>
                        <a class="dropdown-item" href="{{url('admin/employee')}}">Employees</a>
                        <a class="dropdown-item" href="{{url('admin/attendance')}}"> Attendance</a>

                        @if(auth()->user()->can('Accept Leave Request'))
                        <a class="dropdown-item" href="{{url('admin/leave')}}"> Leaves</a>
                        @endif

                        @if(auth()->user()->can('Apply for Attendance'))
                            <a class="dropdown-item" href="{{url('admin/leaveOfficer')}}"> Leaves</a>
                        @endif


                        <a class="dropdown-item" href="{{url('admin/salary')}}">Salaries</a>
                        <a class="dropdown-item" href="{{url('admin/advance')}}"> Advance</a>
                        <a class="dropdown-item" href="{{url('admin/report')}}"> Reports </a>
                    </div>
                </li>
                @endif


                @if(auth()->user()->hasRole('GM'))
                <li class="nav-item dropdown">
                    <a class=" dropdown-toggle btn m-0 btn-app" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-users-cog nav-icon"></i>
                        Role Management
                    </a>

                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{url('/role')}}">Roles</a>
                        <a class="dropdown-item" href="{{url('permission')}}">Permission</a>
                        <a class="dropdown-item" href="{{url('/assign-permission')}}"> Assign Permission To Roles</a>
                        <a class="dropdown-item" href="{{url('/assign-role')}}"> Assign Roles to User</a>
                    </div>
                </li>

                @endif



{{--                <li class="nav-item dropdown">--}}
{{--                    <a class=" dropdown-toggle btn m-0 btn-app" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-edit"></i>--}}
{{--                       GMSGA--}}
{{--                    </a>--}}

{{--                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">--}}
{{--                        <a class="dropdown-item" href="{{url('qa/dashboard')}}">Dashboard</a>--}}
{{--                        <a class="dropdown-item" href="{{url('gmsga/production')}}">Production</a>--}}
{{--                        <a class="dropdown-item" href="{{url('gmsga/gate')}}">Gate</a>--}}
{{--                        <a class="dropdown-item" href="{{url('gmsga/store')}}"> Store</a>--}}
{{--                        <a class="dropdown-item" href="{{url('admin/leave')}}"> HR / Admin</a>--}}
{{--                        <a class="dropdown-item" href="{{url('admin/salary')}}">Supplier</a>--}}
{{--                        <a class="dropdown-item" href="{{url('admin/advance')}}"> Purchase</a>--}}
{{--                        <a class="dropdown-item" href="{{url('admin/report')}}"> Production </a>--}}
{{--                        <a class="dropdown-item" href="{{url('admin/report')}}"> Sales </a>--}}
{{--                        <a class="dropdown-item" href="{{url('admin/report')}}"> Quality </a>--}}
{{--                        <a class="dropdown-item" href="{{url('admin/report')}}"> Settings </a>--}}
{{--                    </div>--}}


{{--                </li>--}}

                    <li class="nav-item dropdown">
                        <a class=" dropdown-toggle btn m-0 btn-app" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-edit"></i>
                            Settings
                        </a>

                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{url('setting/setting')}}">Settings</a>
                            <a class="dropdown-item" href="{{url('setting/settingGeneral')}}">General Settings</a>
                            <a class="dropdown-item" href="{{url('setting/dutySchedule')}}">Duty hours settings</a>
                            <a class="dropdown-item" href="{{url('setting/leave')}}">Leave settings</a>
                        </div>

                    </li>

{{--                <li class="nav-item">--}}
{{--                    <a class="dropdown-toggle btn m-0 btn-app" href="{{url('setting/setting')}}"><i class="fas fa-edit"></i>--}}
{{--                        Settings--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">--}}
{{--                        <a class="dropdown-item" href="{{url('qa/dashboard')}}">Dashboard</a>--}}
{{--                        <a class="dropdown-item" href="{{url('gmsga/production')}}">Production</a>--}}
{{--                        <a class="dropdown-item" href="{{url('gmsga/gate')}}">Gate</a>--}}
{{--                        <a class="dropdown-item" href="{{url('gmsga/store')}}"> Store</a>--}}
{{--                        <a class="dropdown-item" href="{{url('admin/leave')}}"> HR / Admin</a>--}}
{{--                        <a class="dropdown-item" href="{{url('admin/salary')}}">Supplier</a>--}}
{{--                        <a class="dropdown-item" href="{{url('admin/advance')}}"> Purchase</a>--}}
{{--                        <a class="dropdown-item" href="{{url('admin/report')}}"> Production </a>--}}
{{--                        <a class="dropdown-item" href="{{url('admin/report')}}"> Sales </a>--}}
{{--                        <a class="dropdown-item" href="{{url('admin/report')}}"> Quality </a>--}}
{{--                        <a class="dropdown-item" href="{{url('admin/report')}}"> Settings </a>--}}
{{--                    </div>--}}

{{--                                        </li>--}}

                                    </ul>
                                </div>

                                <!-- Right navbar links -->
                                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                                    <li class="nav-item dropdown ml-auto text-right">

                        {{--                <a id="dropdownSubMenu13" href="index.html" class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-sign-out-alt"></i>--}}
{{--                    Logout</a>--}}

                <a class="dropdown-toggle btn m-0 btn-app" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"  ><i class="fas fa-sign-out-alt"></i>
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

        </ul>
    </div>
</nav>
