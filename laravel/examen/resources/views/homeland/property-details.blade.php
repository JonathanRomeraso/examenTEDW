@php
    use Illuminate\Support\Arr;
    $randomProperties = Arr::random($allproperties, 3);
@endphp

@extends('layouts.homeland')


@section('content')
    @foreach ($property->images as $img)
        @if ($loop->first)
            <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/'.$img.'.jpg') }});;" data-aos="fade" data-stellar-background-ratio="0.5">
             @break
        @endif
    @endforeach
        <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
            <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Property Details of</span>
            <h1 class="mb-2">{{ $property->address}}</h1>
            <p class="mb-5"><strong class="h2 text-success font-weight-bold">${{ number_format($property->price, 2) }}</strong></p>
            </div>
        </div>
        </div>
    </div>

    <div class="site-section site-section-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div>
                        <div class="slide-one-item home-slider owl-carousel">
                            @foreach ($property->images as $img)
                                <div><img src="{{ asset('images/'.$img.'.jpg') }}" alt="Image" class="img-fluid"></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="bg-white property-body border-bottom border-left border-right">
                        <div class="row mb-5">
                        <div class="col-md-6">
                            <strong class="text-success h1 mb-3">${{ number_format($property->price, 2) }}</strong>
                        </div>
                        <div class="col-md-6">
                            <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                            <li>
                            <span class="property-specs">Beds</span>
                            <span class="property-specs-number">{{ $property->bedrooms}} <sup>+</sup></span>

                            </li>
                            <li>
                            <span class="property-specs">Baths</span>
                            <span class="property-specs-number">{{ $property->bathrooms}}</span>

                            </li>
                            <li>
                            <span class="property-specs">SQ FT</span>
                            <span class="property-specs-number">{{ $property->sqft}}</span>

                            </li>
                        </ul>
                        </div>
                        </div>
                        <div class="row mb-5">
                        <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text">Home Type</span>
                            <strong class="d-block">{{ $property->type}}</strong>
                        </div>
                        <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text">Year Built</span>
                            <strong class="d-block">{{ $property->year_built}}</strong>
                        </div>
                        <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text">Price/Sqft</span>
                            <strong class="d-block">${{ number_format($property->price / $property->sqft, 2) }}</strong>
                        </div>
                        </div>
                        <h2 class="h4 text-black">More Info</h2>
                        <p>{{ $property->description}}</p>

                        <div class="row no-gutters mt-5">
                        <div class="col-12">
                            <h2 class="h4 text-black mb-3">Gallery</h2>
                        </div>
                        @foreach ($property->images as $img)
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <a href="{{ asset('images/'.$img.'.jpg') }}" class="image-popup gal-item"><img src="{{ asset('images/'.$img.'.jpg') }}" alt="Image" class="img-fluid"></a>
                                </div>
                        @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">

                    <div class="bg-white widget border rounded">

                        <h3 class="h4 text-black widget-title mb-3">Contact Agent</h3>
                        <form action="" class="form-contact-agent">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" id="phone" class="btn btn-primary" value="Send Message">
                        </div>
                        </form>
                    </div>

                    <div class="bg-white widget border rounded">
                        <h3 class="h4 text-black widget-title mb-3 ml-0">Share</h3>
                            <div class="px-3" style="margin-left: -15px;">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=&quote=" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                            <a  href="https://twitter.com/intent/tweet?text=&url=" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url=" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="site-section site-section-sm bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                <div class="site-section-title mb-5">
                    <h2>Related Properties</h2>
                </div>
                </div>
            </div>
            <div class="row mb-5">
                @foreach ($randomProperties as $property)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="property-entry h-100">
                            <a href="/property_details/{{ $property->cve_property}}" class="property-thumbnail">
                            <div class="offer-type-wrap">
                                <span class="offer-type
                                    {{ $property->status === 'Rent' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $property->status }}
                                </span>
                            </div>
                            @foreach ($property->images as $img)
                                @if ($loop->first)
                                    <img src="{{ asset('images/'.$img.'.jpg') }}" alt="Image" class="img-fluid">
                                    @break
                                @endif
                            @endforeach
                            </a>
                            <div class="p-4 property-body">
                            <a href="/property_details/{{ $property->cve_property}}" class="property-favorite"><span class="icon-heart-o"></span></a>
                            <h2 class="property-title"><a href="property-details.html">{{ $property->address }}</a></h2>
                            <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> {{ $property->address }}</span>
                            <strong class="property-price text-primary mb-3 d-block text-success">${{ number_format($property->price, 2) }}</strong>
                            <ul class="property-specs-wrap mb-3 mb-lg-0">
                                <li>
                                <span class="property-specs">Beds</span>
                                <span class="property-specs-number"> {{ $property->bedrooms}} <sup>+</sup></span>

                                </li>
                                <li>
                                <span class="property-specs">Baths</span>
                                <span class="property-specs-number">{{ $property->bathrooms}}</span>

                                </li>
                                <li>
                                <span class="property-specs">SQ FT</span>
                                <span class="property-specs-number">{{ $property->sqft}}</span>

                                </li>
                            </ul>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
