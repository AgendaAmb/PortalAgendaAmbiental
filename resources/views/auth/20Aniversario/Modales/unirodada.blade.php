@verbatim
<b-modal 
  id="modal-unirodada" 
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
      <h5>Registro {{selected.name}}</h5>
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
      <h5 class="modal-title3">Contacto de emergencia</h5>

      <b-form-group :state="emptyName" id="input-group-1" label="Nombre del contacto:" label-for="input-1">
        <b-form-input
          id="input-1"
          placeholder="Nombre"
          required
          v-model="contact_name"
        ></b-form-input>
        <b-form-invalid-feedback :state="emptyName">
          El nombre contacto no puede estar vacío.
        </b-form-invalid-feedback>
      </b-form-group>
      
      <b-form-group :state="emptyTel" id="input-group-2" label="Teléfono de contacto:" label-for="input-2">
        <b-form-input
          id="input-2"
          placeholder="Teléfono"
          required
          v-model="contact_tel"
        ></b-form-input>
        <b-form-invalid-feedback :state="emptyTel">
          El telefono de contacto no puede estar vacío.
        </b-form-invalid-feedback>
      </b-form-group>

      <b-form-group id="input-group-3" label="Grupo ciclista" label-for="input-3">
        <b-form-input
          v-model="group"
          id="input-3"
          placeholder="Grupo"
          required
        ></b-form-input>
      </b-form-group>

      <b-form-group :state="emptyHC" id="input-group-4" label="Condicion de salud" label-for="input-4">
        <b-form-select 
          id="input-4" 
          v-model="health_condition"
          :options="[{ text: 'Elige una opción', value: null },{ text: 'Excelente', value: 'excellent'}, { text: 'Buena', value: 'good' },{ text: 'Mala', value: 'bad'}]" 
        ></b-form-select>
        <b-form-invalid-feedback :state="emptyHC">
          El telefono de contacto no puede estar vacío.
        </b-form-invalid-feedback>
      </b-form-group>

      <h5 class="modal-title3">Información adicional</h5>

      <b-form-group 
          id="input-group-4" 
          label="¿Te interesaria seguir participando en actividades de la Agenda Ambiental?" label-for="input-4"
          description="Recibiras futura información sobre nuevos eventos y talleres de la Agenda Ambiental"
          :state="emptyInterested"
          >
        <b-form-select 
          id="input-4" 
          v-model="interested"
          :options="[{ text: 'Elige una opción', value: null },{ text: 'Si', value: 'yes'}, { text: 'No', value: 'no' }]" 
        ></b-form-select>
        <b-form-invalid-feedback :state="emptyInterested">
          Porfavor selecciona una opción.
        </b-form-invalid-feedback>
      </b-form-group>

      <b-form-group 
        class="mt-4" 
        id="input-group-5" 
        label-for="checkbox-1"
        :state="emptyConfirm"
        >
        <b-form-checkbox
          id="checkbox-1"
          name="checkbox-1"
          :value=true
          :unchecked-value=false
          v-model="confirm"
        >
          Al enviar la información confirmo que he leído y acepto el <a href="http://transparencia.uaslp.mx/avisodeprivacidad"> aviso de privacidad.
        </b-form-checkbox>
        <b-form-invalid-feedback :state="emptyConfirm">
          Porfavor acepta los terminos y condiciónes.
        </b-form-invalid-feedback>

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