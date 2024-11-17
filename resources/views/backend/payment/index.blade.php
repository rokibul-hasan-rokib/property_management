@extends('backend.layouts.master')
@section('title')
    All Payment List
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Tables</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Payment</h5>
                            <a class="btn btn-small btn-primary" href="{{ route('payment.month') }}">Monthly Details</a>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Number</th>
                                        <th>Amount</th>
                                        <th>Month</th>
                                        <th>Flat</th>
                                        <th>Apartment</th>
                                        <th>Descriptions</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $payment)
                                        <tr>
                                            <td>{{ $payment->id }}</td>
                                            <td>{{ $payment->name }}</td>
                                            <td>{{ $payment->number }}</td>
                                            <td>{{ $payment->amount }}</td>
                                            <td>{{ \App\Models\Payment::MONTH_LIST[$payment->month] ?? '' }}</td>
                                            <td>{{ $payment->flat }}</td>
                                            <td>{{ $payment->apartment }}</td>
                                            <td>{{ $payment->descriptions }}</td>
                                            <td>
                                                <!-- Edit Button -->
                                                <a href="{{ route('payments.edit', $payment->id) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>

                                                <!-- Delete Button -->
                                                <form action="{{ route('payments.destroy', $payment->id) }}" method="POST"
                                                    class="d-inline-block" onsubmit="return confirm('Are you sure?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
