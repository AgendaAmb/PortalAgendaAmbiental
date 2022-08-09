<div style="height: 6vh" id="main-navbar">
  {{-- <b-navbar class="bg-white shadow" toggleable="lg">
    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

    <b-collapse id="nav-collapse" is-nav>
      <b-navbar-nav>
        <b-nav-item class="text-dark" href="{{route('panel')}}">Inicio</b-nav-item>
      </b-navbar-nav>

      <!-- Right aligned nav items -->
      <b-navbar-nav class="ml-auto">
        <b-nav-item-dropdown right>
          <!-- Using 'button-content' slot -->
          <template #button-content>
            <em>User</em>
          </template>
          <b-dropdown-item href="#">Profile</b-dropdown-item>
          <b-dropdown-item href="#">Sign Out</b-dropdown-item>
        </b-nav-item-dropdown>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar> --}}
  <b-nav align="center" tabs>
    <b-nav-item href="{{route('panel')}}">Inicio</b-nav-item>
    <b-nav-item active>20 Aniversario</b-nav-item>
  </b-nav>
</div>