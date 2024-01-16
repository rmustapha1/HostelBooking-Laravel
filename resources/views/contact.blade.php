@extends('layouts.app')

@section('content')
<section id="banner" class="mx-auto">
    <div class="top-banner">
        <h1 class="text-gray-900 text-bold lg:text-5xl sm:text-4xl">Contact</h1>
        <div class="line3 items-start justify-start mx-auto my-2 text-blue-500">
        </div>
    </div>
    <div class="container">
        <div class="row items-center justify-center my-5">
            <div class="col-md-4 mb-3">
                <div class="card border-none rounded-md shadow-md">
                    <div class="card-body">
                        <h4 class="card-title text-base font-semibold leading-7"><i class="bi bi-geo-alt pr-2 text-4xl text-gray-300"></i> Address</h4>
                        <p class="card-text">Tamale Technical University<br>Tamale, NR Ghana</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card border-none rounded-md shadow-md">
                    <div class="card-body">
                        <h4 class="card-title text-base font-semibold leading-7"><i class="bi bi-telephone pr-2 text-4xl text-gray-300"></i> Phone</h4>
                        <p class="card-text">(054) 321-2796</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card border-none rounded-md shadow-md">
                    <div class="card-body">
                        <h4 class="card-title text-base font-semibold leading-7"><i class="bi bi-envelope pr-2 text-4xl text-gray-300"></i> Email</h4>
                        <p class="card-text">privatehostels21@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row items-center justify-center my-5">
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body border-none rounded-md shadow-md">
                        <h4 class="card-title text-base font-semibold leading-7 text-blue-300">Contact Form</h4>
                        <form action="#" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border-none rounded-md shadow-md">
                    <div class="card-body">
                        <h4 class="card-title text-base font-semibold leading-7 text-blue-300">Location</h4>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.054182223032!2d-73.9869516845939!3d40.75605497932801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259c4c2f9f775%3A0x2c9c1c3d7b1d3d2a!2sEmpire%20State%20Building!5e0!3m2!1sen!2sus!4v1628093471668!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection