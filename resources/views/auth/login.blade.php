@extends('_layout')

@section('content')
<div class="navbar">
  <div class="navbar-inner navbar-on-center">
    <div class="left"></div>
    <div class="center sliding">Dog Trainer</div>
    <div class="right"></div>
  </div>
</div>

{!! Form::open(['route' => 'login.store']) !!}
  <div class="list-block">
    <ul>
      <li>
        <div class="item-content">
          <div class="item-media"><i class="icon icon-form-email"></i></div>
          <div class="item-inner">
            {!! Form::label('email', 'Email', ['class' => 'item-title label']) !!}
            <div class="item-input">
              {!! Form::input('email', 'email', null, ['placeholder' => 'Email']) !!}
            </div>
          </div>
        </div>
      </li>
      <li>
        <div class="item-content">
          <div class="item-media"><i class="icon icon-form-password"></i></div>
          <div class="item-inner">
            <div class="item-title label">Password</div>
            <div class="item-input">
              {!! Form::password('password', ['placeholder' => 'Password']) !!}
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
  <div class="content-block">
    <div class="row">
      <div class="col-50"><a href="{{ route('signup.create') }}" class="button button-big">Signup</a></div>
      <div class="col-50"><button href="#" class="col-100 button button-big button-fill">Submit</button></div>
    </div>
  </div>
{!! Form::close() !!}
@endsection
