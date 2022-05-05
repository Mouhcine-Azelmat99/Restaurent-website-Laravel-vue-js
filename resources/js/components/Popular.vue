<template>

    <section class="trend">
        <div class="container-fluid">
        <div class="row">
            <h1 class="title">
            Popular food
            </h1>
            <div v-if="items.length > 0" id="trend_menu">
                <carousel :autoplay="true" :items="items.length" :autoWidth="true" :dots="true" :autoHeight="true" :loop="true">
                    <div class="item" v-for="item in items" :key="item.id">
                        <h1 class="header">{{ item.name }}</h1>
                        <p><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></p>
                        <img :src="getImage(item.image)" :alt="item.image">
                        <div class="footer">
                            <p>{{ item.price }} $</p>
                            <a :href="url(item.slug)" v-if="isInCard(item.id)"><i class="fas fa-shopping-bag"></i></a>
                        </div>
                        <p class="old_price">{{ item.old_price }}</p>
                    </div>
                </carousel>
            </div>
        </div>
    </div>
  </section>
</template>

<script>
import carousel from 'vue-owl-carousel'

export default {
    components: { carousel },
    data(){
        return{
            items : [],
        };
    },
    methods:{
        getImage:function(elem){
            return '/images/'+elem;
        },
        getItems:function(){
            axios.get('/api/')
            .then((res) => {
            this.items=res.data;
            })
            .catch(err=>console.log(err));
        },
    },
    mounted() {
           this.getItems()
        },
}
</script>
