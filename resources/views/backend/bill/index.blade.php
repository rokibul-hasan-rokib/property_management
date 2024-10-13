@extends('backend.layouts.master')
@section('title')
    contact
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
                            <h5 class="card-title">Agent</h5>
                            <div class="d-flex justify-content-between mb-4">
                                <a href="{{ route('bills.create') }}" class="btn btn-primary">BillAdd</a>
                            </div>


                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>bill Name</th>
                                        <th>bill Month</th>
                                        <th>bill House</th>
                                        <th>bill Electrity</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bills as $bill)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <th>{{ $bill->user->name }}</th>
                                            <td>{{ $bill->bill_name }}</td>
                                            <td>{{ $bill->bill_month }}</td>
                                            <td>{{ $bill->bill_house }}</td>
                                            <td>{{ $bill->bill_electrity }}</td>
                                            <td>
                                                {{ $bill->status }}
                                            </td>
                                            <td>
                                                <a href="{{ route('bills.edit', $bill->id) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>

                                                <form action="{{ route('bills.destroy', $bill->id) }}" method="POST"
                                                    style="display:inline-block;">
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
