
{{--<nav class="main-header navbar navbar-expand-md navbar-dark  py-0">--}}
{{--    <div class="container-fluid">--}}
{{--        <a href="#" class="navbar-brand">--}}
{{--            <!-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
{{--                  style="opacity: .8">-->--}}
{{--            <span class="brand-text font-weight-normal"><img class=" pr-3" src="{{asset('public/img/logo.png ')}}" alt="logo" > SGA - WAH Industries</span>--}}
{{--        </a>--}}

{{--        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}

{{--        <div class="collapse navbar-collapse order-3" id="navbarCollapse">--}}
{{--            <!-- Left navbar links -->--}}
{{--            <ul class="navbar-nav">--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>--}}
{{--                </li>--}}
{{--                @if(auth()->user()->can('Dashboard'))--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="btn m-0 btn-app" href="{{url('store/dashboard')}}">--}}
{{--                        <i class="fas fa-chart-line"></i>Dashboard--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                @endif--}}

{{--                @if(auth()->user()->can('Production'))--}}
{{--                <li class="nav-item dropdown">--}}
{{--                    <a class=" dropdown-toggle btn pl-0 pr-0  m-0 btn-app" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-spray-can"></i>--}}
{{--                        Production--}}
{{--                    </a>--}}

{{--                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">--}}
{{--                        <a class="dropdown-item" href="{{url('production/dashboard')}}">Production Dashboard</a>--}}
{{--                        <a class="dropdown-item" href="{{url('production/componentDashboard')}}">Component Dashboard</a>--}}
{{--                        <a class="dropdown-item" href="{{url('production/newOrder')}}">New Production Order</a>--}}
{{--                        <a class="dropdown-item" href="{{url('production/orderComponent')}}">New Component Order</a>--}}

{{--                        <a class="dropdown-item" href="{{url('production/materialRequisition')}}">Request For Material</a>--}}
{{--                        <a class="dropdown-item" href="{{url('production/componentRequisition')}}">Request For Component</a>--}}

{{--                        <a class="dropdown-item" href="{{url('production/allComponentRequisition')}}">All Component Requisition</a>--}}
{{--                        <a class="dropdown-item" href="{{url('production/allMaterialRequisition')}}">All Material Requisition</a>--}}

{{--                    </div>--}}
{{--                </li>--}}
{{--                @endif--}}

{{--                <li class="nav-item dropdown">--}}
{{--                    <a id="dropdownSubMenu1" href="gate.html"  class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-edit"></i>--}}
{{--                        Gate Pass</a>--}}
{{--                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                        <li><a href="#" class="dropdown-item">Some action </a></li>--}}
{{--                        <li><a href="#" class="dropdown-item">Some other action</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                @if(auth()->user()->can('Gate'))--}}
{{--                <li class="nav-item dropdown">--}}
{{--                    <a class=" dropdown-toggle btn pl-0 pr-0  m-0 btn-app" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-dungeon"></i>--}}
{{--                        Gate--}}
{{--                    </a>--}}

{{--                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">--}}
{{--                        <a class="dropdown-item" href="{{url('gate/dashboard')}}">Dashboard</a>--}}
{{--                        <a class="dropdown-item" href="{{url('gate/inwardGatePass')}}">Inward Gate Pass</a>--}}
{{--                        <a class="dropdown-item" href="{{url('admin/attendance')}}"> Attendance</a>--}}
{{--                        <a class="dropdown-item" href="{{url('gate/security')}}"> Security</a>--}}
{{--                        <a class="dropdown-item" href="{{url('gate/vehicleManagement')}}">Vehicle Management</a>--}}
{{--                        <a class="dropdown-item" href="{{url('gate/report')}}"> Reports</a>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                @endif--}}

{{--                @if(auth()->user()->can('Supplier'))--}}
{{--                        <li class="nav-item dropdown">--}}
{{--                            <a class=" dropdown-toggle btn pl-0 pr-0  m-0 btn-app" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-truck"></i></i>--}}
{{--                                Supplier--}}
{{--                            </a>--}}

{{--                            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">--}}
{{--                                <a class="dropdown-item" href="{{url('supplier/supplier')}}">Add Supplier</a>--}}
{{--                                <a class="dropdown-item" href="{{url('supplier/viewSuppliers')}}">View Suppliers</a>--}}
{{--                            </div>--}}
{{--                        </li>--}}

{{--                <li class="nav-item dropdown">--}}
{{--                    <a id="dropdownSubMenu3" href="#"  class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-truck"></i>--}}
{{--                        Supplier</a>--}}
{{--                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                        <li><a href="{{url('supplier/supplier')}}" class="dropdown-item">Supplier </a></li>--}}
{{--                        <li><a href="{{url('supplier/setting')}}" class="dropdown-item">Setting </a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                @endif--}}

{{--                @if(auth()->user()->can('Sale'))--}}
{{--                <li class="nav-item dropdown">--}}
{{--                    <a class=" dropdown-toggle btn pl-0 pr-0  m-0 btn-app" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-dollar-sign"></i>--}}
{{--                        Sale--}}
{{--                    </a>--}}

{{--                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">--}}
{{--                        <a class="dropdown-item" href="{{url('sale/sale')}}">Sales</a>--}}
{{--                        <a class="dropdown-item" href="{{url('sale/saleOrder')}}">Sales Order</a>--}}
{{--                        <a class="dropdown-item" href="#">List Sale</a>--}}
{{--                        <a class="dropdown-item" href="{{url('sale/customer')}}"> Customer</a>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                @endif--}}

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

{{--                @if(auth()->user()->can('Purchase'))--}}
{{--                <li class="nav-item dropdown">--}}
{{--                    <a id="dropdownSubMenu4" href="{{url('purchase/purchase')}}" class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-boxes"></i>--}}
{{--                        Purchase</a>--}}
{{--                    <!-- <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                        <li><a href="#" class="dropdown-item">Some action </a></li>--}}
{{--                        <li><a href="#" class="dropdown-item">Some other action</a></li>--}}
{{--                    </ul> -->--}}
{{--                </li>--}}

{{--                @endif--}}
{{--                @if(auth()->user()->can('Store'))--}}
{{--                <li class="nav-item dropdown">--}}
{{--                    <a class=" dropdown-toggle btn pl-0 pr-0  m-0 btn-app" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-store"></i>--}}
{{--                        Store--}}
{{--                    </a>--}}

{{--                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">--}}
{{--                        <a class="dropdown-item" href="{{url('store/dashboard')}}">Dashboard</a>--}}
{{--                        <a class="dropdown-item" href="{{url('store/newBuiltyArrival')}}">New Builty Arrivals</a>--}}
{{--                        <a class="dropdown-item" href="{{url('store/approveForInspectionNote')}}">Approve for I-Note</a>--}}
{{--                        <a class="dropdown-item" href="{{url('store/inwardInspectionNote')}}">Inward I-Note</a>--}}
{{--                        <a class="dropdown-item" href="{{url('store/inwardGoodsReceipt')}}">Inward Goods Receipt</a>--}}
{{--                        @if(auth()->user()->can('Assign Stores'))--}}
{{--                        <a class="dropdown-item" href="{{url('store/assignStore')}}">Assign Stores</a>--}}
{{--                        @endif--}}
{{--                        <a class="dropdown-item" href="{{url('store/allStores')}}">Stores</a>--}}
{{--                        <a class="dropdown-item" href="{{url('store/totalStock')}}">Current Stock</a>--}}
{{--                        <a class="dropdown-item" href="{{url('store/issueRequisition')}}">Issue / Requisition</a>--}}
{{--                        <a class="dropdown-item" href="{{url('store/addMaterial')}}">Add New</a>--}}
{{--                        <a class="dropdown-item" href="{{url('store/rawMaterial')}}">Material</a>--}}
{{--                        <a class="dropdown-item" href="{{url('store/product')}}">Products</a>--}}

{{--                        <a class="dropdown-item" href="{{url('store/deliveryOrder')}}">Delivery Order</a>--}}

{{--                        <a class="dropdown-item" href="{{url('store/report')}}">Reports</a>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                @endif--}}

{{--                @if(auth()->user()->can('Quality'))--}}
{{--                <li class="nav-item dropdown">--}}
{{--                    <a class=" dropdown-toggle btn pl-0 pr-0  m-0 btn-app" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-check-square"></i>--}}
{{--                        Quality--}}
{{--                    </a>--}}

{{--                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">--}}
{{--                        <a class="dropdown-item" href="{{url('qa/dashboard')}}">Dashboard</a>--}}
{{--                        <a class="dropdown-item" href="{{url('qa/qualityControl')}}">Quality Control</a>--}}
{{--                        <a class="dropdown-item" href="#"> Quality Assurance</a>--}}
{{--                        <a class="dropdown-item" href="{{url('qa/report')}}"> Reports</a>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                @endif--}}

{{--                @if(auth()->user()->can('HR'))--}}
{{--                <li class="nav-item dropdown">--}}
{{--                    <a class=" dropdown-toggle btn pl-0 pr-0 m-0 btn-app" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-edit"></i>--}}
{{--                      HR--}}
{{--                    </a>--}}

{{--                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">--}}
{{--                        <a class="dropdown-item" href="{{url('qa/dashboard')}}">Dashboard</a>--}}
{{--                        <a class="dropdown-item" href="{{url('admin/employee')}}">Employees</a>--}}
{{--                        <a class="dropdown-item" href="{{url('admin/attendance')}}"> Attendance</a>--}}

{{--                        @if(auth()->user()->can('Accept Leave Request'))--}}
{{--                        <a class="dropdown-item" href="{{url('admin/leave')}}">Accept Leaves</a>--}}
{{--                        @endif--}}

{{--                        @if(auth()->user()->can('Apply for Attendance'))--}}
{{--                            <a class="dropdown-item" href="{{url('admin/leaveOfficer')}}">Apply for Leaves</a>--}}
{{--                        @endif--}}


{{--                        <a class="dropdown-item" href="{{url('admin/salary')}}">Salaries</a>--}}
{{--                        <a class="dropdown-item" href="{{url('admin/advance')}}"> Advance</a>--}}
{{--                        <a class="dropdown-item" href="{{url('admin/report')}}"> Reports </a>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                @endif--}}


{{--                @if(auth()->user()->hasRole('GM'))--}}
{{--                <li class="nav-item dropdown">--}}
{{--                    <a class=" dropdown-toggle btn pl-0 pr-0 m-0 btn-app" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-users-cog nav-icon"></i>--}}
{{--                        Role Management--}}
{{--                    </a>--}}

{{--                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">--}}
{{--                        <a class="dropdown-item" href="{{url('/role')}}">Roles</a>--}}
{{--                        <a class="dropdown-item" href="{{url('permission')}}">Permission</a>--}}
{{--                        <a class="dropdown-item" href="{{url('/assign-permission')}}"> Assign Permission To Roles</a>--}}
{{--                        <a class="dropdown-item" href="{{url('/assign-role')}}"> Assign Roles to User</a>--}}
{{--                    </div>--}}
{{--                </li>--}}

{{--                @endif--}}



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
{{--                    @if(auth()->user()->can('Setting'))--}}
{{--                    <li class="nav-item dropdown">--}}
{{--                        <a class=" dropdown-toggle btn pl-0 pr-0 m-0 btn-app" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-wrench"></i>--}}
{{--                            Settings--}}
{{--                        </a>--}}

{{--                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">--}}
{{--                            <a class="dropdown-item" href="{{url('setting/setting')}}">Settings</a>--}}
{{--                            <a class="dropdown-item" href="{{url('setting/settingGeneral')}}">General Settings</a>--}}
{{--                            <a class="dropdown-item" href="{{url('setting/dutySchedule')}}">Duty hours settings</a>--}}
{{--                            <a class="dropdown-item" href="{{url('setting/leave')}}">Leave settings</a>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    @endif--}}

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

{{--                                    </ul>--}}
{{--                                </div>--}}

{{--                                <!-- Right navbar links -->--}}
{{--                                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">--}}
{{--                                    <li class="nav-item dropdown ml-auto text-right">--}}

{{--                        --}}{{--                <a id="dropdownSubMenu13" href="index.html" class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-sign-out-alt"></i>--}}
{{--                    Logout</a>--}}

{{--                <a class="dropdown-toggle btn m-0 btn-app" href="{{ route('logout') }}"--}}
{{--                   onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();"  ><i class="fas fa-sign-out-alt"></i>--}}
{{--                    {{ __('Logout') }}--}}
{{--                </a>--}}

{{--                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                    @csrf--}}
{{--                </form>--}}
{{--            </li>--}}

{{--        </ul>--}}
{{--    </div>--}}
{{--</nav>--}}


<style>
   .nav .nav-item a{
        color: #2f2f2f;
    }
</style>




<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-danger navbar-dark bg-transparent"  style=" background-image: linear-gradient(to right,#bedfff,  #1565c0,   #dc4451, #dc3545);">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-blue"></i></a>
        </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new Deliveries
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 Requisitions requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>

        <!-- User Account: style can be found in dropdown.less -->
        <li class="nav-item dropdown">
            <a class="nav-link pt-2" data-toggle="dropdown" href="#">
{{--                <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">--}}
                <span class="hidden-xs">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header text-center">
{{--                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">--}}
                    <h5 class="pt-2">
                        {{\Illuminate\Support\Facades\Auth::user()->name}}
                    </h5>
                </li>
                <!-- Menu Body -->
                <li class="user-body pb-2">
                    <div class="col-xs-4 text-center">
                        <p>{{\Illuminate\Support\Facades\Auth::user()->email}}</p>
                    </div>
                </li>
                <div class="dropdown-divider"></div>
                <!-- Menu Footer-->
                <li class="user-footer p-2">
                    <div class="float-left mb-2">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();"  >
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.navbar -->








{{--style="background-image: url({{asset('public/img/logo.png')}}) ; background-repeat: no-repeat; position:center;"--}}

<!-- Main Sidebar Container -->
<div >
    <aside class="main-sidebar sidebar-light elevation-1" style="background-image: linear-gradient(to right,white, #bcdcfe); ">

            <a href="{{url('/')}}" class="brand-link">
                <img src="{{asset('public/img/logo.png')}}" alt="WAH Logo" class="brand-image img-circle">
                <span class="brand-text font-weight-light text-dark">SGA - WAH Industries</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
            {{--        <div class="user-panel mt-3 pb-3 mb-3 d-flex">--}}
            {{--            <div class="image">--}}
            {{--                <img src="" class="img-circle elevation-2" alt="User Image">--}}
            {{--            </div>--}}
            {{--            <div class="info">--}}
            {{--                <a href="#" class="d-block">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>--}}
            {{--            </div>--}}
            {{--        </div>--}}

            <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        @if(auth()->user()->can('Production'))
                            <li class="nav-item has-treeview @if(request()->segment(1)=="production") menu-open @endif">
                                <a href="#" class="nav-link  @if(request()->segment(1)=="production") active @endif">
                                    <i class="nav-icon fas fa-spray-can"></i>
                                    <p>
                                        Production
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('production/dashboard')}}" class="nav-link @if(request()->segment(2)=="dashboard") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Production Dashboard</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('production/componentDashboard')}}" class="nav-link @if(request()->segment(2)=="componentDashboard") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Component Dashboard</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('production/newOrder')}}" class="nav-link @if(request()->segment(2)=="newOrder") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>New Production Order</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('production/orderComponent')}}" class="nav-link @if(request()->segment(2)=="orderComponent") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>New Component Order</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('production/materialRequisition')}}" class="nav-link @if(request()->segment(2)=="materialRequisition") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Request For Material</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('production/componentRequisition')}}" class="nav-link @if(request()->segment(2)=="componentRequisition") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Request For Component</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('production/allComponentRequisition')}}" class="nav-link @if(request()->segment(2)=="allComponentRequisition") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Component Requisition</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('production/allMaterialRequisition')}}" class="nav-link @if(request()->segment(2)=="allMaterialRequisition") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Material Requisition</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('setting/productAndMateralCode')}}" class="nav-link @if(request()->segment(2)=="issueRequisition") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Items Code</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        @if(auth()->user()->can('Gate'))
                            <li class="nav-item has-treeview @if(request()->segment(1)=="gate") menu-open @endif">
                                <a href="#" class="nav-link  @if(request()->segment(1)=="gate") active @endif">
                                    <i class="nav-icon fas fa-dungeon"></i>

                                    <p>
                                        Gate
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('gate/dashboard')}}" class="nav-link @if(request()->segment(2)=="dashboard") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Dashboard</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('gate/inwardGatePass')}}" class="nav-link @if(request()->segment(2)=="inwardGatePass") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Inward Gate Pass</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('gate/outwardGatePass')}}" class="nav-link @if(request()->segment(2)=="outwardGatePass") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Outward Gate Pass</p>
                                        </a>
                                    </li>
                                    {{--                            <li class="nav-item">--}}
                                    {{--                                <a href="{{url('admin/attendance')}}" class="nav-link @if(request()->segment(2)=="attendance") active @endif">--}}
                                    {{--                                    <i class="far fa-circle nav-icon"></i>--}}
                                    {{--                                    <p>Attendance</p>--}}
                                    {{--                                </a>--}}
                                    {{--                            </li>--}}
                                    <li class="nav-item">
                                        <a href="{{url('gate/vehicleManagement')}}" class="nav-link @if(request()->segment(2)=="vehicleManagement") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Vehicle Management</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('gate/report')}}" class="nav-link @if(request()->segment(2)=="report") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Reports</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('setting/productAndMateralCode')}}" class="nav-link @if(request()->segment(2)=="issueRequisition") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Items Code</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        @if(auth()->user()->can('Supplier'))
                            <li class="nav-item has-treeview @if(request()->segment(1)=="supplier") menu-open @endif">
                                <a href="#" class="nav-link  @if(request()->segment(1)=="supplier") active @endif">
                                    <i class="nav-icon fas fa-truck"></i>
                                    <p>
                                        Vendor
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('supplier/supplier')}}" class="nav-link @if(request()->segment(2)=="supplier") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Vendor</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('supplier/viewSuppliers')}}" class="nav-link @if(request()->segment(2)=="viewSuppliers") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>View Vendor</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif


                        @if(auth()->user()->can('Tender'))
                            <li class="nav-item has-treeview @if(request()->segment(1)=="tender") menu-open @endif">
                                <a href="#" class="nav-link  @if(request()->segment(1)=="tender") active @endif">
                                    <i class="nav-icon fas fa-truck"></i>
                                    <p>
                                        Tender
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('tender/create')}}" class="nav-link @if(request()->segment(2)=="create") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Create Tender</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('tender/viewTender')}}" class="nav-link @if(request()->segment(2)=="viewTender") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>View Vendor</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        @if(auth()->user()->can('Approve Requisition'))
                            <li class="nav-item">
                                <a href="{{url('assistantmanager/')}}" class="nav-link @if(request()->segment(1)=="assistantmanager") active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview @if(request()->segment(1)=="requisition") menu-open @endif">
                                <a href="#" class="nav-link  @if(request()->segment(1)=="requisition") active @endif">
                                    <i class="fas fa-receipt nav-icon"></i>
                                    <p>
                                        Requisition Approval
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('requisition/material-dashboard')}}" class="nav-link @if(request()->segment(2)=="material-dashboard") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Material Requisition</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('requisition/component-dashboard')}}" class="nav-link @if(request()->segment(2)=="component-dashboard") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Component Requisition</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif


                        @if(auth()->user()->can('Sale'))
                            <li class="nav-item has-treeview @if(request()->segment(1)=="sale") menu-open @endif">
                                <a href="#" class="nav-link  @if(request()->segment(1)=="sale") active @endif">
                                    <i class="nav-icon fas fa-dollar-sign"></i>
                                    <p>
                                        Sale
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('sale/dashboard')}}" class="nav-link @if(request()->segment(2)=="dashboard") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Dashboard</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('sale/sale')}}" class="nav-link @if(request()->segment(2)=="sale") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>New Sale Order</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('sale/saleOrder')}}" class="nav-link @if(request()->segment(2)=="saleOrder") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Sales Order</p>
                                        </a>
                                    </li>
{{--                                    <li class="nav-item">--}}
{{--                                        <a href="{{url('sale/customer')}}" class="nav-link @if(request()->segment(2)=="customer") active @endif">--}}
{{--                                            <i class="far fa-circle nav-icon"></i>--}}
{{--                                            <p>Customer</p>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
                                </ul>
                            </li>
                        @endif

                        @if(auth()->user()->can('Purchase Requisition'))
                            <li class="nav-item has-treeview @if(request()->segment(1)=="assistantmanager") menu-open @endif">
                                <a href="#" class="nav-link  @if(request()->segment(1)=="assistantmanager") active @endif">
                                    <i class="nav-icon fas fa-dollar-sign"></i>
                                    <p>
                                        Purchase Requisition
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('assistantmanager/dashboard')}}" class="nav-link @if(request()->segment(2)=="dashboard") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Dashboard</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('assistantmanager/requisition-request')}}" class="nav-link @if(request()->segment(2)=="requisition-request") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Requisition Request</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif


                        @if(auth()->user()->can('Approve Order'))
                            <li class="nav-item has-treeview @if(request()->segment(1)=="order") menu-open @endif">
                                <a href="#" class="nav-link  @if(request()->segment(1)=="order") active @endif">
                                    <i class="nav-icon fas fa-dollar-sign"></i>
                                    <p>
                                        Order Approve
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('order/order-approve')}}" class="nav-link @if(request()->segment(2)=="order-approve") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Dashboard</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif



                        @if(auth()->user()->can('Purchase'))
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{url('purchase/dashboard')}}" class="nav-link @if(request()->segment(2)=="PurchaseDashboard") active @endif">--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>Purchase Dashboard</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
                            <li class="nav-item has-treeview @if(request()->segment(1)=="purchase") menu-open @endif">
                                <a href="#" class="nav-link @if(request()->segment(1)=="purchase") active @endif">
                                    <i class="nav-icon fas fa-boxes"></i>
                                    <p>
                                        Purchase
                                        <i class="right fas fa-angle-left"></i>

                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('purchase/')}}" class="nav-link @if(request()->segment(2)=="") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Requests List</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('purchase/new-purchase-list')}}" class="nav-link @if(request()->segment(2)=="new-purchase-list") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Purchase Order List</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('purchase/purchase')}}" class="nav-link @if(request()->segment(2)=="purchase") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Purchase</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('purchase/create-vendor')}}" class="nav-link @if(request()->segment(2)=="create-vendor") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Create Vendor</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        @if(auth()->user()->hasRole('QC'))
                            <li class="nav-item">
                                <a href="{{url('qc/dashboard')}}" class="nav-link @if(request()->segment(2)=="dashboard") active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('qc/inward_qc')}}" class="nav-link @if(request()->segment(2)=="inwardInspectionNote") active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Inward I-Note</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('qc/inward_qc_out')}}" class="nav-link @if(request()->segment(2)=="inwardInspectionNote_out") active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Inward I-Note from Outward</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('qc/production-product')}}" class="nav-link @if(request()->segment(2)=="production-product") active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Product I-Note</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('qc/production-component')}}" class="nav-link @if(request()->segment(2)=="production-component") active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Component I-Note</p>
                                </a>
                            </li>
                        @endif

                        @if(auth()->user()->can('Store'))
                            <li class="nav-item has-treeview @if(request()->segment(1)=="store") menu-open @endif">
                                <a href="#" class="nav-link  @if(request()->segment(1)=="store") active @endif">
                                    <i class="nav-icon fas fa-store"></i>
                                    <p>
                                        Store
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('store/dashboard')}}" class="nav-link @if(request()->segment(2)=="dashboard") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Dashboard</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('store/newBuiltyArrival')}}" class="nav-link @if(request()->segment(2)=="newBuiltyArrival") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            {{--                                    <p>New Builty Arrival</p>--}}
                                            <p>New Inward</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('store/newBuiltyArrival_out')}}" class="nav-link @if(request()->segment(2)=="newBuiltyArrival_out") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            {{--                                    <p>New Builty Arrival</p>--}}
                                            <p>New Inward from Factory</p>
                                        </a>
                                    </li>
                                    {{--                            <li class="nav-item">--}}
                                    {{--                                <a href="{{url('store/approveForInspectionNote')}}" class="nav-link @if(request()->segment(2)=="approveForInspectionNote") active @endif">--}}
                                    {{--                                    <i class="far fa-circle nav-icon"></i>--}}
                                    {{--                                    <p>Approve for I-Note</p>--}}
                                    {{--                                </a>--}}
                                    {{--                            </li>--}}
                                    {{--                            <li class="nav-item">--}}
                                    {{--                                <a href="{{url('store/inwardInspectionNote')}}" class="nav-link @if(request()->segment(2)=="inwardInspectionNote") active @endif">--}}
                                    {{--                                    <i class="far fa-circle nav-icon"></i>--}}
                                    {{--                                    <p>Inward I-Note</p>--}}
                                    {{--                                </a>--}}
                                    {{--                            </li>--}}
                                    <li class="nav-item">
                                        <a href="{{url('store/inwardGoodsReceipt')}}" class="nav-link @if(request()->segment(2)=="inwardGoodsReceipt") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Inward Goods Receipt</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('store/inwardGoodsReceipt_out')}}" class="nav-link @if(request()->segment(2)=="inwardGoodsReceipt_out") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Inward Goods Receipt from Factory</p>
                                        </a>
                                    </li>
                                    @if(auth()->user()->can('Assign Stores'))
                                        <li class="nav-item">
                                            <a href="{{url('store/assignStore')}}" class="nav-link @if(request()->segment(2)=="assignStore") active @endif">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Assign Stores</p>
                                            </a>
                                        </li>
                                    @endif
                                    <li class="nav-item">
                                        <a href="{{url('store/allStores')}}" class="nav-link @if(request()->segment(2)=="allStores") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Stores</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('store/totalStock')}}" class="nav-link @if(request()->segment(2)=="totalStock") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Store Position</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('store/issueRequisition')}}" class="nav-link @if(request()->segment(2)=="issueRequisition") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Requisition</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('setting/productAndMateralCode')}}" class="nav-link @if(request()->segment(2)=="issueRequisition") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Items Code</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('store/sales')}}" class="nav-link @if(request()->segment(2)=="issueRequisition") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Sales</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        @if(auth()->user()->can('Quality'))
                            <li class="nav-item has-treeview @if(request()->segment(1)=="qa") menu-open @endif">
                                <a href="#" class="nav-link  @if(request()->segment(1)=="qa") active @endif">
                                    <i class="nav-icon fas fa-check-square"></i>
                                    <p>
                                        Quality
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('qa/dashboard')}}" class="nav-link @if(request()->segment(2)=="dashboard") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Dashboard</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('qa/qualityControl')}}" class="nav-link @if(request()->segment(2)=="qualityControl") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Quality Control</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('qa/report')}}" class="nav-link @if(request()->segment(2)=="report") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Reports</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        @if(auth()->user()->can('HR'))
                            <li class="nav-item has-treeview @if(request()->segment(1)=="admin") menu-open @endif">
                                <a href="#" class="nav-link  @if(request()->segment(1)=="admin") active @endif">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        HR
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('admin/hr')}}" class="nav-link @if(request()->segment(2)=="hr") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Dashboard</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('admin/employee')}}" class="nav-link @if(request()->segment(2)=="employee") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Employees</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('admin/attendance')}}" class="nav-link @if(request()->segment(2)=="attendance") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Attendance</p>
                                        </a>
                                    </li>
                                    @if(auth()->user()->can('Accept Leave Request'))
                                        <li class="nav-item">
                                            <a href="{{url('admin/leave')}}" class="nav-link @if(request()->segment(2)=="leave") active @endif">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Accept Leaves</p>
                                            </a>
                                        </li>
                                    @endif

                                    @if(auth()->user()->can('Apply for Attendance'))
                                        <li class="nav-item">
                                            <a href="{{url('admin/leaveOfficer')}}" class="nav-link @if(request()->segment(2)=="leaveOfficer") active @endif">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Apply for Leaves</p>
                                            </a>
                                        </li>
                                    @endif
                                    <li class="nav-item">
                                        <a href="{{url('admin/salary')}}" class="nav-link @if(request()->segment(2)=="salary") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Salaries</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('admin/advance')}}" class="nav-link @if(request()->segment(2)=="advance") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Advance</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('admin/report')}}" class="nav-link @if(request()->segment(2)=="report") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Reports</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        @if(auth()->user()->hasRole('GM'))
                            <li class="nav-item has-treeview @if(request()->segment(1)=="role" || request()->segment(1)=="permission" || request()->segment(1)=="assign-permission" || request()->segment(1)=="assign-role") menu-open @endif">
                                <a href="#" class="nav-link  @if(request()->segment(1)=="role" || request()->segment(1)=="permission" || request()->segment(1)=="assign-permission" || request()->segment(1)=="assign-role") active @endif">
                                    <i class="nav-icon fas fa-users-cog"></i>

                                    <p>
                                        Role Management
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('role')}}" class="nav-link @if(request()->segment(1)=="role") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Role</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('permission')}}" class="nav-link @if(request()->segment(1)=="permission") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Permission</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('assign-permission')}}" class="nav-link @if(request()->segment(1)=="assign-permission") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Assign Permission To Roles</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('assign-role')}}" class="nav-link @if(request()->segment(1)=="assign-role") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Assign Roles to User</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        @if(auth()->user()->can('Setting'))
                            <li class="nav-item has-treeview @if(request()->segment(1)=="setting") menu-open @endif">
                                <a href="#" class="nav-link  @if(request()->segment(1)=="setting") active @endif">
                                    <i class="nav-icon fas fa-wrench"></i>
                                    <p>
                                        Settings
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('setting/setting')}}" class="nav-link @if(request()->segment(2)=="setting") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Settings</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('setting/settingGeneral')}}" class="nav-link @if(request()->segment(2)=="settingGeneral") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>General Settings</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('setting/dutySchedule')}}" class="nav-link @if(request()->segment(2)=="dutySchedule") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Duty Hours Settings</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('setting/leave')}}" class="nav-link @if(request()->segment(2)=="leave") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Leave Settings</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('setting/productAndMateralCode')}}" class="nav-link @if(request()->segment(2)=="Items Code") active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Items Code</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>

        <!-- Brand Logo -->

        <!-- /.sidebar -->
    </aside>

</div>
