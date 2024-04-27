@extends('app')

@section('content')
    @foreach($slots as $dayOfTheWeak => $slotsInfo)
        @include('components.timeSlotPanel',
                ['name' => $dayOfTheWeak, 'date' => $slotsInfo['date'], 'slots' => $slotsInfo['slots']])
    @endforeach
@endsection
