<template>
    <div>
        <h5 class="modal-title3"><b>Datos de los participantes</b></h5>
        <b-form-group id="input-group-2" v-for="index in minirodada_data.kidslength" :key="index">

            <h5 class="modal-title3" id="exampleModalLabel">Participante {{ index }}</h5>

            <div class="form-row">
                <div class="form-group col-10 was-validated">
                    <label for="name">Nombre completo</label>
                    <input type="text" class="form-control" id="name" v-model="minirodada_data.kids[index - 1].name"
                        required name="name">
                </div>
                <div class="form-group col-2 was-validated">
                    <label for="age">Edad</label>
                    <input type="text" class="form-control" id="age" v-model="minirodada_data.kids[index - 1].age" required
                        name="age">
                </div>
            </div>
        </b-form-group>
        <div class="form-group col-12 d-flex">
            <b-button v-if="minirodada_data.kidslength < 3" type="submit" size="sm" variant="success" @click="addKid"
                class="ml-auto">
                Agregar asistente
            </b-button>
        </div>
        <h6 style="color: red;">
            Se te hará llegar por correo electrónico un archivo adjunto, por favor, descarga, completa y entrega el día del
            evento, el formato adjunto, esto es para cada participante que registres. Gracias
        </h6>

    </div>
</template>

<script>
export default {
    name: 'minirodada-section',
    props: ['minirodada_data'],
    methods: {
        addKid: function () {
            if (this.minirodada_data.kidslength < 3) {
                let user_Data = { name: '', age: 0 };
                this.minirodada_data.kids.push(user_Data);
                this.minirodada_data.kidslength += 1;
            }
        }
    },
}
</script>
