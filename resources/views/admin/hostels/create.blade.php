@extends('layouts.admin')

@section('content')
<section class="content-wrapper">
    <div class="forms">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>{{trans('Add Hostel')}}</h4>
                    </div>
                    <div class="card-body">
                        <p class="italic">
                            <small>{{trans('The field labels marked with * are required input fields')}}.</small>
                        </p>
                        <form id="product-form">
                            <div class="row">
                                <h5 class="my-3 text-gray-600 font-semibold leading-7">Primary Hostel Info</h5>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="mb-1 text-muted">{{trans('Hostel Type')}} *</strong> </label>
                                        <div class="input-group">
                                            <select name="type" required
                                                class="form-control border-2 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                id="type">
                                                <option value="standard">Standard</option>
                                                <option value="homestel">Homestel</option>
                                                <option value="apartment">Apartment</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="mb-1 text-muted">{{trans('Hostel Name')}} *</strong> </label>
                                        <input type="text" name="name"
                                            class="form-control border-2 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            id="name" aria-describedby="name" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="mb-1 text-muted">{{trans('Hostel Code')}} *</strong> </label>
                                        <div class="input-group">
                                            <input type="text" name="code"
                                                class="form-control border-2 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                id="code" aria-describedby="code" required>
                                            <div class="input-group-append">
                                                <button id="genbutton" type="button" class="btn btn-sm btn-primary"
                                                    title="{{trans('Generate')}}"><i
                                                        class="mdi mdi-refresh text-gray-200"></i></button>
                                            </div>
                                        </div>
                                        <span class="validation-msg" id="code-error"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="mb-1 text-muted">{{trans('University / School')}} *</strong>
                                        </label>
                                        <div class="input-group">
                                            <select name="barcode_symbology" required
                                                class="form-control border-2 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                @foreach($schools as $school)
                                                <option value="{{$school->id}}">{{$school->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="digital" class="col-md-4">
                                    <div class="form-group">
                                        <label class="mb-1 text-muted">{{trans('Attach File')}} *</strong> </label>
                                        <div class="input-group">
                                            <input type="file" name="file"
                                                class="form-control border-2 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        </div>
                                        <span class="validation-msg"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">

                                    </div>
                                </div>
                                <div id="unit" class="col-md-12">
                                    <h5 class="my-3 text-gray-600 font-semibold leading-7">Geo-locational Information
                                    </h5>
                                    <div class="row ">
                                        <div class="col-md-4 form-group">
                                            <label class="mb-1 text-muted">{{trans('Address')}} *</strong> </label>
                                            <div class="input-group">
                                                <input required
                                                    class="form-control border-2 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                    name="location" />
                                            </div>
                                            <span class="validation-msg"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="mb-1 text-muted">{{trans('Latitude')}}</strong> </label>
                                            <div class="input-group">
                                                <input
                                                    class="form-control border-2 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                    name="latitude" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="mb-1 text-muted">{{trans('Longitude')}}</strong>
                                                </label>
                                                <div class="input-group">
                                                    <input
                                                        class="form-control border-2 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                        name="longitude" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="cost" class="col-md-4">
                                    <div class="form-group">
                                        <label class="mb-1 text-muted">{{trans('Product Cost')}} *</strong> </label>
                                        <input type="number" name="cost" required
                                            class="form-control border-2 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            step="any">
                                        <span class="validation-msg"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="mb-1 text-muted">{{trans('Product Price')}} *</strong> </label>
                                        <input type="number" name="price" required
                                            class="form-control border-2 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            step="any">
                                        <span class="validation-msg"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="qty" value="0.00">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label
                                            class="mb-1 text-muted">{{trans('Daily Sale Objective')}}</strong></label>
                                        <i class="dripicons-question" data-toggle="tooltip"
                                            title="{{trans('Minimum qty which must be sold in a day. If not, you will be notified on dashboard. But you have to set up the cron job properly for that. Follow the documentation in that regard.')}}"></i>
                                        <input type="number" name="daily_sale_objective"
                                            class="form-control border-2 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            step="any">
                                    </div>
                                </div>
                                <div id="alert-qty" class="col-md-4">
                                    <div class="form-group">
                                        <label class="mb-1 text-muted">{{trans('Alert Quantity')}}</strong> </label>
                                        <input type="number" name="alert_quantity"
                                            class="form-control border-2 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            step="any">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="mb-1 text-muted">{{trans('Product Tax')}}</strong> </label>
                                        <select name="tax_id"
                                            class="form-control border-2 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 selectpicker">
                                            <option value="">No Tax</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="mb-1 text-muted">{{trans('Tax Method')}}</strong> </label> <i
                                            class="dripicons-question" data-toggle="tooltip"
                                            title="{{trans('Exclusive: Poduct price = Actual product price + Tax. Inclusive: Actual product price = Product price - Tax')}}"></i>
                                        <select name="tax_method"
                                            class="form-control border-2 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 selectpicker">
                                            <option value="1">{{trans('Exclusive')}}</option>
                                            <option value="2">{{trans('Inclusive')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="button" value="{{trans('submit')}}" id="submit-btn"
                                        class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
@push('scripts')

@endpush