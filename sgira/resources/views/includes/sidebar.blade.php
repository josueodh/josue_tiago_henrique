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
            <a href="{{ route('teachers.index') }}" class="nav-link {{ Route::is('teachers.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                <p>
                Professores
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('subjects.index') }}" class="nav-link {{ Route::is('home') ? 'active' : '' }}">
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
            <a href="/turmas" class="nav-link {{ Route::is('turmas') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
              <p>
                Turmas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/parceiros" class="nav-link {{ Route::is('parceiros') ? 'active' : '' }}">
            <i class="nav-icon fas fa-handshake"></i>
              <p>
                Parceiros
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
