<template>
    <jet-menu />

    <div class="container mt-5">

        <!-- <div class="comentarios card bg-light mb-2">

            <div class="card-header">
                <h2 class="display-4 fw-bold">
                    <inertia-link :href="route('completa', '1')" class="text-success">
                        Noticia completa
                    </inertia-link>
                </h2>
                
                <div class="box_img_coment">
                    <div class="img_coment"
                    style="background-image: url('https://images.freeimages.com/images/large-previews/4a1/on-the-road-5-1384802.jpg')"></div>
                </div>
            </div>

            FORMULARIO DE COMENTARIO
            <div class="card-header">
                <div class="row mb-2">

                    autofocus
                    <div class="col-sm-3 col-12">
                        <input type="text" placeholder="Nome" class="form-control"
                        >
                    </div>
                    <div class="col-sm-7 col-12">
                        <input type="text" placeholder="Comentário" class="form-control"
                         >
                    </div>

                    <div class="col-sm-2 col-12">
                        <button class="btn btn-success btn-small">
                             Confirmar
                        </button>
                    </div>
                </div>
            </div>

            COMENTARIO PUBLICADO
            <div class="card-header">
                <h3>Nome de Usuario</h3>
                <p>comentario</p>

                <small>
                    <a href="#" class="text-secondary" 
                    data-bs-target="#form-resposta" data-bs-toggle="modal">
                    responder
                    </a>
                </small>
            </div>
        </div> -->


        <!-- PARTE DINÂMICA -->
        <div  v-for="(noticia, key) in dados_noticia" :key="key"
        class="comentarios card bg-light mb-2">

            <div class="card-header">
                <h2 class="display-4 fw-bold">
                    <inertia-link :href="route('completa', '1')" class="text-success">
                        {{ noticia.titulo }}
                    </inertia-link>
                </h2>
                
                <div class="box_img_coment">
                    <!-- <div class="img_coment"
                    style="background-image: url('https://images.freeimages.com/images/large-previews/4a1/on-the-road-5-1384802.jpg')"></div> -->
                    <img :src="noticia.link_imagem">
                </div>
            </div>

            <!-- FORMULARIO DE COMENTARIO -->
            <div v-if="$page.props.user" class="card-header">
                <div class="row mb-2">

                    <div class="col-sm-3 col-12">
                        <input type="text" placeholder="Nome" class="form-control"
                        >
                    </div>
                    <div class="col-sm-7 col-12">
                        <input type="text" placeholder="Comentário" class="form-control"
                         >
                    </div>

                    <div class="col-sm-2 col-12">
                        <button class="btn btn-success btn-small">
                             Confirmar
                        </button>
                    </div>
                </div>
            </div>

            <!-- COMENTARIO PUBLICADO -->
            <div class="card-header">
                <h3>Nome de Usuario</h3>
                <p>comentario</p>

                <small>
                    <a href="#" class="text-secondary" 
                    data-bs-target="#form-resposta" data-bs-toggle="modal">
                    responder
                    </a>
                </small>
            </div>
        </div>

    </div>
</template>

<script>
import JetMenu from '@/Jetstream/Menu';

export default {
    components: {
        JetMenu,
    },
    data()
    {
        return {
            dados: [],
            dados_noticia_temp: [],
            dados_noticia: []
        }
    },
    mounted()
    {
        // axios.get("http://127.0.0.1:8000/api/noticia").then((res) => {
        //     this.dados_noticia.push(res.data[0])
        //     console.log(this.dados_noticia[0])
        // });


        axios.get("http://127.0.0.1:8000/api/comentario").then((res) => {
            this.dados.push(res.data.comentarios)
            console.log(this.dados[0])
            for(let i = 0; i < this.dados[0].length; i++)
            {
                this.dados_noticia.push(res.data.comentarios[i].noticia)
            }
            console.log(this.dados_noticia)
        });
    }
}
</script>

<style>
/* .comentarios{
     height: 600px; 
} */
.box_img_coment{
    height: 430px;
    width: 800px;
    overflow: hidden;
}
.img_coment{
    position: relative;
    max-width: 100%;
    height: 100%;

    background-size: 100% 100%;
    background-position: center;
    background-repeat: no-repeat;
    object-fit: contain;

    filter: brightness(0.7);
    border-radius: calc(.25rem - 1px) calc(.25rem - 1px);
}
</style>