<div style="height: 6vh" id="main-navbar" v-cloak>
  <b-navbar class="bg-white shadow" toggleable="sm" sticky>
    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
    <b-collapse id="nav-collapse" is-nav>
      <b-navbar-nav>
        <b-nav-item href="{{route('panel')}}">Inicio</b-nav-item>
        <b-nav-item href="{{route('Administracion')}}">Administración</b-nav-item>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</div>