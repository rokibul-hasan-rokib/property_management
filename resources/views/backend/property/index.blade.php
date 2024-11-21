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
                            <h5 class="card-title">Property</h5>
                            <div class="d-flex justify-content-between mb-4">
                                <a href="{{route('propertys.create')}}" class="btn btn-primary">PropertyAdd</a>
                            </div>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>House Details</th>
                                        <th>Rent</th>
                                        <th>Floor</th>
                                        <th>Apartment</th>
                                        <th>Bed</th>
                                        <th>Washroom</th>
                                        <th>Belcony</th>
                                        <th>Kitchen</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($propertys as $property)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $property->place }}</td>
                                            <td>{{ $property->rent }}</td>
                                            <td>{{ $property->floor }}</td>
                                            <td>{{ $property->apartment }}</td>
                                            <td>{{ $property->bed }}</td>
                                            <td>{{ $property->washroom }}</td>
                                            <td>{{ $property->belcony }}</td>
                                            <td>{{ $property->kitchen }}</td>
                                            <td>
                                                @if ($property->image)
                                                <img src="{{ asset($property->image) }}" width="50" height="50" alt="owner Image">
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('propertys.edit', $property->id) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>

                                                <form action="{{ route('propertys.destroy', $property->id) }}"
                                                    method="POST" style="display:inline-block;">
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
