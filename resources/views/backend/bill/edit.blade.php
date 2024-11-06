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
                            <h5 class="card-title">Agent Form</h5>

                            <!-- General Form Elements -->

                            <form action="{{ route('bills.update', $bill->id) }}" method="POST">
                                @csrf
                                @method('PUT') <!-- Use PUT for update -->

                                <!-- User Dropdown -->
                                <div class="mb-3">
                                    <x-required />
                                    <label for="user_id" class="form-label">User</label>
                                    <select name="user_id" id="user_id" class="form-select" >
                                        <option value="" disabled>Select User</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                {{ $user->id == $bill->user_id ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-validation-error :error="$errors->first('user_id')" />
                                </div>

                                <!-- Bill Name -->
                                <div class="mb-3">
                                    <x-required />
                                    <label for="bill_name" class="form-label">Bill Name</label>
                                    <input type="text" name="bill_name" id="bill_name" class="form-control"
                                        value="{{ $bill->bill_name }}" >
                                        <x-validation-error :error="$errors->first('bill_name')" />
                                </div>

                                <!-- Bill Month -->
                                <div class="mb-3">
                                    <x-required />
                                    <label for="bill_month" class="form-label">Bill Month</label>
                                    <input type="month" name="bill_month" id="bill_month" class="form-control"
                                        value="{{ \Carbon\Carbon::parse($bill->bill_month)->format('Y-m') }}" >
                                        <x-validation-error :error="$errors->first('bill_month')" />
                                </div>

                                <!-- House Bill Amount -->
                                <div class="mb-3">
                                    <x-required />
                                    <label for="bill_house" class="form-label">House Bill Amount</label>
                                    <input type="text" name="bill_house" id="bill_house" class="form-control"
                                        value="{{ $bill->bill_house }}">
                                        <x-validation-error :error="$errors->first('bill_house')" />
                                </div>

                                <!-- Electricity Bill Amount -->
                                <div class="mb-3">
                                    <x-required />
                                    <label for="bill_electrity" class="form-label">Electricity Bill Amount</label>
                                    <input type="text" name="bill_electrity" id="bill_electrity" class="form-control"
                                        value="{{ $bill->bill_electrity }}" >
                                        <x-validation-error :error="$errors->first('bill_electrity')" />
                                </div>

                                <!-- Status Dropdown -->
                                <div class="mb-3">
                                    <x-required />
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-select" required>
                                        <option value="" disabled>Select status</option>
                                        @foreach (\App\Models\MonthlyRent::STATUS_LIST as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ $bill->status == $key ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-validation-error :error="$errors->first('status')" />
                                </div>

                                <!-- Submit Button -->
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Update Bill</button>
                                </div>
                            </form>


                        </div>
                    </div>

                </div>


            </div>
        </section>

    </main><!-- End #main -->
@endsection
