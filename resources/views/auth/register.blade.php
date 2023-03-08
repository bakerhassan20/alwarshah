@extends('layouts.master2')
@section('title')
register
@stop

@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('assets/css/register.css')}}" rel="stylesheet">
@endsection
@section('content')

 <div class="wave-signup"></div>
    <div class="wave1-signup"></div>
    <div class="wave2-signup"></div>
    <div class="wave3-signup"></div>
    <div class="container-signup" dir="ltr">
      <div class="img"></div>
      <div class="signup-content">
        <form method="POST" action="{{ route('register') }}">
          @csrf
          <h2 class="title-signup">Welcome</h2>
          <p>let's get you started!</p>
          <div class="input-div one">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="div">
              <label>Username</label>
              <input type="text" class="input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
            @error('name')
                <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
              </span>
               @enderror
            </div>
          </div>
          <div class="input-div one">
            <div class="i">
              <i class="fas fa-phone"></i>
            </div>
            <div class="div">
              <label>phone</label>
              <input type="phone" class="input @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone"/>
               @error('phone')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="input-div pass">
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>
            <div class="div">
              <label>Password</label>
              <input type="password" class="input @error('password') is-invalid @enderror" required="" name="password" required autocomplete="new-password" />
                @error('password')
                   <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
               </span>
         @enderror
            </div>
          </div>
          <div class="input-div pass">
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>
            <div class="div">
              <label>Confirm Password</label>
              <input type="password" class="input" required="" id="password-confirm" name="password_confirmation" required autocomplete="new-password"/>
            </div>
          </div>
          <input type="submit" class="btn" value="Sign up" />
           <div class="flex">
            <p>Do you have acount?</p>
            <a href="{{ route('login') }}">Sign In</a>
          </div>
        </form>
      </div>
    </div>

@endsection
@section('js')

@endsection

