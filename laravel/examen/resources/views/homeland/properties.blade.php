@php
    use Illuminate\Support\Arr;

    $propertyCount = count($properties);

    $randomCount = min($propertyCount, 2);

    $randomProperties = Arr::random($properties, $randomCount);

@endphp

@extends('layouts.homeland')

@section('content')

    @if (count($randomProperties) === 0)
        <div class="slide-one-item home-slider owl-carousel">
            <div class="site-blocks-cover overlay" style="background-image: url({{ asset('images/hero_bg_2.jpg')}});" data-aos="fade" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <span class="d-inline-block bg-warning text-white px-3 mb-3 property-offer-type rounded">No hay Resultados</span>
                    <p><a href="/" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">Ver Todas</a></p>
                </div>
                </div>
            </div>
            </div>
        </div>
        @include('partials.listTypes')
        <div class="site-section site-section-sm bg-light">
            <div class="container">
                <h3>No hay propiedades disponibles.</h3>
            </div>
        </div>
    @else

        <div class="slide-one-item home-slider owl-carousel">
            @foreach ($randomProperties as $property)
                @foreach ($property->images as $img)
                    @if ($loop->first)
                        <div class="site-blocks-cover overlay" style="background-image: url({{ asset('images/'.$img.'.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
                        @break
                    @endif
                @endforeach

                <div class="container">
                    <div class="row align-items-center justify-content-center text-center">
                        <div class="col-md-10">
                            <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded
                                {{ $property->status === 'Rent' ? 'bg-success' : 'bg-danger' }}">
                                {{ $property->status }}
                            </span>
                            <h1 class="mb-2">{{ $property->address }}</h1>
                            <p class="mb-5"><strong class="h2 text-success font-weight-bold">${{ number_format($property->price, 2) }}</strong></p>
                            <p><a href="/property_details/{{ $property->cve_property}}" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">See Details</a></p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @include('partials.listTypes')

        <div class="site-section site-section-sm bg-light">
            <div class="container">
            <div class="row mb-5">
                @foreach ($properties as $p)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="property-entry h-100">
                        <a href="/property_details/{{ $p->cve_property}}" class="property-thumbnail">
                            <div class="offer-type-wrap">
                                <span class="offer-type {{ $p->status === 'Rent' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $p->status }}
                                </span>
                            </div>
                            @foreach ($p->images as $img)
                                @if ($loop->first)
                                    <img src="{{ asset('images/'.$img.'.jpg') }}" alt="Property Image" class="img-fluid">
                                    @break
                                @endif
                            @endforeach
                        </a>
                        <div class="p-4 property-body">
                            <a href="/property_details/{{ $p->cve_property}}" class="property-favorite"><span class="icon-heart-o"></span></a>

                            <h2 class="property-title"><a href="/property_details/{{ $p->cve_property}}">{{ $p->address}}</a></h2>
                            <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> {{ $p->address}}</span>
                            <strong class="property-price text-primary mb-3 d-block text-success">${{ number_format($p->price, 2) }}</strong>
                            <ul class="property-specs-wrap mb-3 mb-lg-0">
                            <li>
                                <span class="property-specs">Beds</span>
                                <span class="property-specs-number">{{ $p->bedrooms}} <sup>+</sup></span>

                            </li>
                            <li>
                                <span class="property-specs">Baths</span>
                                <span class="property-specs-number">{{ $p->bathrooms}}</span>

                            </li>
                            <li>
                                <span class="property-specs">SQ FT</span>
                                <span class="property-specs-number">{{ $p->sqft}}</span>

                            </li>
                            </ul>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
            </div>
        </div>
    @endif
    @if(isset( $flag))
        @include('partials.agents')

        @include('partials.whychose')
    @endif
@endsection
