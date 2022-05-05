<template>
    <section class="menu">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <h2>Order Online Now</h2>
          <h1>Our Delicious Food</h1>
          <ul>
            <li><button :class="{ active : BrActive }" @click="getBreakfastItems()">Breakfast</button></li>
            <li><button :class="{ active : LuActive }" @click="getLunchItems()">Launch</button></li>
            <li><button :class="{ active : DiActive }" @click="getDinnerItems()">Dinner</button></li>
          </ul>
          <div class="row">
            <div class="col-lg-4" v-for="item in foods" :key="item.id">
              <div class="item">
                <div class="overlay"></div>
                <img :src="getImage(item.image)" :alt="item.name">
                <div class="info">
                  <h1>{{ item.name }}</h1>
                  <p>{{ item.price }} $</p>
                  <a :href="url(item.slug)" ><i class="fas fa-shopping-bag"></i></a>
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
            foods:[],
            BrActive:false,
            LuActive:false,
            DiActive:false,
        };
    },
    methods:{
        getImage:function(elem){
            return '/images/'+elem;
        },
        url:function(slug){
            return 'menu/'+slug;
        },
        getItems:function(){
            axios.get('/api/')
            .then((res) => {
            this.items=res.data;
            this.getBreakfastItems();
            })
            .catch(err=>console.log(err));
        },
        getBreakfastItems:function(){
            axios.get('/api/breakfast')
            .then((res) => {
            this.foods=res.data;
            this.BrActive=true;
            this.LuActive=false;
            this.DiActive=false;
            })
            .catch(err=>console.log(err));
        },
        getLunchItems:function(){
            axios.get('/api/lunch')
            .then((res) => {
            this.foods=res.data;
            this.LuActive=true;
            this.BrActive=false;
            this.DiActive=false;
            })
            .catch(err=>console.log(err));
        },
        getDinnerItems:function(){
            axios.get('/api/dinner')
            .then((res) => {
            this.foods=res.data;
            this.DiActive=true;
            this.BrActive=false;
            this.LuActive=false;
            })
            .catch(err=>console.log(err));
        },
    },
    mounted() {
           this.getItems();
        },
}
</script>
