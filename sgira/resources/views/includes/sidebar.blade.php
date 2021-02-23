<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <span>
      <a href="/" id="link-logo" class="brand-link icone-img link-logo">
        <span class="fa-stack">
          <img src="{{ asset('img/logo.png') }}" class="img-fluid ml-1" >
          <span class="brand-text font-weight-light">SGIRA</span>
        </span>
      </a>
    </span>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <a href="#">
            <img src="https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg"
              class="img-circle elevation-2 perfil-sidebar">
          </a>
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
        <div class="info align-self-center">
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-power-off"></i>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
      </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('students.index') }}" class="nav-link {{ Route::is('students.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-graduate"></i>
                <p>
                Alunos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('teachers.index') }}" class="nav-link {{ Route::is('teachers.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                <p>
                Professores
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('subjects.index') }}" class="nav-link {{ Route::is('subjects.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-book"></i>
              <p>
                Matérias
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('courses.index') }}" class="nav-link {{ Route::is('courses.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-university"></i>
              <p>
                Cursos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('teams.index') }}" class="nav-link {{ Route::is('teams.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
              <p>
                Turmas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('partners.index') }}" class="nav-link {{ Route::is('partners.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-handshake"></i>
              <p>
                Parceiros
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('teachers.communicate') }}" class="nav-link {{ Route::is('teachers.communicate') ? 'active' : '' }}">
                <i class="nav-icon far fa-envelope"></i>
              <p>
                Comunicado
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('iraGoal.index') }}" class="nav-link {{ Route::is('iraGoal.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tasks"></i>
              <p>
                Planejamento
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('bonifications.index') }}" class="nav-link {{ Route::is('bonifications.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-money-bill-wave"></i>
              <p>
                Bonificações
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('courses.dashboardStudent', Auth::user()->id) }}" class="nav-link {{ Route::is('bonifications.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-money-bill-wave"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
