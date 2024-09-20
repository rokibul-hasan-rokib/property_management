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


                        <form action="{{ route('propertys.update', $property->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="place">Place:</label>
                                <input type="text" name="place" class="form-control"
                                    value="{{ old('place', $property->place) }}" placeholder="Enter Place">
                            </div>

                            <div class="form-group">
                                <label for="rent">Rent (in decimal):</label>
                                <input type="number" step="0.01" name="rent" class="form-control"
                                    value="{{ old('rent', $property->rent) }}" placeholder="Enter Rent">
                            </div>

                            <div class="form-group">
                                <label for="house_details">House Details:</label>
                                <textarea name="house_details" class="form-control" placeholder="Enter House Details">{{ old('house_details', $property->house_details) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="floor">Floor:</label>
                                <input type="number" name="floor" class="form-control"
                                    value="{{ old('floor', $property->floor) }}" placeholder="Enter Floor">
                            </div>

                            <div class="form-group">
                                <label for="apartment">Apartment:</label>
                                <input type="text" name="apartment" class="form-control"
                                    value="{{ old('apartment', $property->apartment) }}" placeholder="Enter Apartment">
                            </div>

                            <div class="form-group">
                                <label for="bed">Bed:</label>
                                <input type="number" name="bed" class="form-control"
                                    value="{{ old('bed', $property->bed) }}" placeholder="Number of Beds">
                            </div>

                            <div class="form-group">
                                <label for="washroom">Washroom:</label>
                                <input type="number" name="washroom" class="form-control"
                                    value="{{ old('washroom', $property->washroom) }}"
                                    placeholder="Number of Washrooms">
                            </div>

                            <div class="form-group">
                                <label for="belcony">Belcony:</label>
                                <input type="number" name="belcony" class="form-control"
                                    value="{{ old('belcony', $property->belcony) }}" placeholder="Number of Belconies">
                            </div>

                            <div class="form-group">
                                <label for="kitchen">Kitchen:</label>
                                <input type="number" name="kitchen" class="form-control"
                                    value="{{ old('kitchen', $property->kitchen) }}" placeholder="Number of Kitchens">
                            </div>

                            <div class="form-group mb-2">
                                <label for="image">Image:</label>
                                <input type="file" name="image" class="form-control">
                                @if ($property->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $property->image) }}"
                                            alt="{{ $property->place }}" width="150" class="img-thumbnail">
                                    </div>
                                    <small>Current image: {{ $property->image }}</small>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>



</div>
</div>

</div>


</div>
</section>

</main><!-- End #main -->
@endsection
