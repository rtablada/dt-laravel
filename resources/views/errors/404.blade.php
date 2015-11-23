@extends('_layout') @section('content')
<div class="navbar">
  <div class="navbar-inner navbar-on-center">
    <div class="left"></div>
    <div class="center sliding">Dog Trainer</div>
    <div class="right"></div>
  </div>
</div>

<div class="modal-overlay modal-overlay-visible"></div>
<div class="popup-overlay"></div>
<div class="actions-modal modal-in">
  <div class="actions-modal-group">
    <div class="actions-modal-label">This page is not available right now.</div>
    <a href="{{ route('login.create') }}"class="actions-modal-button">Login</a>
  </div>
</div>
@endsection
