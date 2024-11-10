@extends('frontend.layouts.app')
@section('title')
    property details
@endsection

@section('content')
    <div class="hero page-inner overlay" style="background-image: url('images/hero_bg_3.jpg')">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center mt-5">
                    <h1 class="heading" data-aos="fade-up">
                        5232 California AVE. 21BC
                    </h1>

                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb text-center justify-content-center">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item">
                                <a href="properties.html">Properties</a>
                            </li>
                            <li class="breadcrumb-item active text-white-50" aria-current="page">
                                5232 California AVE. 21BC
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7">
                    <div class="img-property-slide-wrap">
                        <div class="img-property-slide">
                            <img src="{{ asset($property->image) }}" alt="Image 1" class="img-fluid thumbnail-image"
                                data-bs-toggle="modal" data-bs-target="#imageModal"
                                data-bs-img="{{ asset($property->image) }}" />
                            <img src="{{ asset($property->image2) }}" alt="Image 2" class="img-fluid thumbnail-image"
                                data-bs-toggle="modal" data-bs-target="#imageModal"
                                data-bs-img="{{ asset($property->image2) }}" />
                            <img src="{{ asset($property->image3) }}" alt="Image 3" class="img-fluid thumbnail-image"
                                data-bs-toggle="modal" data-bs-target="#imageModal"
                                data-bs-img="{{ asset($property->image3) }}" />
                            <img src="{{ asset($property->image4) }}" alt="Image 4" class="img-fluid thumbnail-image"
                                data-bs-toggle="modal" data-bs-target="#imageModal"
                                data-bs-img="{{ asset($property->image4) }}" />
                        </div>
                    </div>
                </div>


                <div class="col-lg-4">
                    <h2 class="heading text-primary">{{ $property->house_details }}</h2>
                    <p class="meta">{{ $property->place }}</p>
                    <p class="text-black-50">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ratione
                        laborum quo quos omnis sed magnam id, ducimus saepe, debitis error
                        earum, iste dicta odio est sint dolorem magni animi tenetur.
                    </p>
                    <p class="text-black-50">
                        Perferendis eligendi reprehenderit, assumenda molestias nisi eius
                        iste reiciendis porro tenetur in, repudiandae amet libero.
                        Doloremque, reprehenderit cupiditate error laudantium qui, esse
                        quam debitis, eum cumque perferendis, illum harum expedita.
                    </p>

                    <div class="d-block agent-box p-5">
                        <div class="img mb-4">
                            <img src="{{ asset('images/person_2-min.jpg') }}" alt="Image" class="img-fluid" />
                        </div>
                        <div class="text">
                            <h3 class="mb-0">Alicia Huston</h3>
                            <div class="meta mb-3">Real Estate</div>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Ratione laborum quo quos omnis sed magnam id ducimus saepe
                            </p>
                            <ul class="list-unstyled social dark-hover d-flex">
                                <li class="me-1">
                                    <a href="#"><span class="icon-instagram"></span></a>
                                </li>
                                <li class="me-1">
                                    <a href="#"><span class="icon-twitter"></span></a>
                                </li>
                                <li class="me-1">
                                    <a href="#"><span class="icon-facebook"></span></a>
                                </li>
                                <li class="me-1">
                                    <a href="#"><span class="icon-linkedin"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-bold justify-content-center m-3">
        Status of this HOUSE: <strong> <td>{{ \App\Models\Property::STATUS_LIST[$property->status] ?? '' }}</td></strong>
    </div>
    <div>
        <iframe style="border:0; width: 100%; height: 350px;"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3649.1412052702985!2d90.4220306741039!3d23.849119084981663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c671012602eb%3A0x27761cc8da96b3b7!2sNorthern%20University%20Bangladesh%2C%20Permanent%20Campus!5e0!3m2!1sen!2sbd!4v1730969852030!5m2!1sen!2sbd"
            frameborder="0" allowfullscreen></iframe>
    </div>
    <!-- Modal to show the larger image as a carousel -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset($property->image) }}" class="d-block w-100 img-fluid" alt="Image 1">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset($property->image2) }}" class="d-block w-100 img-fluid" alt="Image 2">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset($property->image3) }}" class="d-block w-100 img-fluid" alt="Image 3">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset($property->image4) }}" class="d-block w-100 img-fluid" alt="Image 4">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.querySelectorAll('.thumbnail-image').forEach(image => {
            image.addEventListener('click', function() {
                var largeImageSrc = this.getAttribute('data-bs-img');
                document.getElementById('modalImage').src = largeImageSrc;
            });
        });
    </script>
@endsection
