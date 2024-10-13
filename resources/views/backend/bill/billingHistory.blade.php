@extends('backend.layouts.master')
@section('title')
    billing history
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
            <div class="container">
                <h2>Your Billing History</h2>

                @if ($billingHistory->isEmpty())
                    <div class="alert alert-info">
                        You have no billing history.
                    </div>
                @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Bill Name</th>
                                <th>Bill Month</th>
                                <th>House Bill</th>
                                <th>Electricity Bill</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($billingHistory as $bill)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bill->bill_name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($bill->bill_month)->format('F Y') }}</td>
                                    <td>{{ $bill->bill_house }}</td>
                                    <td>{{ $bill->bill_electrity }}</td>
                                    <td>
                                        @if ($bill->status == 1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </section>

    </main><!-- End #main -->
@endsection
