@extends('_layout')

@section('content')
<div class="navbar">
  <div class="navbar-inner navbar-on-center">
    <div class="left"></div>
    <div class="center sliding">Past Training Sessions</div>
    <div class="right"></div>
  </div>
</div>

<div class="list-block">
  <ul>
    @foreach($practices as $practice)
    <li>
      <a href="{{ route('practices.details', $practice) }}" class="item-link">
        <div class="item-content  training-item {{ $practice->successRate < 70 ? 'training-item--warning' : null}}">
          <div class="item-inner">
            {{ $practice->started_at->toFormattedDateString() }} -
            {{ $practice->completionTime }} -
            {{ $practice->successRate }}%
          </div>
        </div>
      </a>
    </li>
    @endforeach
  </ul>
</div>

<div class="toolbar">
  <div class="toolbar-inner">
    <span></span>
    <a href="{{ route('practices.create') }}" class="open-popover link">
      <i class="fa fa-edit"></i>
    </a>
  </div>
</div>
@endsection
