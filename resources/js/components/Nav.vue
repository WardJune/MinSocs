<template>
  <div
    class="
      sticky-top
      vh-100
      col-md-3
      px-5
      pt-3
      d-flex
      flex-column
      justify-content-between
    "
  >
    <div class="top">
      <a href="{{ route('home') }}" class="navbar-brand link-light fw-bold"
        >MinSocs</a
      >
      <ul class="nav flex-column fs-5 mt-2 font-weight-light">
        <li class="nav-item">
          <a class="nav-link link-light active" href="{{ route('home') }}"
            ><i class="fas fa-house-damage"></i>
            <span class="menu-text">Home</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link link-light" href="{{ route('notif') }}"
            ><i class="fas fa-bell"></i>
            <span class="menu-text">Notifications</span></a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link link-light" href="{{ route('friends') }}"
            ><i class="fas fa-user-friends"></i>
            <span class="menu-text">Friends</span></a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link link-light" href="{{ route('profile') }}"
            ><i class="fas fa-user"></i>
            <span class="menu-text">Profile</span></a
          >
        </li>
      </ul>

      <div class="d-grid gap-2 mt-2">
        <button type="button" class="btn btn-warning rounded-pill">Post</button>
      </div>
    </div>

    <div class="user d-flex justify-content-between mb-3">
      <div class="name">
        <span class="fw-bold d-block">{{ auth()->user()->name }}</span>
        <span class="text-muted">{{ auth()->user()->email }}</span>
      </div>
      <ul class="navbar-nav">
        <li class="nav-item dropup">
          <a
            class="nav-link link-warning dropdown-toggle"
            href="#"
            id="dropup"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
          </a>

          <form
            id="logout-form"
            action="{{ route('logout') }}"
            method="POST"
            class="d-none"
          >
            @csrf
          </form>

          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropup">
            <li>
              <a
                class="dropdown-item"
                href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
              >
                {{ __("Logout") }}
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>