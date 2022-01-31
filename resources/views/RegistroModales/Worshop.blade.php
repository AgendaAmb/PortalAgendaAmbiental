<div class="modal fade" id="RegistraWorshop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary" id="modalComprobante">
          <h5 class="modal-title mx-auto text-white">Registrar actividad</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body bg-white">
          <form @submit.prevent="registrarWorshop" method="post">
            <div class="modal-body bg-white">
              <div class="col-12" v-if="asistenciaExito">
                <div class="alert alert-success text-center" role="alert">
                  ¡¡Enviado con exito!!
                </div>
              </div>
              <div class="form-row was-validated ">
                <div class="form-group col-md-12">
                  <label for="nombreT">Nombre de la actividad</label>
                  <input type="text" class="form-control" id="nombreT" v-model="nombreT" required name="nombreT">
                </div>
                <div class="form-group col-md-12">
                  <label for="DescripcionT">Descripción</label>
                  <input type="text" class="form-control" id="DescripcionT" v-model="DescripcionT" required
                    name="DescripcionT">
                </div>

              </div>

              <div class="form-row ">
                <div class="form-group  was-validated col-6">
                  <label for="TEvento">Tipo de evento</label>
                  <select id="TEvento" class="form-control" v-model="TEvento" required name="TEvento">
                    <option disabled value="">Tipo de evento</option>
                    <option value="Curso" id="Curso">Curso</option>
                    <option value="Taller" id="Taller">Taller</option>
                    <option value="unirodada" id="unirodada">unirodada</option>
                    <option value="Conferencia" id="Conferencia">Conferencia</option>
                  </select>
                </div>
                <div class="form-group  was-validated col-6">
                  <label for="Eje">Eje al que pertenece</label>
                  <select id="Eje" class="form-control" v-model="Eje" required name="Eje">
                    <option disabled value="">Eje</option>
                    @foreach ($Ejes as $Eje)

                    <option value="{{$Eje->id}}" id="{{$Eje->id}}">{{$Eje->name}}
                      @endforeach

                  </select>
                </div>
                <div class="form-group  was-validated col-6">
                  <label for="FechaInicio">Fecha de inicio</label>
                  <input type="datetime-local" id="FechaInicio" class="form-control" v-model="FechaInicio" required>
                </div>
                <div class="form-group  was-validated col-6">
                  <label for="FechaFin">Fecha de fin</label>
                  <input type="datetime-local" id="FechaFin" class="form-control" v-model="FechaFin">
                </div>

              </div>
              <div class="row justify-content-end">
                <div class="col-md-3 col-6 p-0">

                  <button class="btn btn-success" type="submit" value="Submit" v-if="!spinnerVisible">Registrar
                  </button>
                  <button class="btn btn-primary" type="button" disabled v-if="spinnerVisible">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Registrando
                  </button>

                </div>

              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>