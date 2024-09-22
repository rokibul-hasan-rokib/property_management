@extends('backend.layouts.master')
@section('title')
    edit about
@endsection

@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Form Elements</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Forms</li>
                    <li class="breadcrumb-item active">Elements</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Agent Form</h5>

                            <!-- General Form Elements -->
                            <form action="{{ isset($about) ? route('abouts.update', $about->id) : route('abouts.store') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @if (isset($about))
                                    @method('PUT')
                                @endif

                                <div class="form-group">
                                    <label for="image">Image:</label>
                                    <input type="file" name="image" class="form-control" accept="image/*">
                                    @if (isset($about) && $about->image)
                                        <img src="{{ asset($about->image) }}" width="100" height="100"
                                            alt="Current Image" class="mt-2">
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="quality">Quality:</label>
                                    <input type="text" name="quality" class="form-control" placeholder="Enter Quality"
                                        value="{{ isset($about) ? $about->quality : '' }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="rate">Rate:</label>
                                    <input type="text" name="rate" class="form-control" placeholder="Enter Rate"
                                        value="{{ isset($about) ? $about->rate : '' }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="security">Security:</label>
                                    <input type="text" name="security" class="form-control"
                                        placeholder="Enter Security Description"
                                        value="{{ isset($about) ? $about->security : '' }}" required>
                                </div>

                                <button type="submit"
                                    class="btn btn-primary">{{ isset($about) ? 'Update' : 'Submit' }}</button>
                            </form>


                        </div>
                    </div>

                </div>


            </div>
        </section>

    </main><!-- End #main -->
@endsection
