@extends('frontend.layouts.app')
@section('title')
    contact
@endsection

@section('content')
    <div class="hero page-inner overlay" style="background-image: url('images/hero_bg_1.jpg')">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center mt-5">
                    <h1 class="heading" data-aos="fade-up">Contact Us</h1>

                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb text-center justify-content-center">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active text-white-50" aria-current="page">
                                Contact
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">

            <x-alert />

            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-info">
                        <div class="address mt-2">
                            <i class="icon-room"></i>
                            <h4 class="mb-2">Location:</h4>
                            <p>
                                43 varsity Rd. NOddapara,<br />
                                Dhaka 1230
                            </p>
                        </div>

                        <div class="open-hours mt-4">
                            <i class="icon-clock-o"></i>
                            <h4 class="mb-2">Open Hours:</h4>
                            <p>
                                Sunday-Friday:<br />
                                09:00 AM - 20:00 PM
                            </p>
                        </div>

                        <div class="email mt-4">
                            <i class="icon-envelope"></i>
                            <h4 class="mb-2">Email:</h4>
                            <p>nub@gmail.com</p>
                        </div>

                        <div class="phone mt-4">
                            <i class="icon-phone"></i>
                            <h4 class="mb-2">Call:</h4>
                            <p>01799836379</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    <form action="{{ route('contacts.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <!-- Name Field -->
                            <div class="col-6 mb-3">
                                <x-required />
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Your Name"  />
                                    <x-validation-error :error="$errors->first('name')" />
                            </div>

                            <!-- Email Field -->
                            <div class="col-6 mb-3">
                                <x-required />
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Your Email"  />
                                    <x-validation-error :error="$errors->first('email')" />
                            </div>

                            <!-- Subject Field -->
                            <div class="col-12 mb-3">
                                <x-required />
                                <input type="text" name="subject" id="subject" class="form-control"
                                    placeholder="Subject" />
                                    <x-validation-error :error="$errors->first('subject')" />
                            </div>

                            <!-- Message Field -->
                            <div class="col-12 mb-3">
                                <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Message"
                                    ></textarea>
                                    <x-validation-error :error="$errors->first('message')" />
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12">
                                <input type="submit" value="Send Message" class="btn btn-primary" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.untree_co-section -->
@endsection
