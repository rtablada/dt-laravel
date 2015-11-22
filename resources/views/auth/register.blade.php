@extends('_layout')

@section('content')
{!! Form::open(['route' => 'signup.store']) !!}
  <div class="list-block">
    <ul>
      <li>
        <div class="item-content">
          <div class="item-media"><i class="icon icon-form-name"></i></div>
          <div class="item-inner">
            {!! Form::label('name', 'Name', ['class' => 'item-title label']) !!}
            <div class="item-input">
              {!! Form::text('name', null, ['placeholder' => 'Name']) !!}
            </div>
          </div>
        </div>
      </li>
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
      <li>
        <div class="item-content">
          <div class="item-media"><i class="icon icon-form-password"></i></div>
          <div class="item-inner">
            <div class="item-title label">Confirm Password</div>
            <div class="item-input">
              {!! Form::password('password_confirmation', ['placeholder' => 'Confirm Password']) !!}
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
  <div class="content-block">
    <div class="row">
      <div class="col-50"><a href="{{ route('login.create') }}" class="button button-big">Login</a></div>
      <div class="col-50"><button href="#" class="col-100 button button-big button-fill">Create Account</button></div>
    </div>
  </div>
{!! Form::close() !!}
@endsection
