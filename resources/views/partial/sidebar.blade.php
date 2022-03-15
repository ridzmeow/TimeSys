@include('partial.icons')

<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 300px;">
    {{-- <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
      <span class="fs-4">TimeSys</span>
    </a> --}}
    <img src="/img/logo1.png" alt="" width="90%">
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/home" class="nav-link {{ $page == '' ? 'active' : '' }} link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
          Home
        </a>
      </li>
      <li>
        <a href="/post" class="nav-link {{ $page == 'Post' ? 'active' : '' }} link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
          Data Posting
        </a>
      </li>
      <li>
        <a href="/dtr" class="nav-link {{ $page == 'dtr' ? 'active' : '' }} link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Daily Time Record
        </a>
      </li>
      <li>
        <a href="/correction" class="nav-link {{ $page == 'correction' ? 'active' : '' }} link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Time Correction
        </a>
      </li>
      <li>
        <a href="/leave" class="nav-link {{ $page == 'leave' ? 'active' : '' }} link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Leave
        </a>
      </li>
      <li>
        <a href="/account" class="nav-link {{ $page == 'account' ? 'active' : '' }} link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
          Accounts
        </a>
      </li>
      <li style="padding-left: 15px !important;">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
          Libraries
        </button>
        <div class="collapse" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
            <li><a href="/employees" class="link-dark rounded">Employee</a></li>
            <li><a href="/schedules" class="link-dark rounded">Schedule</a></li>
            <li><a href="/offices" class="link-dark rounded">Office</a></li>
            <li><a href="/roles" class="link-dark rounded">Role</a></li>
          </ul>
        </div>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="/img/user.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>{{Auth::user()->username}}</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
      </ul>
    </div>
  </div>

  <div class="b-example-divider"></div>