<template>
  
  <div class="container d-flex justify-content-center align-items-center h_100">

    <div class="card col-sm-8 p-5">
        <!-- Erros de Login e Cadastro -->
            <jet-validation-errors class="mb-4" />

            <div v-if="status" class="alert alert-success mb-3 rounded-0" role="alert">
                {{ status }}
            </div>

        <!-- FORMULÁRIO -->
            <form @submit.prevent="login">
                <!-- CAMPO E-MAIL -->
                <div class="mb-3">
                    <div>
                        <label for="email_login">Email:</label>
                    </div>
                    <input type="email" id="email_login" class="form-control"
                    v-model="form.email" required>
                </div>
                <!-- CAMPO SENHA -->
                <div class="mb-3">
                    <div>
                        <label for="senha_login">Senha:</label>
                    </div>
                    <input type="password" id="senha_login" class="form-control"
                    v-model="form.password" required>
                </div>
                <!-- BOTÃO DE EVIAR -->
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">
                        Enviar
                    </button>
                </div>
                <!-- BOTÃO DE CONTINUAR CONECTADO -->
                <div class="d-flex mb-3">

                    <div class="row">
                        <div class="col-2">
                            <input type="checkbox" v-model="form.remember">
                        </div>

                        <div class="col-10">
                            <span class="">
                                lembrar de mim
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>      
  </div>
</template>

<script>

export default {
    components:{
    },
    // DADOS RETORNADOS
    data(){
        return {
            form: this.$inertia.form({
                email: "",
                password: ""
            }),
            
        }
    },

    // FUNÇÕES PRINCIPAIS
    methods:{
        login: function(){
            this.form.transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
        },
        cadastro: async function()
        {
            await axios.post("api/cadastro/start", {}).then((res) => {

            });
        },
    },

    // METODO DE ENTRADA
    mounted(){
        // axios.get("api/logged").then((res) => {
        //     console.log(res);
        // })
    },
    props: {
        canResetPassword: Boolean,
        canLogin: Boolean,
        canRegister: Boolean,
    }
}
</script>

<style>
.h_100{
    height: 100vh;
}
</style>