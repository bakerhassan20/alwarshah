@extends('layouts.master2')

@section('title')
login
@stop


@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('assets/css/login.css')}}" rel="stylesheet">
@endsection
@section('content')
 <div class="wave-login"></div>
      <div class="wave2-login"></div>
      <div class="wave3-login"></div>
      <div class="container-login"dir="ltr">
        <div class="img"></div>
      <div class="login-content">
        <form action="{{ route('login') }}"method="POST" >
          @csrf
          <h2 class="title-login">Welcome To</h2>
          <h1>Elwarsha</h1>
          <div class="input-div one">
            <div class="i">
              <i class="fas fa-phone"></i>
            </div>
            <div class="div">
              <label>phone</label>
              <input type="number"  autocomplete="false" readonly onfocus="this.removeAttribute('readonly');" class="input @error('phone') is-invalid @enderror" name="phone"value="{{ old('phone') }}" required />
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
              <input type="password" autocomplete="false" readonly onfocus="this.removeAttribute('readonly');" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"/>
            </div>
          </div><br>
          <div class="check">
            <input type="checkbox" id="rem" name="remember" value="Boat" required {{ old('remember') ? 'checked' : '' }}/>
            <label for="rem"> remember me</label>
          </div>
          <input type="submit" name="submit" class="btn" value="Login" />
          <div class="flex">
            <p>Don't have an acount?</p>
            <a href="{{ route('register') }}">Sign Up</a>
          </div>
        </form>
      </div>
    </div>


@endsection
@section('js')
<script src="{{URL::asset('assets/js/login.js')}}"></script>
@endsection


