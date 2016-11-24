@extends('layouts.master')

@section('content')

@if (count($errors) > 0)
    <section class="info-box fail">
      @foreach ($errors->all() as $error)
        {{ $error }}
      @endforeach
      
    </section>
  @endif

  @if (Session::has('fail'))
    <section class="info-box fail">
      {{ session::get('fail') }}      
    </section>
  @endif

<div class="container">
  <div class="row">
    <div class="span12">

      <form class="form-horizontal" action="{{ route('admin.login') }}" method="POST">
        <fieldset>
        <div class="quotes">
          <div id="legend">

              <div class="quotes">
                <h1>Login</h1>
              </div>
          </div>
          <div class="control-group">
            <!-- Name -->
            <label class="control-label"  for="name">name</label>
            <div class="controls">
              <input type="text" id="name" name="name" placeholder="name" class="input-xlarge">
            </div>
          </div>
          <div class="control-group">
            <!-- Password-->
            <label class="control-label" for="password">Password</label>
            <div class="controls">
              <input type="password" id="password" name="password" placeholder="Password" class="input-xlarge">
            </div>
          </div>
          <div class="control-group">
            <!-- Button -->
            <div class="controls">
              <button type="submit" class="btn btn-success">Login</button>
              <input type="hidden" name="_token" value="{{ Session::token() }}"/>
            </div>
          </div>
        </fieldset>
      </form>
      @stop
      </div>
    </div>
  </div>
</div>

