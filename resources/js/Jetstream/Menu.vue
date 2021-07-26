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
                <inertia-link :href="route('entrar')" class=" p-5
                text-decoration-none link_menu">
                Logar
                </inertia-link>
            </div>

            <div v-if="!$page.props.user" class="">
                <inertia-link :href="route('registrar')" class=" p-5
                text-decoration-none link_menu"
               >
                Regitrar-se
                </inertia-link>
            </div>

            <div v-if="$page.props.user" class="ms-auto box_btn_out">
                <form @submit.prevent="logout" class="">
                    <button class=" p-5 mt-0 
                    text-decoration-none link_menu btn_logout">
                        Sair de lola@gmail.com
                    </button>
                </form>
            </div>
    </div>

   
</template>



<script>
import JetValidationErrors from '@/Jetstream/ValidationErrors';
import Button from './Button.vue';

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
    methods:{
        logout() {
            this.$inertia.post(route('logout'));
        },
    }
}
</script>

<style>
.box_btn_out
{
    margin-top: -50px;
}
.btn_logout
{
    background: #198754;
    border: 0;
    outline: 0;
    margin-top: -40px;
}
.btn_logout:hover
{
    background: #fff;
}
</style>