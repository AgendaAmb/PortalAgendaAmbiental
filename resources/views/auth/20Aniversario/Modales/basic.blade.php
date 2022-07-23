<div v-if="activeModal" class="modal fade" id="RegistroGeneral" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar evento: @{{activeModal.name}}</h5>
        <button @click="CerrarModal('RegistroGeneral')" type="button" class="btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @{{activeModal.description}}
      </div>
      <div v-if="Guardado" class="mx-3 alert alert-success" role="alert">
        Te has registrado con exito.
      </div>
      <div v-if="Error" class="mx-3 alert alert-danger" role="alert">
        Error al registrar usuario. Porfavor intente mas tarde.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close"
          @click="CerrarModal('RegistroGeneral')">
          Cancelar
        </button>
        <button id="submit" type="submit" class="btn btn-primary" style="background-color: #0160AE"
          v-if="!spinnerVisible" @click="RegistrarEvento('RegistroGeneral')">Registrarme</button>
        <button class="btn btn-primary" type="button" disabled v-if="spinnerVisible">
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
          Registrando...
        </button>
      </div>
    </div>
  </div>
</div>