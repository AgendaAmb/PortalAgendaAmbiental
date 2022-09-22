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
        <b-button size="sm" @click="row.toggleDetails">
          {{ row.detailsShowing ? 'Ocultar' : 'Mostrar' }} detalles
        </b-button>
      </template>

      <template #cell(workshop)="row">
        {{ row.value.toUpperCase() }}
      </template>

      <template #cell(name)="row">
        {{ row.value }}
      </template>

      <template #cell(curp)="row">
        {{ row.value }}
      </template>

      <template #cell(gender)="row">
        {{ row.value }}
      </template>

      <template #cell(email)="row">
        {{ row.value }}
      </template>

      <template #cell(tel)="row">
        {{ row.value }}
      </template>

      <template #cell(created_at)="row">
        {{ row.value }}
      </template>
      
      <template #row-details="row">
        <b-card>
          <ul>
            <li v-for="(value, key) in row.item.workshopRegDataUser" :key="key">{{ key }}: {{ value }}</li>
          </ul>
        </b-card>
      </template>

    </b-table>

    <!-- Info modal -->
    <b-modal :id="infoModal.id" :title="infoModal.title" ok-only @hide="resetInfoModal">
      <pre>{{ infoModal.content }}</pre>
    </b-modal>

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
  </b-container>
</template>
@endverbatim
@endsection

<script src="{{ asset('js/navbar.js') }}" defer></script>
<script src="{{ asset('js/admin.js') }}" defer></script>
