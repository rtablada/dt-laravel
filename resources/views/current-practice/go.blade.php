@extends('_layout')

@section('content')
{!! Form::open(['route' => 'current-practice.store', 'class' => 'exercise']) !!}
  <h1 class="exercise__name">{{ $exercise->name }}</h1>
  <h2 class="exercise__time">{{ $exercise->time or '3 mins' }}</h2>
  <h2 class="exercise__count">{{ $exerciseNumber }} of {{ $totalCount }}</h2>

  <div class="exercise__responses">
    <button class="exercise__response exercise__response--fail" name="success" value="0">Fail</button>
    <button class="exercise__response exercise__response--pass" name="success" value="1">Pass</button>
  </div>
{!! Form::close() !!}
@endsection
