<template>
  <jet-menu />

  <h1 class="text-center display-1 fw-bold">
      <!-- {{ titulo }} -->
  </h1>

  <div class="container">
      <p class="text-center">
         <!-- {{ conteudo }}      -->
      </p>
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
            dados: [],
            titulo: "",
            conteudo: "",
            id_user: location.pathname.split("/")[2]
        }
    },
    // FUNÇÃO DE ENTRADA
    mounted()
    {
        axios.get("api/noticia/"+this.id_user).then((res) => {
            this.dados = res.data
            // console.log(this.dados)
        });
    },
    props:{
        
    }
}
</script>

<style>

</style>