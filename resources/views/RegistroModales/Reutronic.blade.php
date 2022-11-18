<div class="modal fade" id="reutronic" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary" id="modalGemas">
        <h5 class="modal-title mx-auto text-white">REGISTRO REUTRONIC</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-white" v-if="!inscritoReutronic">
        <form @submit.prevent="uaslpUser()">
          @csrf
          <h2 class="modal-title2" id="exampleModalLabel">Formulario de registro</h2>
          <br>
          <h5 class="modal-title3" id="exampleModalLabel">Datos personales</h5>
          <div class="form-group  was-validated">
            <label for="Nombres">Nombre(s)</label>
            <input type="text" class="form-control" id="Nombres" v-model="nombres" required name="Nombres" readonly
              style="text-transform: capitalize;">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6 was-validated">
              <label for="ApellidoP">Apellido paterno</label>
              <input type="text" class="form-control" id="ApellidoP" v-model="ApellidoP" required readonly
                name="ApellidoP" style="text-transform: capitalize;">
            </div>
            <div class="form-group col-md-6  was-validated">
              <label for="ApellidoM">Apellido materno</label>
              <input type="text" class="form-control" id="ApellidoM" v-model="ApellidoM" required readonly
                name="ApellidoM" style="text-transform: capitalize;">
            </div>
          </div>

          <div class="form-group row was-validated">
            <label for="emailR" class="col-sm-3 col-form-label">Correo electrónico</label>
            <div class="col-9">
              <input type="email" class="form-control" id="emailR" required name="emailR" readonly v-model="emailR">
            </div>
          </div>

          <div v-if="TipoUsuario!=='externs'?true:false" class="form-row was-validated">
            <div class="form-group col-md-6">
              <label for="ClaveU_RPE">Clave única/RPE</label>
              <input type="text" name="ClaveU_RPE" class="form-control" id="ClaveU_RPE" readonly v-model="ClaveU_RPE"
                required>
            </div>
            <div class=" form-group col-md-6" v-if="TipoUsuario!=='externs'?true:false">
              <label for="Facultad">Facultad de adscripción</label>
              <input type="text" class="form-control" id="Facultad" required name="Facultad"
                v-model="organizacion">
            </div>
          </div>

          <hr>

          <h5 class="modal-title3" id="exampleModalLabel">Información Reutronic</h5>
          <div class="form-group row was-validated">
            <label for="prev_solicitud" class="col-6 col-form-label">
              ¿Has solicitado material Reutronic previamente?
            </label>
            <div class="col-6">
              <select id="prev_solicitud" class="form-control" v-model="prev_solicitud" required name="prev_solicitud">
                <option disabled value="">Selecciona una opción</option>
                <option value="Si" id="Si">Si</option>
                <option value="No" id="No">No</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="textarea1">Material electrónico y/o mecánico que requiere</label>
            <textarea 
              style="resize: none;" 
              maxlength="400" 
              class="form-control" 
              id="Textarea1" 
              rows="4" 
              v-model="materialReutronic"
              ></textarea>
          </div>

          <div class="form-group">
            <label for="Textarea2">Características y observaciones del material que requiere</label>
            <textarea 
              style="resize: none;" 
              maxlength="400" 
              class="form-control" 
              id="Textarea2" 
              rows="4" 
              v-model="observacionesReutronic"
              ></textarea>
          </div>

          <div class="form-group">
            <label for="Textarea3">Para que uso ocupa el material</label>
            <textarea 
              style="resize: none;" 
              maxlength="400" 
              class="form-control" 
              id="Textarea3" 
              rows="4" 
              v-model="razonReutronic"
              ></textarea>
          </div>
          
          <hr>
          
          <h5 class="modal-title3" v-if="modalClick!='Rodada'">Información estadística</h5>
          <div class="form-group row was-validated">
            <label for="isAsistencia" class="col-sm-7 col-form-label">¿Has asistido a cursos ó talleres
              en la Agenda Ambiental?</label>
            <div class="col-5">
              <select id="isAsistencia" class="form-control" v-model="isAsistencia" required name="isAsistencia">
                <option disabled value="">Opción</option>
                <option value="Si" id="Si">Si</option>
                <option value="No" id="No">No</option>
              </select>
            </div>
          </div>
          <div class="form-group row was-validated" v-if="isAsistencia==='Si'?true:false">
            <div class="col-md-12">
              <label for="CursosC">¿Cuáles?</label>
              <input type="text" class="form-control" id="CursosC" required name="CursosC" v-model="CursosC">
            </div>
          </div>
          <div class="form-group row was-validated">
            <label for="InteresAsistencia" class="col-sm-12 col-form-label">¿Te interesaría seguir
              participando en actividades de la Agenda Ambiental?</label>
            <div class="col-12 col-xl-5">
              <select id="InteresAsistencia" class="form-control" v-model="InteresAsistencia" required name="InteresAsistencia">
                <option disabled value="">Opción</option>
                <option value="Si" id="Si">Si</option>
                <option value="No" id="No">No</option>
              </select>
            </div>
          </div>

          <div class="form-group ">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="gridCheck" required>
              <label class="form-check-label" for="gridCheck">
                Al enviar la información confirmo que he leído y acepto el
                <a href="http://transparencia.uaslp.mx/avisodeprivacidad"> aviso de privacidad.</a>
              </label>
            </div>
          </div>

          <div class="modal-footer justify-content-start">
            <button id="submit" type="submit" class="btn btn-primary" style="background-color: #0160AE" v-if="!spinnerVisible">Aceptar</button>
            <button class="btn btn-primary" type="button" disabled v-if="spinnerVisible">
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              Registrando...
            </button>
            <div class="alert alert-success" role="alert" v-if="Guardado">
              ¡¡Te has registrado con exito!!
            </div>
          </div>

        </form>
      </div>
      <div class="modal-body d-flex justify-content-center bg-white" v-else>
          <div>Ya se encuentra registrado, por favor, espere indicaciones por correo electrónico.</div>
      </div>
    </div>
  </div>
</div>