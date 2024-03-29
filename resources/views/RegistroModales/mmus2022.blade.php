<div class="modal fade" id="mmus2022" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary" id="modalGemas">
        <h5 class="modal-title mx-auto text-white">MES DE LA MOVILIDAD URBANA SOSTENIBLE (MMUS 2022)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body bg-white" v-if="!mmus2020_complete">
        <form @submit.prevent="uaslpUser()">
          @csrf
          <h2 class="modal-title2" id="exampleModalLabel">Formulario de registro</h2>
          <br>

          <h5 class="modal-title3" id="exampleModalLabel">Curso(s) al que se desea registrar:</h5>
          <div class="form-group col-12 was-validated">
            <div class="form-check">
              <input v-model="mmus2020_regs['iutt']" class="form-check-input" type="checkbox" id="flexCheckDefault" :disabled="mmus2020_select['iutt']">
              <label style="color: black" class="form-check-label" for="flexCheckDefault">
                Intervención de urbanismo táctico temporal
              </label>
            </div>
            <div class="form-check">
              <input v-model="mmus2020_regs['cccv']" class="form-check-input" type="checkbox" id="flexCheckDefault2" :disabled="mmus2020_select['cccv']">
              <label style="color: black" class="form-check-label" for="flexCheckDefault2">
                Conferencia: "Ciudades de cuidado, cuidado con los vulnerables"
              </label>
            </div>
            <div class="form-check">
              <input v-model="mmus2020_regs['pm']" class="form-check-input" type="checkbox" id="flexCheckDefault3" :disabled="mmus2020_select['pm']">
              <label style="color: black" class="form-check-label" for="flexCheckDefault3">
                PlaceMaking: el arte de hacer lugares
              </label>
            </div>
            <div class="form-check">
              <input v-model="mmus2020_regs['wwc']" class="form-check-input" type="checkbox" id="flexCheckDefault4" :disabled="mmus2020_select['wwc']">
              <label style="color: black" class="form-check-label" for="flexCheckDefault4">
                Documental: “Why we cycle”, Arne Gielen, Gertjan Hulster, Países
              </label>
            </div>
            <div class="form-check">
              <input v-model="mmus2020_regs['fa']" class="form-check-input" type="checkbox" id="flexCheckDefault5" :disabled="mmus2020_select['fa']">
              <label style="color: black" class="form-check-label" for="flexCheckDefault5">
                Fiesta alemana
              </label>
            </div>
            <div class="form-check">
              <input v-model="mmus2020_regs['tb']" class="form-check-input" type="checkbox" id="flexCheckDefault6" :disabled="mmus2020_select['tb']">
              <label style="color: black" class="form-check-label" for="flexCheckDefault6">
                Taller Biciescuelas
              </label>
            </div>
            <div class="form-check">
              <input v-model="mmus2020_regs['pikt']" class="form-check-input" type="checkbox" id="flexCheckDefault7" :disabled="mmus2020_select['pikt']">
              <label style="color: black" class="form-check-label" for="flexCheckDefault7">
                Película infantil Der Konferenz der Tiere (Animales al ataque)
              </label>
            </div>
          </div>
          <hr>
          <h5 class="modal-title3" id="exampleModalLabel">Datos académicos</h5>
          <div class="form-row">
            <div class="form-group col-md-6 was-validated ">
              <label for="Nombres">Nivel académico</label>
              <select id="NAcademico" class="form-control" v-model="NAcademico" required name="NAcademico">
                <option disabled value="">Nivel académico</option>
                <option value="Licenciatura" id="Licenciatura">Licenciatura</option>
                <option value="Maestria" id="Maestria">Maestría</option>
                <option value="Especialidad" id="Especialidad">Especialidad</option>
                <option value="Doctorado" id="Doctorado">Doctorado</option>
                <option value="Posdoctorado" id="Posdoctorado">Posdoctorado</option>
                <option value="Otro" id="Otro">Otro</option>
              </select>
            </div>
            <div class="form-group col-md-6 was-validated" v-if="NAcademico=='Otro'">
              <label for="Especificar">Especificar</label>
              <input type="text" class="form-control" id="Especificar" v-model="Especificar" required name="Especificar">
            </div>
          </div>
          <hr>
          <h5 class="modal-title3" id="exampleModalLabel">Datos personales</h5>
          <div class="form-group  was-validated">

            <label for="Nombres">Nombre(s)</label>
            <input type="text" class="form-control" id="Nombres" v-model="nombres" required name="Nombres" readonly style="text-transform: capitalize;">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6 was-validated">
              <label for="ApellidoP">Apellido paterno</label>
              <input type="text" class="form-control" id="ApellidoP" v-model="ApellidoP" required readonly name="ApellidoP" style="text-transform: capitalize;">
            </div>
            <div class="form-group col-md-6  was-validated">
              <label for="ApellidoM">Apellido materno</label>
              <input type="text" class="form-control" id="ApellidoM" v-model="ApellidoM" required readonly name="ApellidoM" style="text-transform: capitalize;">
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
              <input type="text" name="ClaveU_RPE" class="form-control" id="ClaveU_RPE" readonly v-model="ClaveU_RPE" required>
            </div>
            <div class=" form-group col-md-6" v-if="TipoUsuario!=='externs'?true:false">
              <label for="Facultad">Facultad de adscripción</label>
              <input type="text" class="form-control" id="Facultad" required name="Facultad" v-model="organizacion">
            </div>
          </div>

          <div v-else class="form-row was-validated">
            <div class="form-group col-md-6">
              <label for="Profesion">Profesión</label>
              <input type="text" name="Profesion" class="form-control" id="Profesion" v-model="profesion" required>
            </div>
            <div class=" form-group col-md-6">
              <label for="Organizacion">Organización</label>
              <input type="text" class="form-control" id="Organizacion" required name="Organizacion" v-model="organizacion">
            </div>
          </div>

          <div class="form-row row was-validated">
            <div class="col-md-6 mb-3">
              <label for="tel">Teléfono</label>
              <input type="tel" class="form-control" id="Tel" required name="Tel" v-model="tel" @if(Auth::user()->user_type==="externs")
              @else
              readonly
              @endif
              >
            </div>
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
        <div>Ya se encuentra registrado a todos los eventos de MMUS2022.</div>
      </div>
    </div>
  </div>
</div>