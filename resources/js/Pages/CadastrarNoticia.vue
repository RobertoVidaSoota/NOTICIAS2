<template>

  <div class="container my-3">
      <h1 class="display-3 fw-bold">
          Cadastrar Noticia
      </h1>

      <inertia-link :href="route('inicio')">
           voltar para o inicio
      </inertia-link>

      <div class="card col-10 mt-2 m-auto p-3">
          <!-- FORMULÁRIO -->
          <form v-on:submit.prevent="cadastrar">

              <div class="row mb-3" v-if="erros">
                  <div class="alert alert-danger">
                      <b>{{ erros }}</b>
                  </div>
              </div>
              
              <div class="row mb-3">
                <!-- CAMPO TÍTULO -->
                  <div class="col-10 m-auto mb-3">
                      <div>
                          <label for="not-titulo">Título:</label>
                      </div>
                      <input v-model="not_titulo" type="text" placeholder="Título da Notícia" id="not-titulo"
                      class="form-control" >
                  </div>
                <!-- CAMPO IMAGEM -->
                  <div class="col-10 m-auto mb-3">
                      <div>
                          <label for="not-link-img">Imagem:</label>
                      </div>
                      <input v-model="not_img_link" type="url" placeholder="Link da Imagem" id="not-link-img"
                      class="form-control" >
                  </div>
                <!-- CAMPO CONTEUDO -->
                  <div class="col-10 m-auto mb-3">
                      <div>
                          <label for="not-conteudo">Conteudo:</label>
                      </div>
                      <textarea v-model="not_conteudo" placeholder="Conteudo da Nóticia" id="not-conteudo" cols="30" rows="7"
                      class="form-control" required></textarea>
                  </div>

                  <div class="col-10 m-auto">  
                    <div class="my-3">
                        <button type="submit" class="btn btn-success">
                            Confirmar
                        </button>
                    </div>
                  </div>
              </div>

          </form>
      </div>
  </div>

</template>

<script>
import store from "../store";
// import JetValidationErrors from '@/Jetstream/ValidationErrors'

export default {
    components:{
        // JetValidationErrors
    },
    data()
    {
        return {
            fk: "",
            not_titulo: "",
            not_img_link: "",
            not_conteudo: "",
            erros: ""
        }
    },
    methods:{
        // CADASTRAR USUÁRIO
        cadastrar: function()
        {
            axios.post("api/noticia", {
                titulo: this.not_titulo,
                link_imagem: this.not_img_link,
                conteudo_total: this.not_conteudo,
                fk_id_users: this.fk
            }).then((res) => {
                if(res.data.success)
                {
                    location.href = this.route("area-editor");
                }
                else{
                    this.erros = res.data.error
                }
            })
        }
    },
    mounted()
    {
        // PEGAR ID DO USUÁRIO LOGADO
        axios.get("api/user/logged").then(response => {
                this.fk = response.data.user.id
        });
    },
    props:{
        // erros: Object
    }
}
</script>

<style>

</style>