<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: rgb(0, 109, 137)">
    <a href="home" class="brand-link" style="background-color: rgb(3, 61, 92">
      <img src="{{ asset('backend/dist/img/essava.jpeg')}}" alt="TeyaretCentre Logo" class="brand-image  elevation-4" style="opacity: 1">
      <span class="brand-text font-weight">Clinique Essava</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('backend/dist/img/user3.png') }}" class="img-circle elevation-3" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ implode(', ', Auth::user()->roles_name) }} : {{ Auth::user()->name }}</a>

        </div>
      </div>

      <!-- SidebarSearch Form -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->






          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fas fa-users"></i>
              <p>
                Utilisateurs & Roles

                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ url('/' . ($page = 'users')) }}" class="nav-link">
                    <p>Les Utilisateurs</p>
                </a>
              </li>
              <li class="nav-item">

                <a href="{{ url('/' . ($page = 'roles')) }}" class="nav-link">
                  <p>Les Roles</p>
                </a>
              </li>

           </ul>
          </li>


          <li class="nav-item">

            <a href="#" class="nav-link">
            </i>
            <i class="fas fa-hand-holding-medical"></i>
              <p>
                Gestion des patients
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">

                <a href="{{ url('/' . ($page = 'index-patient')) }}" class="nav-link">

                  <p>Les Patiens</p>
                </a>
              </li>
              <li class="nav-item">

                <a href="{{ url('/' . ($page = 'create-patient')) }}" class="nav-link">

                    <p>Ajouter Patient</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item">
            <a href="#" class="nav-link">
            </i>
            <i class="fas fa-user-md"></i>

              <p>
                Gestion des medecins
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">

                <a href="{{ url('/' . ($page = 'index-medecin')) }}" class="nav-link">


                  <p>Les medecins</p>
                </a>
              </li>
              <li class="nav-item">

                <a href="{{ url('/' . ($page = 'create-medecin')) }}" class="nav-link">

                  <p>Ajouter Medecin</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fas fa-bed"></i>
              <p>
                Gestion des services

                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ url('/' . ($page = 'index-service')) }}" class="nav-link">
                    <p>Les Services</p>
                </a>
              </li>
              <li class="nav-item">

                <a href="{{ url('/' . ($page = 'create-service')) }}" class="nav-link">
                  <p>Ajouter une service</p>
                </a>
            </li>
           </ul>
          </li>



          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fas fa-tooth"></i>
              <p>
                Gestion des Specialistes

                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ url('/' . ($page = 'index-specialiste')) }}" class="nav-link">
                    <p>Les Specialistes</p>
                </a>
              </li>
              <li class="nav-item">

                <a href="{{ url('/' . ($page = 'create-specialiste')) }}" class="nav-link">
                  <p>Ajouter un specialiste</p>
                </a>
            </li>
           </ul>
          </li>



          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fas fa-notes-medical"></i>
              <p>
                Gestion des Consultations
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ url('/' . ($page = 'index-consultation')) }}" class="nav-link">
                    <p>Les Consultations</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('/' . ($page = 'create-consultation')) }}" class="nav-link">
                  <p>Ajouter une consultation</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{ url('/' . ($page = 'stats-consultation')) }}" class="nav-link">
                  <p>Statistiques</p>
                </a>
              </li>

            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fas fa-syringe"></i>
              <p>
                Gestion des Soins
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">




                <li class="nav-item">
                <a href="{{ url('/' . ($page = 'create-soins')) }}" class="nav-link">
                    <p>Creer soins </p>
                </a>
              </li>



              <li class="nav-item">
                <a href="{{ url('/' . ($page = 'index-soins')) }}" class="nav-link">
                    <p>Les Soins </p>
                </a>
              </li>



              <li class="nav-item">
                <a href="{{ url('/' . ($page = 'stats-soins')) }}" class="nav-link">
                    <p>Statistiques </p>
                </a>
              </li>


           </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fas fa-microscope"></i>
              <p>
                Analyses
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item">
                <a href="{{ url('/' . ($page = 'index-analyse')) }}" class="nav-link">
                    <p>Les Analyses</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{ url('/' . ($page = 'create-analyse')) }}" class="nav-link">
                    <p>Ajouter Analyse</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{ url('/' . ($page = 'stats-analyse')) }}" class="nav-link">
                    <p>Statistiques</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">

                <i class="fa-solid fa-vial-virus"></i>
              <p>
                Laboratoires
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ url('/' . ($page = 'examens')) }}" class="nav-link">
                    <p>Examens</p>
                </a>
              </li>
              <li class="nav-item">

                <a href="{{ url('/' . ($page = 'resultats')) }}" class="nav-link">
                  <p>Resultats</p>
                </a>
              </li>

           </ul>
          </li>



          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-procedures"></i>
              <p>
                Interventions
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item">
                <a href="{{ url('/' . ($page = 'index-intervention')) }}" class="nav-link">
                    <p>Les interventions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/' . ($page = 'stats-intervention')) }}" class="nav-link">
                    <p>Statistiques</p>
                </a>
              </li>

            </ul>
          </li>
       <!--   <li class="nav-item">
            <a class="nav-link fas fa-power-off" href="{{ route('logout') }}"


            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
             {{ __('Logout') }}

         </a>


         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
         </form>
          </li>
       -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
