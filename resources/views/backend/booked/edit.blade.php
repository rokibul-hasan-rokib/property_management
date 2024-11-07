@extends('backend.layouts.master')
@section('title')
    create agent
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
                            <h5 class="card-title">Booked Status Update Form</h5>

                            <!-- General Form Elements -->
                            <form action="{{ route('booked.store') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    {{html()->label('Status', 'status')}}
                                    <x-required/>
                                    {{html()->select('status', \App\Models\Booked::STATUS_LIST)->class('form-select '. ($errors->has('address') ? 'is-invalid' : ''))->placeholder(__('Select status'))}}
                                    <x-validation-error :error="$errors->first('status')"/>
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
