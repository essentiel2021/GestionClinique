<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route("home") }}" class="nav-link {{ setMenuClass('home', 'active') }}">
              <i class="nav-icon fas fa-home"></i>
              <p>Accueil</p>
            </a>
        </li>
        @can('admin')
          <li class="nav-item {{ setMenuClass('admin.gestcomptes.', 'menu-open') }}">
              <a href="#" class="nav-link {{ setMenuClass('admin.gestcomptes.','active')}}">
                <i class="nav-icon fa-solid fa-chalkboard"></i>
                <p>
                  Gestion Comptes
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route("admin.gestcomptes.users.index") }}" class="nav-link {{ setMenuActive("admin.gestcomptes.users.index") }}">
                    {{-- <i class=" nav-icon fas fa-users-cog"></i> --}} <i class="nav-icon fa-solid fa-chalkboard"></i>
                    <p>Comptes</p>
                  </a>
                </li>
              </ul>
          </li>
        </li>
        @endcan

        @can('docteur')
          <li class="nav-item {{ setMenuClass('docteur.gestcliniques.','menu-open')}}">
            <a href="" class="nav-link {{ setMenuClass('docteur.gestcliniques.','active')}}">
              <i class="nav-icon fa-solid fa-hospital"></i>
              <p>
                Gestion Cliniques
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route("docteur.gestcliniques.clinique.index") }}" class="nav-link {{ setMenuClass("docteur.gestcliniques.","active") }}">
                  <i class="fa-solid fa-hospital"></i>
                  <p>Cliniques</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link {{ setMenuClass("assistant.gestsuccursales.departements","active") }}">
                  {{-- <i class="nav-icon fa-solid fa-hospital-user"></i> --}}
                  <i class="fa-solid fa-briefcase-medical"></i>
                  <p>Assurances</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link {{ setMenuClass("assistant.gestsuccursales.service","active") }}">
                  <i class="fa-solid fa-user-doctor"></i>
                  <p>Medecins</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link {{ setMenuClass("assistant.gestsuccursales.service","active") }}">
                  <i class="fa-solid fa-user-plus"></i>
                  <p>Patients</p>
                </a>
              </li>
            </ul>
          </li>
        @endcan
      {{-- <li class="nav-item {{ setMenuClass('assistant.gestemployes.','menu-open')}}">
        <a href="#" class="nav-link {{ setMenuClass('assistant.gestemployes.','active')}}">
          <i class="nav-icon fa-solid fa-users"></i>
          <p>
            Gestion Employes
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="" class="nav-link {{ setMenuClass("assistant.gestemployes.employe.index","active") }}">
            <i class="fa-solid fa-users"></i>
              <p>Employes</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link {{ setMenuClass("assistant.gestemployes.employe.black","active") }}">
              <i class="fa-solid fa-user-xmark"></i>
              <p>Black List</p>
            </a>
          </li>
        </ul>
      </li> --}}
      {{-- <li class="nav-item {{ setMenuClass('assistant.gestfonctions.','menu-open')}}">
        <a href="#" class="nav-link {{ setMenuClass('assistant.gestfonctions.','active')}}">
          <i class="nav-icon fa-solid fa-user-gear"></i>
          <p>
            Gestion Fonction
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="" class="nav-link {{ setMenuClass("assistant.gestfonctions.fonctions","active") }}">
            <i class="nav-icon fa-solid fa-user-gear"></i>
              <p>Fonctions</p>
            </a>
          </li>
        </ul>
      </li> --}}
      {{-- <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Gestion Contrat 
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>Contrat</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-swatchbook"></i>
              <p>Types contrats</p>
            </a>
          </li>
        </ul>
      </li> --}}
    </ul>
</nav>