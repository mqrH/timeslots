<?php
@extends('app')

@section('content')
    @foreach($services as $service)
        @include(
            'components.servicePanel',
            [
                'name'     => $service->name,
                'price'    => $service->price,
                'duration' => $service->duration,
                'options'  => [],
                'id'       => $service->id,
            ]
        )
    @endforeach
@endsection
