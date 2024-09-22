@extends('backend.layouts.master')
@section('title')
    create about
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
                            <h5 class="card-title">About Form</h5>

                            <!-- General Form Elements -->
                            <!-- General Form Elements -->
                            <form action="{{ route('abouts.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="image">Image:</label>
                                    <input type="file" name="image" class="form-control" accept="image/*" required>
                                </div>

                                <div class="form-group">
                                    <label for="quality">Quality:</label>
                                    <input type="text" name="quality" class="form-control" placeholder="Enter Quality"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="rate">Rate:</label>
                                    <input type="text" name="rate" class="form-control" placeholder="Enter Rate"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="security">Security:</label>
                                    <input type="text" name="security" class="form-control"
                                        placeholder="Enter Security Description" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>


                        </div>
                    </div>

                </div>


            </div>
        </section>

    </main><!-- End #main -->
@endsection
