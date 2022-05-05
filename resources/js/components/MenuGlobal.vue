<template>
    <section class="menuglobal">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <ul>
            <li :class="{active : isActive}">
              <button @click="getItems()">All</button>
            </li>
            <li v-for="cat in categories" :key="cat.id" :class="{active : cat_id == cat.id}">
              <button @click="filterItems(cat.id)">{{ cat.name }}</button>
            </li>
          </ul>
        </div>
        <div class="col-lg-9">
          <div class="row">
            <div class="col-md-4" v-for="item in items" :key="item.id">
              <div class="item shadow">
                <div class="overlay"></div>
                <img :src="getImage(item.image)" :alt="item.name">
                <div class="info">
                  <h1>{{item.name}}</h1>
                  <p>{{item.desc}}</p>
                  <div class="footer-card">
                    <p>{{item.price}} $</p>
                    <a :href="url(item.slug)" v-if="isInCard(item.id)"><i class="fas fa-shopping-bag"></i></a>
                    <a href="/card" v-if="!isInCard(item.id)" class="cart-shop"><i class="fas fa-shopping-cart"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
export default {
    props:['user_id'],
    data(){
        return{
            items : [],
            categories:[],
            isActive:true,
            cat_id:'',
            cardItems:[],
        };
    },
    methods:{
        getImage:function(elem){
            return '/images/'+elem;
        },
        url:function(slug){
            return 'menu/'+slug;
        },
        isInCard:function(elem){
        var exists = this.cardItems.some(function(field) {
            return elem === field.food_id;
            });
            return !exists;
        },
        getICategories:function(){
            axios.get('/api/categories')
            .then((res) => {
            this.categories=res.data;
            })
            .catch(err=>console.log(err));
        },
        getItems:function(){
            axios.get('/api/')
            .then((res) => {
            this.items=res.data;
            this.isActive=true;
            this.cat_id='';
            })
            .catch(err=>console.log(err));
        },
        getCardItems:function(){
            axios.get('/api/cardshop/'+this.user_id)
            .then((res) => {
            this.cardItems=res.data;
            })
            .catch(err=>console.log(err));
        },
        filterItems:function(id){
            axios.get('/api/menu/'+id)
            .then((res) => {
            this.items=res.data;
            this.cat_id=id;
            this.isActive=false;
            })
            .catch(err=>console.log(err));
        },
    },
    mounted() {
           this.getItems();
           this.getCardItems();
           this.getICategories();
        },
}
</script>
