@extends('layouts.admin')

@section('content')
<section class="content-wrapper">
    <div class="forms">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>{{trans('Add User')}}</h4>
                    </div>
                    <div class="card-body">
                        <p class="italic">
                            <small>{{trans('The field labels marked with * are required input fields')}}.</small>
                        </p>
                        <form id="product-form">
                            <div class="row">
                                <h5 class="my-3 text-gray-600 font-semibold leading-7">Primary User Info</h5>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="mb-1 text-muted">{{trans('User Type')}} *</strong> </label>
                                        <div class="input-group">
                                            <select name="type" required
                                                class="form-control border-2 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                id="type">
                                                <option value="Student">Student</option>
                                                <option value="Hostel Manager">Property Manager</option>
                                                <option value="Admin">Administrator</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="mb-1 text-muted">{{trans('User`s Firstname')}} *</strong> </label>
                                        <input type="text" name="fname"
                                            class="form-control border-2 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            id="fname" aria-describedby="fname" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="mb-1 text-muted">{{trans('User`s Lastname')}} *</strong> </label>
                                        <input type="text" name="lname"
                                            class="form-control border-2 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            id="lname" aria-describedby="lname" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="mb-1 text-muted">{{trans('User`s Email')}} *</strong> </label>
                                        <input type="email" name="email"
                                            class="form-control border-2 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            id="email" aria-describedby="email" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="mb-1 text-muted">{{trans('User`s Phone')}} *</strong> </label>
                                        <input type="tel" name="phone"
                                            class="form-control border-2 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            id="phone" aria-describedby="phone" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                        <label class="mb-1 text-muted">{{trans('Password')}} *</strong> </label>
                                        <div class="input-group">
                                            <input type="password" name="code"
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
                                <div class="form-group">
                                    <button type="submit"  id="submit-btn"
                                        class="btn btn-primary">Create
                                    </button>
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