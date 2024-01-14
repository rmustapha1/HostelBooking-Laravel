@extends('layouts.admin') @section('content')
@if(session()->has('create_message'))
<div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert"
        aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('create_message') }}</div>
@endif
@if(session()->has('edit_message'))
<div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert"
        aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('edit_message') }}</div>
@endif
@if(session()->has('import_message'))
<div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert"
        aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('import_message') }}</div>
@endif
@if(session()->has('not_permitted'))
<div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert"
        aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div>
@endif
@if(session()->has('message'))
<div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert"
        aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('message') }}</div>
@endif

<section class="content-wrapper">
    <div class="container-fluid">
        <a href="{{route('admin.hostels.create')}}" class="btn btn-info"><i class="mdi mdi-plus"></i>
            {{__('Add Hostel')}}</a>
        <a href="#" data-toggle="modal" data-target="#importProduct" class="btn btn-primary"><i
                class="mdi mdi-copy"></i> {{__('Import_product')}}</a>
    </div>
    <div class="row mt-5">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-header">
                    <p class="text-primary">Hostel List</p>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="hostel-listing" class="table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>School</th>
                                    <th>Owner</th>
                                    <th>Subscription</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="importProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
        class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content p-5">
                <form>
                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title">Import Hostel</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                aria-hidden="true"><i class="mdi mdi-cross"></i></span></button>
                    </div>
                    <div class="modal-body">
                        <p class="italic">
                            <small>{{trans('The field labels marked with * are required input fields')}}.</small>
                        </p>
                        <p>{{trans('The correct column order is')}} (image, name*, code*, type*, brand, category*,
                            unit_code*, cost*, price*, product_details, variant_name, item_code, additional_price)
                            {{trans('and you must follow this')}}.
                        </p>
                        <p>{{trans('To display Image it must be stored in')}} public/images/product
                            {{trans('directory')}}. {{trans('Image name must be same as product name')}}
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Upload CSV File')}} *</label>
                                    <input type="file" class="form-control required" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{trans('Sample File')}}</label>
                                    <a href="public/sample_file/sample_products.csv"
                                        class="btn btn-info btn-block btn-md"><i class="mdi mdi-download"></i>
                                        {{trans('Download')}}</a>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary p-4">Submit</button>
                    </div>
                </form </div>
            </div>
        </div>

        <div id="hostel-details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
            class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title">{{trans('Hostel Details')}}</h5>
                        <button id="print-btn" type="button" class="btn btn-default btn-sm ml-3"><i
                                class="mdi mdi-print"></i>
                            {{trans('Print')}}</button>
                        <button type="button" id="close-btn" data-dismiss="modal" aria-label="Close" class="close"><span
                                aria-hidden="true"><i class="mdi mdi-cross"></i></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5" id="slider-content"></div>
                            <div class="col-md-5 offset-1" id="product-content"></div>
                            <div class="col-md-12 mt-2" id="product-warehouse-section">
                                <h5>{{trans('Warehouse Quantity')}}</h5>
                                <table class="table table-bordered table-hover product-warehouse-list">
                                    <thead>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-7 mt-2" id="product-variant-section">
                                <h5>{{trans('Product Variant Information')}}</h5>
                                <table class="table table-bordered table-hover product-variant-list">
                                    <thead>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-5 mt-2" id="product-variant-warehouse-section">
                                <h5>{{trans('Warehouse quantity of product variants')}}</h5>
                                <table class="table table-bordered table-hover product-variant-warehouse-list">
                                    <thead>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <h5 id="combo-header"></h5>
                        <table class="table table-bordered table-hover item-list">
                            <thead>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



</section>


@endsection
@push('scripts')
<script>
function confirmDelete() {
    if (confirm("Are you sure want to delete?")) {
        return true;
    }
    return false;
}



// Fetch hostel data from the backend
$(document).ready(function() {
    $.ajax({
        url: '/admin/hostels',
        type: 'GET',
        success: function(data) {
            // Populate the DataTable with hostel data
            $('#hostel-listing').DataTable({
                data: data,
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'school'
                    },
                    {
                        data: 'owner_name'
                    },
                    {
                        data: 'subscription_start_date'
                    },
                    {
                        data: 'status'
                    },
                    {
                        data: 'actions'
                    },
                ]
            });
        }
    });
});


$("#print-btn").on("click", function() {
    var divToPrint = document.getElementById('product-details');
    var newWin = window.open('', 'Print-Window');
    newWin.document.open();
    newWin.document.write(
        '<link rel="stylesheet" href="<?php echo asset('vendor/bootstrap/css/bootstrap.min.css') ?>" type="text/css"><style type="text/css">@media print {.modal-dialog { max-width: 1000px;} }</style><body onload="window.print()">' +
        divToPrint.innerHTML + '</body>');
    newWin.document.close();
    setTimeout(function() {
        newWin.close();
    }, 10);
});
</script>
@endpush