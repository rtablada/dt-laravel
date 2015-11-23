@extends('_layout')

@section('content')
{!! Form::open(['route' => 'practices.start']) !!}
<div class="navbar">
  <div class="navbar-inner navbar-on-center">
    <div class="left">
      <a href="{{ route('practices.index') }}" class="open-popover link">
        Back
      </a>
    </div>
    <div class="center sliding">New Training Session</div>
    <div class="right">
      <button class="no-style">Submit</button>
    </div>
  </div>
</div>

<div class="list-block">
  <ul>
  @foreach($exercises as $exercise)
    <li>
      <div class="item-content">
        <div class="item-inner">
          {{ $exercise->name }}
          <label class="label-switch">
            <input name="exercises[]" value="{{ $exercise->id }}" type="checkbox">
            <div class="checkbox"></div>
          </label>
        </div>
      </div>
    </li>
  @endforeach
  </ul>
</div>


{!! Form::close() !!}
@endsection
