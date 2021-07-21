<template>

  <div class="container my-3">
      <h1 class="display-3 fw-bold">
          Cadastrar Noticia
      </h1>

      <div class="card col-10 mt-2 m-auto">
          <!-- FORMULÁRIO -->
          <form>
              
              <div class="row">
                  <!-- CAMPO TÍTULO -->
                  <div class="col-10 m-auto">
                      <div>
                          <label for="not-titulo">Título:</label>
                      </div>
                      <input v-model="not_titulo" type="text" placeholder="Título da Notícia" id="not-titulo"
                      class="form-control" required>
                  </div>

                  <div class="col-10 m-auto">
                      <div>
                          <label for="not-link-img">Imagem:</label>
                      </div>
                      <input v-model="not_link_img" type="url" placeholder="Link da Imagem" id="not-link-img"
                      class="form-control" required>
                  </div>

                  <div class="col-10 m-auto">
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
export default {
    components:{

    },
    data()
    {
        return {
            not_titulo: "",
            not_img_link: "",
            not_conteudo: "",
        }
    },
    methods:{
        cadastrar: function()
        {
            axios.get("api/store", {
                titulo: this.not_titulo,
                imagem: this.not_titulo,
                conteudo: this.not_conteudo
            }).then((res) => {
                if(res.data.success)
                {
                    location.href(this.route("/inicio"));
                }
            })
        }
    }
}
</script>

<style>

</style>