<script>
    const teams = @json($teams);
    const modulos = @json($Modulos);
    // console.log(teams);
</script>

@extends('Bienvenido')

@section('navbarModulos')
<!--SECCION DONDE SE DESPLEGARAN CADA UNO DE LOS MODULOS EN EL QUE EL USUARIO ESTE REGISTRADO PARA PODER REEDIRIGIRLO A SU SITIO CORRESPONDIENTE-->
@include('auth.Dashbord.navbar')
@endsection

@section('ContenidoPrincipal')

@verbatim
<template>
  <b-container class="my-4" fluid>
    <!-- User Interface controls -->
    <b-row>
      <b-col lg="12" class="py-4 bg-light">
        <b-form-group
          label="Filtrar"
          label-for="filter-input"
          label-cols-sm="1"
          label-align-sm="left"
          label-size="sm"
          class="mb-0"
        >
          <b-input-group size="sm">
            <b-form-input
              id="filter-input"
              v-model="filter"
              type="search"
              placeholder="Escribe para buscar"
            ></b-form-input>

            <b-input-group-append>
              <b-button style="background:#115089;" :disabled="!filter" @click="filter = ''">Limpiar</b-button>
            </b-input-group-append>
          </b-input-group>
        </b-form-group>
      </b-col>

      <b-col sm="12" md="12" class="my-3">
        <b-pagination
          v-model="currentPage"
          :total-rows="totalRows"
          :per-page="perPage"
          align="fill"
          size="sm"
          class="my-0"
        ></b-pagination>
      </b-col>
    </b-row>

    <!-- Main table element -->
    <b-table
      responsive
      head-variant="light"	
      bordered
      hover
      :items="items"
      :fields="fields"
      :current-page="currentPage"
      :per-page="perPage"
      :filter="filter"
      :filter-included-fields="filterOn"
      :sort-by.sync="sortBy"
      :sort-desc.sync="sortDesc"
      :sort-direction="sortDirection"
      stacked="md"
      show-empty
      small
      @filtered="onFiltered"
    >
      <template #cell(name)="row">
        {{ row.value }}
      </template>

      <template #cell(actions)="row">
        <b-button style="color: #115089" size="sm" @click="row.toggleDetails">
          {{ row.detailsShowing ? 'Ocultar' : 'Mostrar' }} Información
        </b-button>
        <b-button style="color: #115089" size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1">
          Abrir modal
        </b-button>
      </template>

      <template #cell(team)="row" class="p-0 m-0">
        <table class="table table-sm table-borderless">
          <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Correo</th>
              <th scope="col">Telefono</th>
              <th scope="col">Nivel educativo</th>
              <th scope="col">Institución</th>
            </tr>
          </thead>
          <tbody>
            <tr  v-for="(value, key) in row.value" :key="key">
              <th scope="row">{{ value.name }}</th>
              <td>{{ value.email }}</td>
              <td>{{ value.phone_number }}</td>
              <td>{{ value.nedu }}</td>
              <td>{{ value.institution }}</td>
            </tr>
          </tbody>
        </table>
      </template>

      <template #row-details="row">
        <b-card>
          <ul>
            <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li>
          </ul>
        </b-card>
      </template>
    </b-table>

    <b-row>
        <b-col sm="12" md="12" class="my-1">
            <b-form-group
                label="Per page"
                label-for="per-page-select"
                label-cols-sm="6"
                label-cols-md="4"
                label-cols-lg="3"
                label-align-sm="right"
                label-size="sm"
                class="mb-0"
            >
                <b-form-select
                id="per-page-select"
                v-model="perPage"
                :options="pageOptions"
                size="sm"
                ></b-form-select>
            </b-form-group>
        </b-col>
    </b-row>

    <!-- Info modal -->
    <b-modal :id="infoModal.id" :title="infoModal.title" ok-only @hide="resetInfoModal">
      <pre>{{ infoModal.content }}</pre>
    </b-modal>
  </b-container>
</template>
@endverbatim

@endsection

<script src="{{ asset('js/admin.js') }}" defer></script>