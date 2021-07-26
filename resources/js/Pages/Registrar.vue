<template>

  <div class="container d-flex justify-content-center align-items-center h_100">

      <div class="card col-sm-8 p-5">

          <inertia-link :href="route('inicio')" class="mt-5">
            voltar para o inicio
        </inertia-link>

        <!-- Erros de Login e Cadastro -->
        <jet-validation-errors class="mb-4" />

        <div v-if="status" class="alert alert-success mb-3 rounded-0" role="alert">
            {{ status }}
        </div>

          <!-- FORMULÁRIO -->
          <form @submit.prevent="cadastrarUsuario">
                <!-- CAMPO NOME -->
                <div class="mb-3">
                    <div>
                        <label for="nome_cadastro">Nome:</label>
                    </div>
                    <input type="text" id="nome_cadastro" class="form-control"
                    v-model="form.name">
                </div>
                <!-- CAMPO EMAIL -->
                <div class="mb-3">
                    <div>
                        <label for="email_cadastro">Email:</label>
                    </div>
                    <input type="email" id="email_cadastro" class="form-control"
                    v-model="form.email">
                </div>
                <!-- CAMPO SENHA -->
                <div class="mb-3">
                    <div>
                        <label for="senha_cadastro">Senha:</label>
                    </div>
                    <input type="password" id="senha_cadastro" class="form-control"
                    v-model="form.password">
                </div>
                <!-- CAMPO CONFIRMAR SENHA -->
                <div class="mb-3">
                    <div>
                        <label for="cf_senha_cadastro">Comfirmar Senha:</label>
                    </div>
                    <input type="password" id="cf_senha_cadastro" class="form-control"
                    v-model="form.password_confirmation">
                </div>
                <!-- BOTÃO DE ENVIAR -->
                <div class="d-flex row">

                    <div class="col-6 col-sm-2">
                        <button type="submit" class="btn btn-success">
                            Enviar
                        </button>
                    </div>

                    <div class="col-6 col-sm-3">
                        <inertia-link :href="route('entrar')">
                            Fazer login
                        </inertia-link>
                    </div>
                </div>
            </form>
      </div>
  </div>
</template>



<script>
export default {
    data() {
        return {
        form: this.$inertia.form({
            name: '',
            email: '',
            password: '',
            password_confirmation: ''
        })
    }
  },
    methods:{
            cadastrarUsuario() {
            this.form.post(this.route('register'), {
                onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
}
</script>

<style>

</style>