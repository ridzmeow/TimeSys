@extends('auth.app')
@section('content')
  <main class="form-signin">
    <form action="{{ route('setpassword') }}" method="POST">
      @csrf
      <h3 style="text-align: center">Hi! {{Auth::user()->employee->first_name}}</h3><br><br>
        <h6>Set your password first,</h6>
        <br><br>
        <input type="hidden" name="id" id="id" value="{{Auth::user()->id}}">
      <div class="form-floating mt-5 ">
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingInput" name="password" value="{{ old('password')}}" required>
        <label for="floatingInput">Password</label>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" name="password_confirmation" value="{{ old('password_confirmation')}}" required>
        <label for="floatingPassword">Confirm password</label>
      </div>
  
      <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
      <p class="mt-5 mb-3 text-muted"><a href="#">Forgot Password</a></p>
    </form>
  </main>
@endsection