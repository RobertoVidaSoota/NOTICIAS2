<template>
  
  <div class="container">

    <div class="card col-sm-8 p-5 m-auto absolute 
    left-0 top-0 right-0 bottom-0">
        <!-- Erros de Login e Cadastro -->
            <jet-validation-errors class="mb-4" />

            <div v-if="status" class="alert alert-success mb-3 rounded-0" role="alert">
                {{ status }}
            </div>

            <form @submit.prevent="login">
                
                <div class="mb-3">
                    <div>
                        <label for="email_login">Email:</label>
                    </div>
                    <input type="email" id="email_login" class="form-control"
                    v-model="form.email" required>
                </div>

                <div class="mb-3">
                    <div>
                        <label for="senha_login">Senha:</label>
                    </div>
                    <input type="password" id="senha_login" class="form-control"
                    v-model="form.password" required>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-success">
                        Enviar
                    </button>
                </div>

                <div class="d-flex mb-3">
                    <input type="checkbox" v-model="form.remember">
                    <span>
                        lembrar de mim
                    </span>
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

</style>