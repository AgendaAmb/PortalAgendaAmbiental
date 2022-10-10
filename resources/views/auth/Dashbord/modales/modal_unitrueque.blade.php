@verbatim
<b-modal 
  id="modal-unitrueque" 
  size="lg" 
  title="Registro Unirodada"
  scrollable
  centered
  hide-backdrop
  header-bg-variant="light"
  footer-bg-variant="light"
  button-size="sm"
  >
    <template #modal-header="{ close }">
      <h4 style="color:115089"><b>Registro {{selected.name}}</b></h4>
      <b-button size="sm" variant="outline-danger" @click="close()">
        Cerrar
      </b-button>
    </template>

    <template #modal-footer="{ register, spin}">
      <b-button 
        v-if="!spinner && selected.registered == false" 
        type="submit" 
        size="sm" 
        variant="success" 
        @click="registerEventUnirodada()"
        :disabled="valSpinner"
        >
        Registrarme
      </b-button>
      <b-button v-else-if="spinner && selected.registered == false" size="sm" variant="success" disabled>
        <b-spinner small type="grow"></b-spinner>
        Loading...
      </b-button>

    </template>
    
  <div>
    <b-form @submit.stop.prevent>
      <h5 class="modal-title3"><b>Datos de academicos</b></h5>

      <b-form-group :state="emptyName" id="input-group-1" label="Nivel académico:" label-for="input-0">
        <b-form-select v-model="user.academic_degree" class="mb-1" disabled>
          <b-form-select-option :value="null">Por favor selecciona una opción</b-form-select-option>
          <b-form-select-option value="Bachillerato">Bachillerato</b-form-select-option>
          <b-form-select-option value="Licenciatura">Licenciatura</b-form-select-option>
          <b-form-select-option value="Bachillerato">Maestria</b-form-select-option>
          <b-form-select-option value="Licenciatura">Doctorado</b-form-select-option>
          <b-form-select-option value="Bachillerato">Especialidad</b-form-select-option>
          <b-form-select-option value="Licenciatura">Doctorado</b-form-select-option>
          <b-form-select-option value="Licenciatura">Postdoctorado</b-form-select-option>
          <b-form-select-option value="Licenciatura">Otro</b-form-select-option>
        </b-form-select>
        <b-form-invalid-feedback :state="emptyName">
          El nombre contacto no puede estar vacío.
        </b-form-invalid-feedback>
      </b-form-group>

      <hr>

      <h5 class="modal-title3"><b>Datos personales</b></h5>

      <b-form-group :state="emptyName" id="input-group-1" label="Nombre(s):" label-for="input-1">
        <b-form-input
          id="input-1"
          placeholder="Nombre(s)"
          required
          v-model="user.name"
          disabled
        ></b-form-input>
      </b-form-group>

      <b-form-row>

        <b-col>
          <b-form-group :state="emptyName" id="input-group-1" label="Nombre(s):" label-for="input-1">
            <b-form-input
              id="input-1"
              placeholder="Apellido paterno"
              required
              v-model="user.middlename"
              disabled
            ></b-form-input>
          </b-form-group>
        </b-col>

        <b-col>
          <b-form-group :state="emptyName" id="input-group-1" label="Nombre(s):" label-for="input-1">
            <b-form-input
              id="input-1"
              placeholder="Apellido materno"
              required
              v-model="user.surname"
              disabled
            ></b-form-input>
          </b-form-group>
        </b-col>

      </b-form-row>
      
      <b-form-group :state="emptyTel" id="input-group-2" label="Correo electrónico:" label-for="input-2">
        <b-form-input
          id="input-2"
          placeholder="Correo electrónico"
          required
          v-model="user.email"
          disabled
        ></b-form-input>
      </b-form-group>

      <b-form-row v-if="user.user_type != 'externs'">

        <b-col>
          <b-form-group :state="emptyName" id="input-group-1" label="Facultad de adscripción:" label-for="input-1">
            <b-form-input
              id="input-1"
              placeholder="Facultad de adscripción"
              required
              v-model="user.dependency"
              disabled
            ></b-form-input>
          </b-form-group>
        </b-col>

        <b-col>
          <b-form-group :state="emptyName" id="input-group-1" label="Clave única/RPE:" label-for="input-1">
            <b-form-input
              id="input-1"
              placeholder="Clave única/RPE"
              required
              v-model="user.id"
              disabled
            ></b-form-input>
          </b-form-group>
        </b-col>

      </b-form-row>

      <b-form-group :state="emptyTel" id="input-group-2" label="Teléfono" label-for="input-2">
        <b-form-input
          id="input-2"
          placeholder="Teléfono"
          required
          v-model="user.phone_number"
        ></b-form-input>
      </b-form-group>

      <hr>

      <h5 class="modal-title3"><b>Información unitrueque</b></h5>

      <b-form-group :state="emptyTel" id="input-group-2" label="Material(es), artículo(s), sustancia(s) o servicio(s) a intercambiar" label-for="input-2">
        <b-form-input
          id="input-2"
          placeholder="..."
          required
          v-model="user.phone_number"
        ></b-form-input>
      </b-form-group>

      <b-form-row>
        <b-col>
          <b-form-group id="input-group-1" label="¿Lleva mobiliario?:" label-for="input-0">
            <b-form-select v-model="unitrueque_data.isMobiliario" class="mb-3">
              <b-form-select-option :value="null">Por favor selecciona una opción</b-form-select-option>
              <b-form-select-option value="Si">Si</b-form-select-option>
              <b-form-select-option value="No">No</b-form-select-option>
            </b-form-select>
          </b-form-group>
        </b-col>
        <b-col>
          <b-form-group :state="emptyName" id="input-group-1" label="Cantidad aproximada (indicar unidad):" label-for="input-1">
            <b-form-input
              id="input-1"
              placeholder="Numero de unidades"
              required
              v-model="unitrueque_data.unidad"
            ></b-form-input>
          </b-form-group>
        </b-col>
      </b-form-row>

      <b-form-group id="input-group-2" label="Nombre de empresa, tienda, colectivo o asociación que participa en el trueque (en caso de tener)" label-for="input-2">
        <b-form-input
          id="input-2"
          placeholder="..."
          required
          v-model="unitrueque_data.empresa"
        ></b-form-input>
      </b-form-group>

      <hr>

      <b-alert
        class="mt-4"
        :show="dismissCountDown"
        dismissible
        variant="success"
        @dismissed="dismissCountDown=0"
        @dismiss-count-down="countDownChanged"
      >
        ¡Registrado con exito!
      </b-alert>
        
      </b-form-group>
    </b-form>
  </div>
</b-modal>
@endverbatim