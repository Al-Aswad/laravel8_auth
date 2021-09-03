
@extends('layouts.auth.auth')

@section('content')
<div class="text-center mb-4">
  
    <a href="."><img src="./static/logo.svg" height="36" alt=""></a>
  </div>
  @if (session()->has('loginError'))
  <div class="alert alert-danger alert-dismissible" role="alert">
    <div class="d-flex">
      <div>
        <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
        <!-- SVG icon code with class="alert-icon" -->
      </div>
      <div>
        <h4 class="alert-title">{{session('loginError')}}&hellip;</h4>
        <div class="text-muted">NIK Karyawan Or Password Wrong</div>
      </div>
    </div>
    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
  </div>
  @endif
  @if (session()->has('success'))
  <div class="alert alert-success alert-dismissible" role="alert">
    <div class="d-flex">
      <div>
        <!-- Download SVG icon from http://tabler-icons.io/i/check -->
        <!-- SVG icon code with class="alert-icon" -->
      </div>
      <div>
        <h4 class="alert-title">Wow! Everything worked!</h4>
        <div class="text-muted">Your account has been saved!</div>
      </div>
    </div>
    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
  </div>
  @endif
  
  <form class="card card-md" action="/login" method="post" autocomplete="off">
    @csrf
    <div class="card-body">
      <h2 class="card-title text-center mb-4">Login to your account</h2>      
      <div class="mb-3">
        <label class="form-label">NIK Karyawan</label>
        <input type="text" name="nik_karyawan" class="form-control @error('nik_karyawan') is-invalid @enderror" placeholder="Enter nik karyawan">
        @error('nik_karyawan')
        <div class="invalid-feedback">{{$message}}</div>          
        @enderror
      </div>
      <div class="mb-2">
        <label class="form-label">
          Password          
        </label>
        <div class="input-group input-group-flat">
          <input type="password" name="password" class="form-control"  placeholder="Password"  autocomplete="off">
         
          <span class="input-group-text">
            <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
            </a>
          </span>
        </div>
        @error('password')
        <h5 class="text-red">{{$message}}</h5>          
        @enderror
      </div>
      <div class="mb-2">
        <label class="form-check">
          <input type="checkbox" name="remember" class="form-check-input"/>
          <span class="form-check-label">Remember me on this device</span>
        </label>
      </div>
      <div class="form-footer">
        <button type="submit" class="btn btn-primary w-100">Sign in</button>
      </div>
    </div>    
  </form>
  <div class="text-center text-muted mt-3">
    Don't have account yet? <a href="/register" tabindex="-1">Sign up</a>
  </div>
</div>
</div>
@endsection
      
      
   