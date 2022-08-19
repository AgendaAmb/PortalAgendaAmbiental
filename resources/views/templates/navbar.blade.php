<div style="height: 6vh" id="main-navbar" v-cloak>
  <b-navbar class="bg-white shadow" toggleable="sm" sticky>
    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

    <b-collapse id="nav-collapse" is-nav>
      <b-navbar-nav>
        <b-nav-item href="{{route('panel')}}">Inicio</b-nav-item>
        <b-nav-item href="{{route('20home')}}">20 Aniversario</b-nav-item>
        @if(Auth::user()->id == '291395' || Auth::user()->id == '11007')
        <b-nav-item href="{{route('20admin')}}">Administración</b-nav-item>
        @endif
      </b-navbar-nav>

      <!-- Right aligned nav items -->
      {{-- <b-navbar-nav class="ml-auto">
        <b-nav-item-dropdown right>
          <!-- Using 'button-content' slot -->
          <template #button-content>
            <em>User</em>
          </template>
          <b-dropdown-item href="#">Profile</b-dropdown-item>
          <b-dropdown-item href="#">Sign Out</b-dropdown-item>
        </b-nav-item-dropdown>
      </b-navbar-nav> --}}
    </b-collapse>
  </b-navbar>
</div>