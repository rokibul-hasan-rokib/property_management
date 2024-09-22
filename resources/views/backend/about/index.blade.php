@extends('backend.layouts.master')
@section('title')
    about
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
                            <h5 class="card-title">About</h5>
                            <div class="d-flex justify-content-between mb-4">
                                <a href="{{route('abouts.create')}}" class="btn btn-primary">AboutAdd</a>
                            </div>


                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Quality</th>
                                        <th>Rate</th>
                                        <th>Security</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($abouts as $about)
                                    <tr>

                                        <td>{{ $about->id }}</td>
                                        <td>{{ $about->quality }}</td>
                                        <td>{{ $about->rate }}</td>
                                        <td>{{ $about->security }}</td>
                                        <td>
                                            @if ($about->image)
                                            <img src="{{ asset($about->image) }}" width="50" height="50" alt="About Image">
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('abouts.edit', $about->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('abouts.destroy', $about->id) }}" method="POST" style="display:inline-block;">
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
