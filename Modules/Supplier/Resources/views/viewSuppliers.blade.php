@extends('layouts.master')

@section('content')
    <section class="content pt-3">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                @if(!empty($errors->first()))
                    <div class="alert alert-danger"  style="text-align: center">
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Suppliers List</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="text-right mb-3 ">
                            <a class="btn btn-primary btn-sm" href="{{url('supplier/supplier')}}">
                                <i class="fas fa-plus">
                                </i>
                                Add Supplier
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table id="materialTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Supplier ID</th>
                                    <th>Name</th>
                                    <th>Mobile #</th>
                                    <th>Credit term</th>
                                    <th>Status</th>
                                    <th>City</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!$supplier->isempty())
                                    @php $count=0; @endphp
                                    @foreach($supplier as $item)
                                        @php ++$count; @endphp
                                        <tr>
                                            <td>{{$count}}</td>
                                            <td>{{$item->supplier_id}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->m_number}}</td>
                                            <td>{{$item->credit_term}}</td>
                                            <td>{{$item->status}}</td>
                                            <td>{{$item->city}}</td>
                                            <td class="project-actions">
                                                <a class="btn btn-primary btn-sm getSupplierData" data-toggle="modal" data-target="#viewModal"
                                                   data-id="{{$item->id}}" data-supplier_id="{{$item->supplier_id}}" data-currency="{{$item->currency}}"
                                                   data-name="{{$item->name}}" data-m_number="{{$item->m_number}}" data-p_number="{{$item->p_number}}"
                                                   data-credit_term="{{$item->credit_term}}" data-email="{{$item->email}}" data-status="{{$item->status}}"
                                                   data-gstn_number="{{$item->gstn_number}}" data-state="{{$item->state}}" data-city="{{$item->city}}"
                                                   data-tax_excise_no="{{$item->tax_excise_no}}" data-vat_tin_no="{{$item->vat_tin_no}}" data-payment_terms="{{$item->payment_terms}}"
                                                   data-bank_name="{{$item->bank_name}}" data-bank_branch="{{$item->bank_branch}}" data-account_num="{{$item->account_num}}">
                                                    <i class="fas fa-folder">View</i>
                                                </a>
                                                <a class="btn btn-info btn-sm getSupplierData" data-toggle="modal" data-target="#editModal"
                                                   data-id="{{$item->id}}" data-supplier_id="{{$item->supplier_id}}" data-currency="{{$item->currency}}"
                                                   data-name="{{$item->name}}" data-m_number="{{$item->m_number}}" data-p_number="{{$item->p_number}}"
                                                   data-credit_term="{{$item->credit_term}}" data-email="{{$item->email}}" data-status="{{$item->status}}"
                                                   data-gstn_number="{{$item->gstn_number}}" data-state="{{$item->state}}" data-city="{{$item->city}}"
                                                   data-tax_excise_no="{{$item->tax_excise_no}}" data-vat_tin_no="{{$item->vat_tin_no}}" data-payment_terms="{{$item->payment_terms}}"
                                                   data-bank_name="{{$item->bank_name}}" data-bank_branch="{{$item->bank_branch}}" data-account_num="{{$item->account_num}}">
                                                    <i class="fas fa-pencil-alt">Edit</i>
                                                </a>
                                                <a class="btn btn-danger btn-sm deleteSupplier" data-toggle="modal" data-target="#deleteModal" data-id="{{$item->id}}">
                                                    <i class="fas fa-trash">Delete</i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr aria-colspan="8" class="align-content-center">No Data.</tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>


    <!-- The Edit Modal -->
    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Supplier</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{url('supplier/submitEditedSupplier')}}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Modal body -->
                    <div class="modal-body">
                        <input type="hidden" value="" class="editId" name="editId">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="sga_1" class="col-sm-4 col-form-label">Supplier ID</label>
                                <div class="col-sm-8">
                                    <input type="text" value="" name="supplier_id" required readonly class="form-control editsupplier_id" placeholder="S-001">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Supplier Currency</label>
                                <div class="col-sm-8">
                                    <input type="text" required readonly value="PKR" name="currency" class="form-control editcurrency" placeholder="MMLOGIX">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="sga_2" class="col-sm-4 col-form-label">Supplier Name</label>
                                <div class="col-sm-8">
                                    <input type="text" required name="name" value="" class="form-control editname" placeholder="MMLOGIX">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="sga_3" class="col-sm-4 col-form-label">Mobile Number</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control editm_number" required value="" name="m_number" placeholder="03331234567">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="sga_4" class="col-sm-4 col-form-label">Phone Number</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control editp_number" required value="" name="p_number" placeholder="+924237800153">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Credit Term</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2 editcredit_term" name="credit_term">
                                        @if(!$credit_term->isempty())
                                            @foreach($credit_term as $item)
                                                <option value="{{$item->name}}">{{$item->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="sga_5" class="col-sm-4 col-form-label">Email Id</label>
                                <div class="col-sm-8">
                                    <input type="email" name="email" value="" class="form-control editemail" required placeholder="info@mmlogix.com">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Supplier Status</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2 editstatus" name="status" required>
                                        <option selected="selected">Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="sga_6" class="col-sm-4 col-form-label">GSTN Number</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control editgstn_number" value="" required name="gstn_number" placeholder="213458746">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">State</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2 editstate" name="state" required>
                                        @if(!$state->isempty())
                                            @foreach($state as $item)
                                                <option value="{{$item->name}}">{{$item->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">City</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2 editcity" name="city" required>
                                        @if(!$city->isempty())
                                            @foreach($city as $item)
                                                <option value="{{$item->name}}">{{$item->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="sga_7" class="col-sm-4 col-form-label">Tax/Excise Reference No</label>
                                <div class="col-sm-8">
                                    <input type="text" name="tax_excise_no" value="" class="form-control edittax_excise_no" required placeholder="35463154">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="sga_8" class="col-sm-4 col-form-label">VAT / TIN Number</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control editvat_tin_no" value="" name="vat_tin_no" required placeholder="547654">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Payment Terms</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2 editpayment_terms" name="payment_terms">
                                        @if(!$payment_term->isempty())
                                            @foreach($payment_term as $item)
                                                <option value="{{$item->name}}">{{$item->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="sga_9" class="col-sm-4 col-form-label">Bank Name</label>
                                <div class="col-sm-8">
                                    <input type="text" name="bank_name" value="" class="form-control editbank_name" required placeholder="Mezaan Bank">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="sga_10" class="col-sm-4 col-form-label">Bank Branch</label>
                                <div class="col-sm-8">
                                    <input type="text" name="bank_branch" value="" required class="form-control editbank_branch" id="sga_10" placeholder="Allama Iqbal Town">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="sga_11" class="col-sm-4 col-form-label">Account Number</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control editaccount_num" value="" name="account_num" required placeholder="000-313543154">
                                </div>
                            </div>
                        </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>




        <!-- The Edit Modal -->
        <div class="modal fade" id="viewModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Supplier</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                        <div class="modal-body">

                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="sga_1" class="col-sm-4 col-form-label">Supplier ID</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="" name="supplier_id" required readonly class="form-control editsupplier_id" placeholder="S-001">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Supplier Currency</label>
                                    <div class="col-sm-8">
                                        <input type="text" required readonly value="PKR" name="currency" class="form-control editcurrency" placeholder="MMLOGIX">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="sga_2" class="col-sm-4 col-form-label">Supplier Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" required readonly name="name" value="" class="form-control editname" placeholder="MMLOGIX">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="sga_3" class="col-sm-4 col-form-label">Mobile Number</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editm_number" readonly required value="" name="m_number" placeholder="03331234567">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="sga_4" class="col-sm-4 col-form-label">Phone Number</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editp_number" readonly required value="" name="p_number" placeholder="+924237800153">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Credit Term</label>
                                    <div class="col-sm-8">
                                        <select class="form-control select2 editcredit_term" name="credit_term" disabled>
                                            @if(!$credit_term->isempty())
                                                @foreach($credit_term as $item)
                                                    <option value="{{$item->name}}">{{$item->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="sga_5" class="col-sm-4 col-form-label">Email Id</label>
                                    <div class="col-sm-8">
                                        <input type="email" name="email" readonly value="" class="form-control editemail" required placeholder="info@mmlogix.com">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Supplier Status</label>
                                    <div class="col-sm-8">
                                        <select class="form-control select2 editstatus" name="status" required disabled>
                                            <option selected="selected">Active</option>
                                            <option>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="sga_6" class="col-sm-4 col-form-label">GSTN Number</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control editgstn_number" value="" required name="gstn_number" placeholder="213458746">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">State</label>
                                    <div class="col-sm-8">
                                        <select class="form-control select2 editstate" name="state" required disabled>
                                            @if(!$state->isempty())
                                                @foreach($state as $item)
                                                    <option value="{{$item->name}}">{{$item->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">City</label>
                                    <div class="col-sm-8">
                                        <select class="form-control select2 editcity" name="city" required disabled>
                                            @if(!$city->isempty())
                                                @foreach($city as $item)
                                                    <option value="{{$item->name}}">{{$item->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="sga_7" class="col-sm-4 col-form-label">Tax/Excise Reference No</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly name="tax_excise_no" value="" class="form-control edittax_excise_no" required placeholder="35463154">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="sga_8" class="col-sm-4 col-form-label">VAT / TIN Number</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control editvat_tin_no" value="" name="vat_tin_no" required placeholder="547654">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Payment Terms</label>
                                    <div class="col-sm-8">
                                        <select class="form-control select2 editpayment_terms" name="payment_terms" disabled>
                                            @if(!$payment_term->isempty())
                                                @foreach($payment_term as $item)
                                                    <option value="{{$item->name}}">{{$item->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="sga_9" class="col-sm-4 col-form-label">Bank Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly name="bank_name" value="" class="form-control editbank_name" required placeholder="Mezaan Bank">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="sga_10" class="col-sm-4 col-form-label">Bank Branch</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly name="bank_branch" value="" required class="form-control editbank_branch" id="sga_10" placeholder="Allama Iqbal Town">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="sga_11" class="col-sm-4 col-form-label">Account Number</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control editaccount_num" value="" name="account_num" required placeholder="000-313543154">
                                    </div>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>


    <!-- The Delete Modal -->
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{url('supplier/deleteSupplier')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="" id="deleteId" name="deleteId">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Supplier</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Are You Sure you want to delete this?
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
            $( document ).ready(function() {
                $('#materialTable').DataTable();
            });

            $('.deleteSupplier').click(function () {
                var id=$(this).data("id");
                $('#deleteId').val(id);
            });

            $('.getSupplierData').click(function () {
                var id=$(this).data("id");
                var supplier_id=$(this).data("supplier_id");
                var currency=$(this).data("currency");
                var name=$(this).data("name");
                var m_number=$(this).data("m_number");
                var p_number=$(this).data("p_number");
                var credit_term=$(this).data("credit_term");
                var email=$(this).data("email");
                var status=$(this).data("status");
                var gstn_number=$(this).data("gstn_number");
                var state=$(this).data("state");
                var city=$(this).data("city");
                var tax_excise_no=$(this).data("tax_excise_no");
                var vat_tin_no=$(this).data("vat_tin_no");
                var payment_terms=$(this).data("payment_terms");
                var bank_name=$(this).data("bank_name");
                var bank_branch=$(this).data("bank_branch");
                var account_num=$(this).data("account_num");


                $('.editId').val(id);
                $('.editsupplier_id').val(supplier_id);
                $('.editcurrency').val(currency);
                $(".editname").val(name);
                $('.editm_number').val(m_number);
                $('.editp_number').val(p_number);
                $('.editcredit_term').select2().val(credit_term).trigger("change");
                $('.editemail').val(email);
                $('.editstatus').select2().val(status).trigger("change");
                $('.editgstn_number').val(gstn_number);
                $('.editstate').select2().val(state).trigger("change");
                $('.editcity').select2().val(city).trigger("change");
                $('.edittax_excise_no').val(tax_excise_no);
                $('.editvat_tin_no').val(vat_tin_no);
                $('.editpayment_terms').select2().val(payment_terms).trigger("change");
                $('.editbank_name').val(bank_name);
                $('.editbank_branch').val(bank_branch);
                $('.editaccount_num').val(account_num);
            });

        </script>
@endsection
