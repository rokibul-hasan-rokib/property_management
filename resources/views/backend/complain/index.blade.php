@extends('backend.layouts.master')
@section('title')
    All complain
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
                            <h5 class="card-title">Complain List</h5>


                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Number</th>
                                        <th>Flat</th>
                                        <th>Apartment</th>
                                        <th>Descriptions</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($complains as $complain)
                                        <tr>
                                            <td>{{ $complain->id }}</td>
                                            <td>{{ $complain->name }}</td>
                                            <td>{{ $complain->number }}</td>
                                            <td>{{ $complain->flat }}</td>
                                            <td>{{ $complain->apartment }}</td>
                                            <td>{{ $complain->descriptions }}</td>
                                            <td>

                                                <!-- Delete Button -->
                                                <form action="{{ route('complains.destroy', $complain->id) }}" method="POST"
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
