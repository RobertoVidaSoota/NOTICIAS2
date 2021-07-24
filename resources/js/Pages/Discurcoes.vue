<template>
    <jet-menu />

    <div class="container mt-5">


        <div v-if="$page.props.user" class="card mb-2">
            <!-- FORMULARIO DE COMENTARIO -->
            <div class="card-header">
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
        </div>

        <!-- PARTE DINÂMICA -->
        <div  v-for="(c, key) in dados_comentarios[0]" :key="key"
        class="comentarios card bg-light mb-2">

            <!-- COMENTARIO PUBLICADO -->
            <div class="card-header">
                <inertia-link class="text-success" 
                    :href="route('completa', c.noticia.id)">
                   <b> {{ c.noticia.titulo }} </b>
                </inertia-link>
                <h3> {{ c.user.name }} </h3>
                <p>{{ c.texto_comentario }}</p>
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
            dados_comentarios: []
        }
    },
    mounted()
    {
        axios.get("http://127.0.0.1:8000/api/comentario").then((res) => {
            this.dados_comentarios.push(res.data.comentarios)
            console.log(this.dados_comentarios[0])
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