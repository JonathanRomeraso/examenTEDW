@extends('layouts.homeland')

@section('content')

    @include('homeland.properties', ['properties' => $properties, 'flag1' => true])




@endsection
