<template>
  <section class="show">
    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f1f3f5" fill-opacity="1" d="M0,192L120,192C240,192,480,192,720,208C960,224,1200,256,1320,272L1440,288L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg> -->
    <div class="container">
    <div v-if="status" :class="alertclass(status)">
      {{message}}
    </div>
      <div class="row">
        <div class="col-lg-6" id="image-box">
          <img :src="getImage(item.image)" :alt="item.name">
        </div>
        <div class="col-lg-6" id="content">
            <ul>
                <li>
                    <h2>{{ item.name }}</h2>
                </li>
                  <hr>
                <li>
                    <p>{{item.desc}}</p>
                </li>
                <li>
                    <h3>Qantity : <span>{{cardItem.qty}}</span></h3>
                </li>
                  <hr>
                <li>
                    <h3>Price : <span>{{item.price * cardItem.qty}} $</span></h3>
                </li>
                  <hr>
            </ul>
            <div class="form">
              <div class="qty">
                <button type="submit" @click="increment" class="btn btn-lg"><i class="fas fa-plus"></i></button>
                <input type="number" v-model="cardItem.qty" disabled name="qty">
                <button type="submit" @click="decrement" class="btn btn-lg"><i class="fas fa-minus"></i></button>
              </div>
              <div class="d-grid gap-2">
                <button type="submit" @click="confirme" :disabled="disabled" class="btn btn-lg" id="submit">
                    {{buttonValue}}
                    <span v-if="disabled" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </button>
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
export default {
    props:['slug','user_id'],
    data(){
        return{
            item : {},
            message:"",
            status:'',
            cardItem:{
              'food_id':'',
              'user_id':this.user_id,
              'qty':1,
            },
            disabled:false,
            buttonValue:"Confirme",
        };
    },
    methods:{
        getImage:function(e){
            return '/images/'+e;
        },
        alertclass:function(status){
            return "alert alert-"+status;
        },
        increment:function(e){
          this.cardItem.qty++;
        },
        decrement:function(e){
          if(this.cardItem.qty>1){
            this.cardItem.qty--;
          }
        },
        getItem:function(){
            axios.get('/api/food/'+this.slug)
            .then((res) => {
            this.item=res.data;
            this.cardItem.food_id=this.item.id;
            })
            .catch(err=>console.log(err));
        },
        confirme:function(){
            axios.post('/api/food',this.cardItem)
            .then((res) => {
              console.log(res.data);
              this.message=res.data.message;
              this.status=res.data.status;
            //   window.location.href = "/home";
                this.disabled=true;
                this.buttonValue='Laading ...';
              setTimeout( () => {
                    this.message=res.data.message;
                    this.status=res.data.status;
              }, 4000);
              setTimeout( () => window.location.href = "/card", 4000);
            })
            .catch(err=>console.log(err));
        },
    },
    mounted() {
        this.getItem();
    },
}
</script>
