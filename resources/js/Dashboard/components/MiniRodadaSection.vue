<template>
    <div>
        <h5 class="modal-title3" id="exampleModalLabel">Datos de los participantes</h5>
        <hr>
        <div>
            <div class="mx-2 px-2 py-2 bg-light" v-for="index in minirodada_data.kidslength" :key="index">

                <h5 class="modal-title3" id="exampleModalLabel">Participante @{{ index }}</h5>

                <div class="form-row">
                    <div class="form-group col-10 was-validated">
                        <label for="email">Nombre completo</label>
                        <input type="text" class="form-control" id="email" v-model="minirodada_data.kids[index - 1].name"
                            required name="email">
                    </div>
                    <div class="form-group col-2 was-validated">
                        <label for="tel">Edad</label>
                        <input type="text" class="form-control" id="tel" v-model="minirodada_data.kids[index - 1].age"
                            required name="tel">
                    </div>
                </div>
            </div>
            <div class="form-group col-12">
                <button v-if="minirodada_data.kidslength < 3" style="background: #0160AE;" type="button"
                    class="btn btn-success btn-sm" @click="addKid()">
                    Agregar asistente
                </button>
            </div>
        </div>
        <hr>
    </div>
</template> 

<script>
export default{
    name: 'minirodada-section',
    props:{
        minirodada_data: Object
    },
    methods:{
        addKid: function(){
            if(minirodada_data.kidslength < 3)
            {
                let user_Data = {name:'',age:0};
                minirodada_data.kids.push(user_Data);
                minirodada_data.kidslength += 1;
            }
        },
    },
}
</script>