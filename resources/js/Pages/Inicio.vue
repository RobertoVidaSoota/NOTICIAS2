<template>
  <jet-menu />

  <div class="container mt-5">
      <div class="row">

          <div class="col-lg-6 col-12 mb-5">
              <!-- CARD DA NOTICIA -->
              <div class="box_news mx-auto card bg-dark">
                  <div class="img_div position-relative"
                    style="background-image: url('https://images.freeimages.com/images/large-previews/4a1/on-the-road-5-1384802.jpg')">
                        <div class="trans_img"></div>

                        <inertia-link :href="route('completa')" class="link_noticia text-decoration-none text-light fs-2 text-center position-absolute bottom-0 start-0 w-100">
                            Noticia Completa (EXEMPLO)
                        </inertia-link>
                  </div>
              </div>
          </div>

        <!-- PARTE DO SISTEMA -->
          <div class="col-lg-6 col-12 mb-5" 
          v-for="(not, key) in noticias_inicio" :key="key">
              <!-- CARD DA NOTICIA -->
              <div class="box_news mx-auto card bg-dark">
                  <div class="img_div position-relative"
                    >
                    <div class="trans_img"></div>
                    <img :src="not.link_imagem" 
                    class="w-100">

                        <inertia-link :href="route('completa')" class="link_noticia text-decoration-none text-light fs-2 text-center position-absolute bottom-0 start-0 w-100">
                            {{ not.titulo }}
                        </inertia-link>
                  </div>
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
            noticias_inicio:[]
        }
    },
    // METODO DE ENTRADA
    mounted(){
        // CARREGAR TODAS AS NOTICIAS DA PRIMEIRA PÁGINA
        axios.get("api/noticia").then((res) => {
            this.noticias_inicio = res.data[0]
        });
        
    }
}
</script>




<style>
   .box_news{
       width: 500px;
       height: 370px;
   }

   .trans_img{
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 100%;

    background-image: linear-gradient(to top,
        rgba(022, 022, 022, 0.4),
        rgba(022, 022, 022, 0.2)
    );

    z-index: 2;
    }   
    .img_div
    {
        position: relative;
        height: 100%;
        width: 100%;

        background-size: cover;
        background-position: center;
        z-index: 1;
    }
    .img_div > img
    {
        height: 100%;
    }
</style>