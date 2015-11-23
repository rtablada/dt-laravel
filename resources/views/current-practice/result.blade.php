@extends('_layout')

@section('content')
<div class="navbar">
  <div class="navbar-inner navbar-on-center">
    <div class="left">
      <a href="{{ route('practices.index') }}" class="link">
        Back
      </a>
    </div>
    <div class="center sliding">Training Results</div>
    <div class="right"></div>
  </div>
</div>

<div class="list-block">
  <ul>
    @foreach($practice->exercisePerformances as $performance)
    <li>
      <div class="item-content">
        <div class="item-media">
          <i class="result__icon result__icon--{{ $performance->pivot->success ? 'pass' : 'fail' }}"></i>
        </div>
        <div class="item-inner">
          {{ $performance->name }}
        </div>
      </div>
    </li>
    @endforeach
  </ul>
</div>
@endsection
