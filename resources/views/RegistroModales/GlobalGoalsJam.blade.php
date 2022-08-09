<div class="modal fade" id="GlobalGoalsJam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary" id="modalGemas">
        <h5 class="modal-title mx-auto text-white">Global Goals Jam</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body bg-white" v-if="!InscritoGGJ">
        <form @submit.prevent="registerGgj()">
          @csrf
          <h2 class="modal-title2" id="exampleModalLabel">Formulario de registro</h2>
          <br>
          <div class="alert alert-info" role="alert">
            Es necesario que solo un miembro del equipo registre la informacion del equipo y de sus miembros.
          </div>

          <h5 class="modal-title3" id="exampleModalLabel">Participantes</h5>
          <hr>

          <div class="mx-2 px-2 py-2 bg-light" v-for="index in teamlength" :key="index">

            <h5 class="modal-title3" id="exampleModalLabel">Integrante @{{index}}</h5>
            <div class="form-group  was-validated">
              <label for="Nombres">Nombre completo</label>
              <input type="text" class="form-control" id="Nombres" v-model="team[index-1].name" required name="Nombres">
            </div>
            
            <div class="form-row">
              <div class="form-group col-md-6 was-validated">
                <label for="email">Correo electronico</label>
                <input type="text" class="form-control" id="email" v-model="team[index-1].email" required 
                  name="email">
              </div>
              <div class="form-group col-md-6  was-validated">
                <label for="tel">Teléfono de contacto</label>
                <input type="text" class="form-control" id="tel" v-model="team[index-1].tel" required
                  name="tel">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6 was-validated">
                <label for="institucion">Institución de procedencia</label>
                <input type="text" class="form-control" id="institucion" v-model="team[index-1].inst" required name="institucion">
              </div>
              <div class="form-group col-md-6 was-validated">
                <label for="nedu">Nivel educativo</label>
                <select class="form-control" id="nedu" v-model="team[index-1].nedu">
                  <option>Nivel superior</option>
                  <option>Nivel medio superior</option>
                </select>
              </div>
            </div>

            {{-- <div class="form-row justify-content-end">
              <button v-if="teamlength < 5 && teamlength > 1"
                style="color: black"
                type="button" 
                class="btn-sm"
                @click="deleteTeamMember(index-1)"
                >
                  Eliminar miembro
              </button>
            </div> --}}

          </div>

          <div class="form-group col-12">
            <button v-if="teamlength < 5"
              style="background: #0160AE;" 
              type="button" 
              class="btn btn-success btn-sm"
              @click="addTeamMember()"
              >
                Agregar miembro
            </button>
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
      <div class="modal-body bg-white" v-else>
        <div>Ya se encuentra registrado, por favor, espere indicaciones por correo electrónico.</div>
      </div>
    </div>
  </div>
</div>