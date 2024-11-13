@extends('frontend.layouts.app')
@section('title')
    login
@endsection

@section('content')
    <div class="hero page-inner overlay" style="background-image: url('images/hero_bg_3.jpg')">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center mt-5">
                    <h1 class="heading" data-aos="fade-up">Login Here</h1>

                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb text-center justify-content-center">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active text-white-50" aria-current="page">
                                Login
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">

            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <x-required />
                            <label for="phone_number">Number</label>
                            <input type="number" name="phone_number" id="phone_number" class="form-control" required>
                            <x-validation-error :error="$errors->first('phone_number')" />
                        </div>
                        <div class="form-group mb-2">
                            <x-required />
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                            <x-validation-error :error="$errors->first('password')" />
                        </div>

                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>
    <!-- /.untree_co-section -->
@endsection
