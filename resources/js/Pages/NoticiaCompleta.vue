<template>
  <jet-menu />

  <h1 class="text-center display-1 fw-bold">
      {{ titulo }}
  </h1>

  <div class="container mt-5">
      <p class="text-center">
         {{ conteudo }}     
      </p>
  </div>

  <div class="container">
    <div class="lista_comentarios mt-5">

      <div v-for="(coment, key) in res_comentarios[0]" :key="key"
       class="comentarios card bg-light mb-2">

            <!-- COMENTARIO PUBLICADO -->
            <div class="card-header">
                <h3> {{ coment.user.name }} </h3>
                <p> {{ coment.texto_comentario }} </p>
            </div>
      </div>
    </div>
  </div>
  
</template>

<script>
import JetMenu from '@/Jetstream/Menu'

export default {
    components: {
        JetMenu,
    },
    data()
    {
        return{
            // DADOS RETORNADOS
            dados: [],
            res_comentarios: [],
            // DADOS PARA ENVIAR
            titulo: "",
            conteudo: "",
            id_noticia_cp: location.pathname.split("/")[2]
        }
    },
    // FUNÇÃO DE ENTRADA
    mounted()
    {
        // PEGAR OS DADOS DA NOTICIA PELO ID
        axios.get("http://127.0.0.1:8000/api/noticia/"+this.id_noticia_cp).then((res) => {
            this.dados = res.data[0]
            this.titulo = this.dados.titulo
            this.conteudo = this.dados.conteudo_total
        });

        // PEGAR TODOS OS COMENTARIOS DA NOTICIA
        axios.get("http://127.0.0.1:8000/api/comentario/"+this.id_noticia_cp).then((res) => {
            this.res_comentarios.push(res.data.coments)
            console.log(this.res_comentarios)
        });
    }
}
</script>

<style>

</style>