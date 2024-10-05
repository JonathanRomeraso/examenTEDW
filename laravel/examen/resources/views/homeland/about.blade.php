@extends('layouts.homeland')

@section('content')

    @include('partials.cover', ['title' => 'About Homeland'])

    @include('partials.ourCompany')

    @include('partials.leadership')

    @include('partials.agents')

    @include('partials.frequently')

@endsection
