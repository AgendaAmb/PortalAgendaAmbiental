<div class="modal fade" id="Registro17gemas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary" id="modalGemas">
          <h5 class="modal-title mx-auto" v-if="modalClick=='17Gemas'">17 gemas para la Uni sostenible</h5>
          <h5 class="modal-title mx-auto" v-if="modalClick=='mmus'">Movilidad urbana sustentable 2021</h5>
          <h5 class="modal-title mx-auto" v-if="modalClick=='Rodada'">Movilidad urbana sustentable 2021</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="container-fluid bg-white"
          v-if="TipoUsuario!='externs'?hasModule17Gemas?modalClick=='17Gemas'?true:false:false:false ">
          <div class="row">
            <div class="col-12">
              <img src="{{asset('storage/imagenes/17Gemas/Banner_RegistroCompleto.png')}}" class="img-fluid mt-4"
                alt="">
            </div>
          </div>
        </div>


        <div class="modal-body"
          v-else-if="TipoUsuario=='externs'?false:modalClick!='Rodada'?true:isRegisterRodada?false:true">
          <form @submit.prevent="uaslpUser()">
            @csrf
          </form>
        </div>
        <div class="modal-body" v-else>
          <img src="{{asset('/storage/imagenes/mmus2021/RegistroCerradoRodada.png')}}" class="img-fluid" alt="">

        </div>

      </div>
    </div>
  </div>