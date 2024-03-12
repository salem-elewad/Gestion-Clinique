<nav class="main-header navbar navbar-dark navbar-expand navbar"  style="background-color: rgb(5, 105, 159);">

    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ URL::to('home') }}" class="nav-link">Acceuil</a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->


      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->


      <li class="nav-item">
        <a class="nav-link fas fa-power-off" href="{{ route('logout') }}"


        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
         {{ __('Deconnexion') }}

     </a>


     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
         @csrf
     </form>
      </li>
    </ul>
  </nav>
