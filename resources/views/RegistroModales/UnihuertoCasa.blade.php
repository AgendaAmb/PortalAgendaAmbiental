<div class="modal fade" id="UnihuertoCasa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary" id="modalGemas">
          <h5 class="modal-title mx-auto text-white">UNIHUERTO EN CASA FEBRERO - MAYO 2022</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        {{-- este div muestra un registro completo si ya se hizo el registro --}}
        <div class="container-fluid bg-white"
          v-if="TipoUsuario!='externs'?hasModule17Gemas?modalClick=='17Gemas'?true:false:false:false ">
          <div class="row">
            <div class="col-12">
              <img src="{{asset('storage/imagenes/17Gemas/Banner_RegistroCompleto.png')}}" class="img-fluid mt-4"
                alt="">
            </div>
          </div>
        </div>

        <div class="modal-body bg-white" v-if="!InscritoUnihuertoCasa">
          <form @submit.prevent="uaslpUser()">
            @csrf
            <h2 class="modal-title2" id="exampleModalLabel">Formulario de registro</h2>
            <br>

            <h5 class="modal-title3" id="exampleModalLabel">Datos académicos</h5>
            <div class="form-row">
              <div class="form-group col-md-6 was-validated ">
                <label for="Nombres">Nivel académico</label>
                <select id="NAcademico" class="form-control" v-model="NAcademico" required name="NAcademico">
                  <option disabled value="">Nivel académico</option>
                  <option value="Bachillerato" id="Bachillerato">Bachillerato</option>
                  <option value="Licenciatura" id="Licenciatura">Licenciatura</option>
                  <option value="Maestria" id="Maestria">Maestria</option>
                  <option value="Especialidad" id="Especialidad">Especialidad</option>
                  <option value="Doctorado" id="Doctorado">Doctorado</option>
                  <option value="Posdoctorado" id="Posdoctorado">Posdoctorado</option>
                  <option value="Otro" id="Otro">Otro</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="isFacturaReq">¿Requieres factura?</label>
                <select id="isFacturaReq" class="form-control" v-model="isFacturaReq" required name="isFacturaReq">
                  <option disabled value="">Opción</option>
                  <option value="Si" id="Si">Si</option>
                  <option value="No" id="No">No</option>
                </select>
              </div>
              <div class="form-group col-md-6 was-validated" v-if="NAcademico=='Otro'">
                <label for="Especificar">Especificar</label>
                <input type="text" class="form-control" id="Especificar" v-model="Especificar" required
                  name="Especificar">
              </div>
            </div>
            <div class="form-row " v-if="isFacturaReq=='Si'">
              <h5 class="modal-title3" id="exampleModalLabel">Datos de facturación</h5>
              <div class="form-group  was-validated col-12">
                <label for="Nombres">Nombre Completo o razón social</label>
                <input type="text" class="form-control" id="nombresF" v-model="nombresF" required name="nombresF"
                  style="text-transform: capitalize;">
              </div>
              <div class="form-group  was-validated col-12">
                <label for="Nombres">Domicilio fiscal</label>
                <input type="text" class="form-control" id="DomicilioF" v-model="DomicilioF" required
                  name="DomicilioF" style="text-transform: capitalize;">
              </div>
              <div class="form-group  was-validated col-6">
                <label for="Nombres">RFC</label>
                <input type="text" class="form-control" id="RFC" v-model="RFC" required name="RFC"
                  style="text-transform: capitalize;">
              </div>
              <div class="form-group  was-validated col-6">
                <label for="Nombres">Correo electrónico</label>
                <input type="email" class="form-control" id="emailF" v-model="emailF" required name="emailF">
              </div>
              <div class="form-group  was-validated col-6">
                <label for="Nombres">Teléfono</label>
                <input type="tel" class="form-control" id="telF" v-model="telF" required name="telF">
              </div>
            </div>
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
                <input type="emailR" class="form-control" id="emailR" required name="emailR" readonly v-model="emailR">
              </div>
            </div>
            <div class="form-row was-validated" v-if="TipoUsuario!='externs'?true:false">
              <div class="form-group col-md-6">
                <label for="ClaveU_RPE">clave única/RPE</label>
                <input type="text" name="ClaveU_RPE" class="form-control" id="ClaveU_RPE" readonly v-model="ClaveU_RPE"
                  required>
              </div>
              <div class=" form-group col-md-6" v-if="TipoUsuario!='externs'?true:false">
                <label for="Facultad">Facultad de adscripción</label>
                <input type="text" class="form-control" id="Facultad" required name="Facultad" readonly
                  v-model="Facultad">
              </div>
            </div>

            <div class="form-row row was-validated">
              <div class="col-md-6 mb-3">
                <label for="tel">Teléfono</label>
                <input type="tel" class="form-control" id="Tel" required name="Tel" v-model="tel"
                  @if(Auth::user()->user_type!="externs")

                @else
                readonly
                @endif
                >
              </div>


            </div>

            <hr>
            <h5 class="modal-title3" v-if="modalClick!='Rodada'">Información estadística</h5>
            <div class="form-group row was-validated" v-if="modalClick!='Rodada'">
              <label for="isAsistencia" class="col-sm-7 col-form-label">¿Has asistido a cursos ó talleres
                en
                la Agenda Ambiental?</label>
              <div class="col-5">
                <select id="isAsistencia" class="form-control" v-model="isAsistencia" required name="isAsistencia">
                  <option disabled value="">Opción</option>
                  <option value="Si" id="Si">Si</option>
                  <option value="No" id="No">No</option>
                </select>
              </div>
            </div>
            <div class="form-group row was-validated" v-if="modalClick!='Rodada'?isAsistencia==='Si'?true:false:false">
              <div class="col-md-12">
                <label for="CursosC">¿Cuales?</label>
                <input type="text" class="form-control" id="CursosC" required name="CursosC" v-model="CursosC">
              </div>
            </div>
            <div class="form-group row was-validated">
              <label for="InteresAsistencia" class="col-sm-12 col-form-label">¿Te interesaria seguir
                participando en actividades de la Agenda Ambiental?</label>
              <div class="col-12 col-xl-5">
                <select id="InteresAsistencia" class="form-control" v-model="InteresAsistencia" required
                  name="InteresAsistencia">
                  <option disabled value="">Opción</option>
                  <option value="Si" id="Si">Si</option>
                  <option value="No" id="No">No</option>
                </select>
              </div>
            </div>
            <div class="form-group row " v-if="modalClick!='Rodada'">
              <label for="ComentariosSugerencias" class="col-sm-12 col-form-label">Comentarios o
                suguerencias</label>
              <div class="col-md-12">
                <textarea name="ComentariosSugerencias" id="ComentariosSugerencias" rows="5" class="form-control"
                  v-model="ComentariosSugerencias">
                </textarea>
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
              <button id="submit" type="submit" class="btn btn-primary" style="background-color: #0160AE"
                v-if="!spinnerVisible">Aceptar</button>
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
          <div>Ya te encuentras registrado</div>
        </div>
      </div>
    </div>
  </div>
