<script>
  const users = @json($users);
  const modulos = @json($Modulos);

  console.log(users);
</script>

@extends('templates.base')

@section('navbarModulos')
@include('templates.navbar')
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
      <template #cell(actions)="row">
        Niguna
      </template>

      <template #cell(workshop)="row">
        {{ row.value.toUpperCase() }}
      </template>

      <template #cell(user_id)="row" class="p-0 m-0">
        {{ row.value }}
      </template>

      <template #cell(actions)="row">
        Ningúna
      </template>

      <template #cell(envio)="row">
        <p class="h5 mb-2">No enviado <b-icon icon="exclamation-circle-fill"></b-icon></p>
      </template>

      <template #cell(pago)="row">
        <p class="h5 mb-2">No pagado <b-icon icon="exclamation-circle-fill"></b-icon></p>
      </template>

      <template #cell(factura)="row">
        <p class="h5 mb-2">No requerida</p>
      </template>
    </b-table>

    <b-row>
        <b-col sm="12" md="12" class="my-1">
            <b-form-group
                label="Num. resultados"
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

<script src="{{ asset('js/navbar.js') }}" defer></script>
<script src="{{ asset('js/20admin.js') }}" defer></script>
