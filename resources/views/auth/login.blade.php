@extends('auth.app')
@section('content')
<main class="form-signin">
  <form action="{{ route('login') }}" method="POST">
    @csrf
    <img class="mb-4" src="/demo/girl.jpg" alt="" width="272" height="257" style="margin-top: -20%">
    <h1 class="title">Time and Attendance System</h1>

    <div class="form-floating mt-5 ">
      <input type="text" class="form-control" id="floatingInput" name="username" value="{{ old('username')}}" required>
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" value="{{ old('password')}}" required>
      <label for="floatingPassword">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
    {{-- <p class="mt-5 mb-3 text-muted"><a href="#">Forgot Password</a></p> --}}
  </form>
</main>
@endsection
 