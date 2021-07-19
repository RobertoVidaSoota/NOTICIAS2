<template>

<!-- PARTE DO MENU -->
    <div class="h_menu padding_menu bg-success d-flex">

            <div class="">
                <inertia-link :href="route('inicio')" class=" p-5
                text-decoration-none link_menu"> 
                Inicio 
                </inertia-link>
            </div>

            <div class="">
                <inertia-link :href="route('assuntos')" class=" p-5
                text-decoration-none link_menu">
                 Assuntos 
                 </inertia-link>
            </div>

            <div class="">
                <inertia-link :href="route('discurcoes')" class=" p-5
                text-decoration-none link_menu"> 
                Discurções 
                </inertia-link>
            </div>

            <!-- LINKS DINAMICOS DE AUTENTICAÇÃO -->
            <div v-if="$page.props.user && $page.props.user.nivel_acesso == 1" class="">
                <inertia-link :href="route('area-editor')" class=" p-5
                text-decoration-none link_menu">
                Area Editor
                </inertia-link>
            </div>

            <div v-if="!$page.props.user" class="ms-auto">
                <inertia-link href="#modal_login" class=" p-5
                text-decoration-none link_menu"
                data-bs-toggle="modal"
                data-bs-target="#modal_login">
                Logar
                </inertia-link>
            </div>

            <div v-if="!$page.props.user" class="">
                <inertia-link href="#modal_registro" class=" p-5
                text-decoration-none link_menu"
                data-bs-toggle="modal"
                data-bs-target="#modal_registro">
                Regitrar-se
                </inertia-link>
            </div>

            <div v-if="$page.props.user" class="ms-auto">
                <inertia-link :href="route('inicio')" class=" p-5
                text-decoration-none link_menu">
                Sair de lola@gmail.com
                </inertia-link>
            </div>
    </div>

    <!-- LOGIN -->
    <div class="modal fade" id="modal_login" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3">

                <!-- Erros de Login e Cadastro -->
                <jet-validation-errors class="mb-4" />

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
    </div>

    <!-- CADASTRO -->
    <div class="modal fade" id="modal_registro">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3">

                <form v-on:submit.prevent="">

                    <div class="mb-3">
                        <div>
                            <label for="email_cadastro">Email:</label>
                        </div>
                        <input type="email" id="email_cadastro" class="form-control">
                    </div>

                    <div class="mb-3">
                        <div>
                            <label for="senha_cadastro">Senha:</label>
                        </div>
                        <input type="password" id="senha_cadastro" class="form-control">
                    </div>

                    <div class="mb-3">
                        <div>
                            <label for="cf_senha_cadastro">Comfirmar Senha:</label>
                        </div>
                        <input type="password" id="cf_senha_cadastro" class="form-control">
                    </div>

                    <div class="">
                        <button type="submit" class="btn btn-success">
                            Enviar
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</template>

<script>
import JetValidationErrors from '@/Jetstream/ValidationErrors';

export default {
    components:{
        JetValidationErrors
    },
    computed: {
            // RETORNAR USUARIO LOGADO
            user()
            {
                return store.state.value;
            }
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
        }
    },

    // METODO DE ENTRADA
    mounted(){
        // axios.get("api/logged").then((res) => {
        //     console.log(res);
        // })
    },
    props: {
        canResetPassword: Boolean,
        auth: Object,
        nivel: Number,
        canLogin: Boolean,
        canRegister: Boolean,
    }
}
</script>

<style>

</style>