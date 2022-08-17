@verbatim
<b-modal 
  :keyboard=false
  id="modal-register" 
  title="REGISTRO DE DATOS"
  size="lg" 
  scrollable
  centered
  hide-backdrop
  header-bg-variant="light"
  footer-bg-variant="light"
  button-size="sm"
  >
  <template #modal-header="{ close }">
    <h5>Alumnos egresados </h5>
  </template>

  <template #modal-footer="{ register, spin}">
    <b-button 
      type="submit" 
      size="sm" 
      variant="success" 
      @click="registerEgresados()"
      v-if="!spinner"
      >
      Guardar
    </b-button>
    <b-button v-else-if="spinner" size="sm" variant="success" disabled>
      <b-spinner small type="grow"></b-spinner>
      Loading...
    </b-button>
  </template>
    
  <div>
    <b-form @submit.stop.prevent>
      <b-form-group id="input-group-1" label="Nombre(s):" label-for="input-1">
        <b-form-input
          id="input-1"
          placeholder="Nombre"
          disabled
          v-model="user.name"
        ></b-form-input>
      </b-form-group>

      <b-form-row>
        <b-col>
          <b-form-group id="input-group-1" label="Apellido paterno" label-for="input-1">
            <b-form-input
              id="input-1"
              placeholder="Nombre"
              v-model="user.middlename"
              disabled
            ></b-form-input>
          </b-form-group>
        </b-col>

        <b-col>
          <b-form-group id="input-group-1" label="Apellido materno" label-for="input-1">
            <b-form-input
              id="input-1"
              placeholder="Nombre"
              disabled
              v-model="user.surname"
            ></b-form-input>
          </b-form-group>
        </b-col>
        <b-col cols="2">
          <b-form-group id="input-group-4" label="Género" label-for="input-4">
            <b-form-select 
              id="input-4" 
              v-model="user.gender"
              disabled
              :options="[{ text: 'Elige una opción', value: null },{ text: 'M', value: 'Masculino'}, { text: 'F', value: 'Femenino' }]" 
            ></b-form-select>
          </b-form-group>
        </b-col>
      </b-form-row>

      <b-form-row>
        <b-col>
          <b-form-group id="input-group-2" label="Email" label-for="input-2">
            <b-form-input
              id="input-2"
              placeholder="Correo electronico"
              v-model="user.email"
              disabled
            ></b-form-input>
          </b-form-group>
        </b-col>

        <b-col>
          <b-form-group id="input-group-1" label="Teléfono" label-for="input-1">
            <b-form-input
              id="input-1"
              placeholder="Numero de teléfono"
              v-model="user.phone_number"
              disabled
            ></b-form-input>
          </b-form-group>
        </b-col>
      </b-form-row>

      <h5 class="modal-title3">Información de Egresado</h5>

      <b-form-row>
        <b-col cols="10" >
          <b-form-group id="input-group-1" label="Programa de Posgrado" label-for="input-1">
            <b-form-select 
              id="input-4" 
              v-model="egresado_form.posgrado"
              :options="[{ text: 'Elige una opción', value: null },
                         { text: 'Doctorado en Ciencias Ambientales', value: 'Doctorado en Ciencias Ambientales'}, 
                         { text: 'Maestría en Ciencias Ambientales (Modalidad Nacional)', value: 'Maestría en Ciencias Ambientales (Modalidad Nacional)' },
                         { text: 'Maestría en Ciencias Ambientales (Modalidad Internacional)', value: 'Maestría en Ciencias Ambientales (Modalidad Internacional)' }]" 
            ></b-form-select>
          </b-form-group>
        </b-col>
        <b-col cols="2">
          <b-form-group id="input-group-40" label="Generación" label-for="input-40">
            <b-form-input
              id="input-40"
              v-model="egresado_form.gen"
              placeholder="Ej. 2022-02"
            ></b-form-input>
          </b-form-group>
        </b-col>

        <b-col lg="6" md="6" sm="12" cols="12" >
          <b-form-group id="input-group-1" label="Ocupación" label-for="input-1">
            <b-form-input
              id="input-1"
              placeholder="Ocupación"
              v-model="egresado_form.ocupacion"
            ></b-form-input>
          </b-form-group>
        </b-col>

        <b-col lg="6" md="6" sm="12" cols="12" >
          <b-form-group id="input-group-4" label="Sector" label-for="input-4">
            <b-form-select 
              id="input-4" 
              v-model="egresado_form.sector"
              :options="[{ text: 'Elige una opción', value: null },
                          { text: 'Agricultura, cría y explotación de animales, aprovechamiento forestal, pesca y caza', value: '1'}, 
                          { text: 'Minería', value: '2'}, 
                          { text: 'Generación, transmisión, distribución y comercialización de energía eléctrica, suministro de agua y de gas natural por ductos al consumidor final', value: '3'}, 
                          { text: 'Construcción', value: '4'}, 
                          { text: 'Industrias manufactureras', value: '5'}, 
                          { text: 'Comercio al por mayor', value: '6'}, 
                          { text: 'Comercio al por menor', value: '7'}, 
                          { text: 'Transportes, correos y almacenamiento', value: '8'}, 
                          { text: 'Información en medios masivos', value: '9'}, 
                          { text: 'Servicios financieros y de seguros', value: '10'}, 
                          { text: 'Servicios inmobiliarios y de alquiler de bienes muebles e intangibles', value: '11'}, 
                          { text: 'Servicios profesionales, científicos y técnicos', value: '12'}, 
                          { text: 'Corporativos', value: '13'},
                          { text: 'Servicios de apoyo a los negocios y manejo de residuos, y servicios de remediación', value: '14'},
                          { text: 'Servicios educativos', value: '15'},
                          { text: 'Servicios de salud y de asistencia social', value: '16'},
                          { text: 'Servicios de esparcimiento culturales y deportivos, y otros servicios recreativos', value: '17'},
                          { text: 'Servicios de alojamiento temporal y de preparación de alimentos y bebidas', value: '18'}, 
                          { text: 'Actividades legislativas, gubernamentales, de impartición de justicia y de organismos internacionales y extraterritoriales', value: '20'},
                          { text: 'Otros servicios excepto actividades gubernamentales', value: '19'}]" 
            ></b-form-select>
          </b-form-group>
        </b-col>
      </b-form-row>

      <b-form-row>
        <b-col cols="12">
          <b-form-group id="input-group-12" label="Nombre de empleador" label-for="input-12">
            <b-form-input
              id="input-12"
              placeholder="Nombre"
              v-model="egresado_form.nombre_empleador"
            ></b-form-input>
          </b-form-group>
        </b-col>
        <b-col>
          <b-form-group id="input-group-13" label="Teléfono de empleador" label-for="input-13">
            <b-form-input
              id="input-13"
              placeholder="Teléfono"
              v-model="egresado_form.tel_empleador"
            ></b-form-input>
          </b-form-group>
        </b-col>
        <b-col>
          <b-form-group id="input-group-13" label="Correo electrónico de empleador" label-for="input-13">
            <b-form-input
              id="input-13"
              placeholder="Email"
              v-model="egresado_form.email_empleador"
            ></b-form-input>
          </b-form-group>
        </b-col>
      </b-form-row>

      <b-form-row>
        <b-col cols="12">
            <b-form-group id="input-group-14" label="Comentario generales del posgrado" label-for="input-14">
              <b-form-textarea
                v-model="egresado_form.comentarios"
                id="input-14"
                placeholder="..."
                rows="5"
                max-rows="5"
              ></b-form-textarea>
            </b-form-group>
        </b-col>
      </b-form-row>
    </b-form>
  </div>
</b-modal>
@endverbatim