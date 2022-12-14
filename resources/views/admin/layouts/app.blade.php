<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Car Parking Booking</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">

      <span class="brand-text font-weight-light">Car Parking Booking</span>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="{{ route('admin#index') }}" class="nav-link">
              <i class="fas fa-user-circle"></i>
              <p>
                Admin Profile
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('user#list') }}" class="nav-link">
                <i class="fa-solid fa-user"></i>
              <p>
                Users
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('services#list') }}" class="nav-link">
                <i class="fa-solid fa-car"></i>
              <p>
                Services
              </p>
            </a>
          </li>

         <li class="nav-item">
            <a href="{{ route('customer#list') }}" class="nav-link">
            <i class="fas fa-users"></i>
              <p>
                Customer
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('booking#list') }}" class="nav-link">
              <i class="fas fa-book"></i>
              <p>
                Booking
              </p>
            </a>
          </li>

          <li class="nav-item">
              {{-- <i class="fas fa-sign-out-alt"></i> --}}
              <p>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <input type="submit" class="btn bg-dark text-white ml-2" value="Logout">
                </form>
              </p>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

 @yield('content')

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script>
</body>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>
