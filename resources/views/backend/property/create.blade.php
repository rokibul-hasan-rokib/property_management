@extends('backend.layouts.master')
@section('title')
    create property
@endsection

@section('content')

@php
    use App\Models\Property;
@endphp
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



        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Property Form</h5>

                            <!-- General Form Elements -->
                            <form action="{{ route('propertys.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <x-required />
                                    <label for="place">House Details:</label>
                                    <input type="text" name="place" class="form-control"
                                        value="{{ old('place', $property->place ?? '') }}" placeholder="Enter Place"
                                        required>
                                </div>

                                <div class="form-group">
                                    <x-required />
                                    <label for="rent">Rent (in decimal):</label>
                                    <input type="number" step="0.01" name="rent" class="form-control"
                                        value="{{ old('rent', $property->rent ?? '') }}" placeholder="Enter Rent" required>
                                </div>

                                <div class="form-group">
                                    <x-required />
                                    <label for="house_details">Location Map Embed:</label>
                                    <textarea name="house_details" class="form-control" placeholder="Enter House Details" required>{{ old('house_details', $property->house_details ?? '') }}</textarea>
                                </div>
                                {{-- <div class="form-group">
                                    <x-required />
                                    <label for="location">Embed Map HTML Code:</label>
                                    <textarea name="location" class="form-control" placeholder="Enter Location Details" required>{{ old('location', $property->location ?? '') }}</textarea>
                                    <x-validation-error :error="$errors->first('location')" />
                                </div> --}}

                                <div class="form-group">
                                    <x-required />
                                    <label for="floor">Floor:</label>
                                    <input type="number" name="floor" class="form-control"
                                        value="{{ old('floor', $property->floor ?? '') }}" placeholder="Enter Floor"
                                        required>
                                </div>

                                <div class="form-group">
                                    <x-required />
                                    <label for="apartment">Apartment:</label>
                                    <input type="text" name="apartment" class="form-control"
                                        value="{{ old('apartment', $property->apartment ?? '') }}"
                                        placeholder="Enter Apartment" required>
                                </div>

                                <div class="form-group">
                                    <x-required />
                                    <label for="bed">Bed:</label>
                                    <input type="number" name="bed" class="form-control"
                                        value="{{ old('bed', $property->bed ?? 0) }}" placeholder="Number of Beds">
                                </div>

                                <div class="form-group">
                                    <x-required />
                                    <label for="washroom">Washroom:</label>
                                    <input type="number" name="washroom" class="form-control"
                                        value="{{ old('washroom', $property->washroom ?? 0) }}"
                                        placeholder="Number of Washrooms">
                                </div>

                                <div class="form-group">
                                    <x-required />
                                    <label for="belcony">Belcony:</label>
                                    <input type="number" name="belcony" class="form-control"
                                        value="{{ old('belcony', $property->belcony ?? 0) }}"
                                        placeholder="Number of Belconies">
                                </div>

                                <div class="form-group">
                                    <x-required />
                                    <label for="kitchen">Kitchen:</label>
                                    <input type="number" name="kitchen" class="form-control"
                                        value="{{ old('kitchen', $property->kitchen ?? 1) }}"
                                        placeholder="Number of Kitchens">
                                </div>
                                <div class="form-group">
                                    {{html()->label('Status', 'status')}}
                                    <x-required/>
                                    {{html()->select('status', \App\Models\Property::STATUS_LIST)->class('form-select '. ($errors->has('address') ? 'is-invalid' : ''))->placeholder(__('Select status'))}}
                                    <x-validation-error :error="$errors->first('status')"/>
                                </div>

                                <div class="form-group mb-2">
                                    <x-required />
                                    <label for="image">Image1:</label>
                                    <input type="file" name="image" class="form-control" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="image2">Image2:</label>
                                    <input type="file" name="image2" class="form-control" >
                                </div>
                                <div class="form-group mb-2">
                                    <label for="image3">Image3:</label>
                                    <input type="file" name="image3" class="form-control" >
                                </div>
                                <div class="form-group mb-2">
                                    <label for="image4">Image4:</label>
                                    <input type="file" name="image4" class="form-control" >
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
