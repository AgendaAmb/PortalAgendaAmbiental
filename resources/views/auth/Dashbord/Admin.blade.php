<script>
  const users = @json($users);
  const modulos = @json($Modulos);
</script>

@extends('templates.base')

@section('navbarModulos')
@include('templates.navbar')
@endsection

@section('ContenidoPrincipal')

@verbatim
<template>
  <div class="m-3 d-none d-xl-block">
    <b-tabs pills card vertical>
      <b-tab style="background:white;" title="Usuarios" active>
        <b-container fluid>
          <!-- User Interface controls -->
          <b-row>
            <b-col lg="12" class="py-2 bg-light">
              <download-excel 
                :fetch="fetchData" 
                :fields="excel_export_fields"
                name="UsuariosAgendaAmbiental.xls"
                >
                <b-button style="background: #1D6F42" size="md" class="mb-2">
                  <b-icon icon="download" aria-hidden="true"></b-icon> Exportar a excel
                </b-button>
              </download-excel>
            </b-col>

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
      </b-tab>
      <b-tab style="background:white;" title="Correos">
          <b-row align-v="stretch">
            <b-col cols="3">
              <b-form @submit.prevent="enviarCorreo">
                <b-form-group
                  id="input-group-1"
                  label="Correo remitente"
                  label-for="input-1"
                >
                  <b-form-select id="input-1" v-model="senderEmail" :options="Correos"></b-form-select>
                </b-form-group>
                
                <b-form-group
                  id="input-group-2"
                  label="Destinatario"
                  label-for="input-2"
                >
                  <b-form-select id="input-2" v-model="receiver" :options="receiverList"></b-form-select>
                </b-form-group>

                <b-form-group
                  id="input-group-1"
                  label="CC"
                  label-for="input-1"
                >
                  <b-form-input
                    id="input-1"
                    v-model="emailForm.cc"
                    required
                  ></b-form-input>
                </b-form-group>

                <b-form-group
                  id="input-group-1"
                  label="Asunto"
                  label-for="input-1"
                >
                  <b-form-input
                    id="input-1"
                    v-model="emailForm.subject"
                    placeholder="Agrega el asunto"
                    required
                  ></b-form-input>
                </b-form-group>

                <b-form-group
                  id="input-group-1"
                  label="Contenido"
                  label-for="input-1"
                >
                  <b-form-textarea
                    id="textarea"
                    v-model="emailForm.content"
                    placeholder="Agrega el contenido del mensaje..."
                    rows="6"
                    max-rows="6"
                  ></b-form-textarea>
                </b-form-group>

              </b-form>
            </b-col>
          </b-row>
      </b-tab>
    </b-tabs>
  </div>

  <div class="m-3 d-block d-xl-none">
    <b-tabs pills card>
      <b-tab title="Usuarios">
        <b-container fluid>
          <!-- User Interface controls -->
          <b-row>
            <b-col lg="12" class="py-1 bg-light">
              <download-excel 
                :fetch="fetchData" 
                :fields="excel_export_fields"
                name="UsuariosAgendaAmbiental.xls"
                >
                <b-button style="background: #1D6F42" size="md" class="mb-2">
                  <b-icon icon="download" aria-hidden="true"></b-icon> Exportar a excel
                </b-button>
              </download-excel>
            </b-col>

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
      </b-tab>
      <b-tab title="Correos">
        <h1>Trabajando...</h1>
      </b-tab>
    </b-tabs>
  </div>
</template>
@endverbatim
@endsection

<script src="{{ asset('js/navbar.js') }}" defer></script>
<script src="{{ asset('js/admin.js') }}" defer></script>
