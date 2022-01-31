<div class="modal fade" id="RegistroComprobanteP" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary" id="modalComprobante">
          <h5 class="modal-title mx-auto text-white">Comprobante de pago Unibici</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body bg-white">
          <form @submit.prevent="MandarPagoUnirodada" method="post">
            <div class="modal-body bg-white">
              <div class="col-12" v-if="asistenciaExito">
                <div class="alert alert-success text-center" role="alert">
                  ¡¡Enviado con exito!!
                </div>
              </div>
              <div class="form-row ">
                <div class="form-group col-md-4">
                  <label for="isFacturaReq">¿Requieres factura?</label>
                  <select id="isFacturaReq" class="form-control" v-model="isFacturaReq" required name="isFacturaReq">
                    <option disabled value="">Opción</option>
                    <option value="Si" id="Si">Si</option>
                    <option value="No" id="No">No</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="pdfUniPago">Comprobante de pago</label>
                  <input type="file" name="pdfUniPago" id="pdfUniPago" accept=".png, .jpg, .jpeg,.pdf" required
                    @change="cargarPdf($event,'pdfUniPago')">
                </div>
              </div>
              <h5 class="modal-title3 font-weight-bold text-black" id="exampleModalLabel" v-if="isFacturaReq=='Si'">
                Datos de facturación</h5>
              <div class="form-row " v-if="isFacturaReq=='Si'">
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
              <div class="row justify-content-end">
                <div class="col-md-3 col-6 p-0">

                  <button class="btn btn-success" type="submit" value="Submit" v-if="!spinnerVisible">Enviar
                    comprobante</button>
                  <button class="btn btn-primary" type="button" disabled v-if="spinnerVisible">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Enviando
                  </button>

                </div>

              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>