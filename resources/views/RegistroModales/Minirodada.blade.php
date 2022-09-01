<div class="modal fade" id="minirodada" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="d-flex justify-content-center modal-header bg-primary" id="minirodada">
          <h5 class="modal-title text-white">Registro MiniRodada</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

      <div class="modal-body bg-white" v-if="!InscritoKids">
        <form @submit.prevent="registerKids()">
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

          <h5 class="modal-title3" id="exampleModalLabel">Datos de los participantes</h5>
          <hr>

          {{-- <div class="alert alert-info" role="alert">
            Es necesario que solo un miembro del equipo registre la informacion del equipo y de sus miembros.
          </div> --}}

          <div class="mx-2 px-2 py-2 bg-light" v-for="index in kidslength" :key="index">

            <h5 class="modal-title3" id="exampleModalLabel">Participante @{{index}}</h5>
   
            <div class="form-row">
              <div class="form-group col-10 was-validated">
                <label for="email">Nombre completo</label>
                <input type="text" class="form-control" id="email" v-model="kids[index-1].name" required 
                  name="email">
              </div>
              <div class="form-group col-2 was-validated">
                <label for="tel">Edad</label>
                <input type="text" class="form-control" id="tel" v-model="kids[index-1].age" required
                  name="tel">
              </div>
            </div>

          </div>

          <div class="form-group col-12">
            <button v-if="kidslength < 3"
              style="background: #0160AE;" 
              type="button" 
              class="btn btn-success btn-sm"
              @click="addKid()"
              >
                Agregar asistente
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
      <div class="modal-body d-flex justify-content-center bg-white" v-else>
          <p>¡Registro completo!, porfavor descarga y entrega una copia del formato presente por cada participante registrado al momento de estar presentes en el evento. Gracias!.</p>
          <hr>
          <button @click="downloadMinirodada" class="btn btn-primarys" style="background-color: #0160AE; color: white">Descargar formato</button>
      </div>
    </div>
  </div>
</div>