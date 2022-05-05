<template>
    <section class="card">
    <div class="container">
    <div v-if="status" :class="alertclass(status)">
      {{message}}
    </div>
        <div class="row">
        <div class="col-lg-8">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Item</th>
                    <th scope="col">Price</th>
                    <th scope="col">Qantity</th>
                    <th scope="col">action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in items" :key="item.id">
                    <td>{{item.id}}</td>
                    <td>{{item.name}}</td>
                    <td>{{item.price}} $</td>
                    <td>{{item.qty}}</td>
                    <td><button @click="deleteItem(item.id)" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <div class="result">
                <h1>Result</h1><hr>
                <h3>Total : <span>{{ priceTotal }} $</span></h3>
                <div class="d-grid gap-2">
                    <button type="submit" :disabled="priceTotal == 0 || isLoading" @click=confirme  class="btn btn-lg" id="confirme-btn">
                        {{buttonValue}}
                        <span v-if="isLoading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
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
    props:['user_id'],
    data(){
        return{
            items : [],
            message:"",
            status:'',
            priceTotal:0,
            buttonValue:"Confirme",
            isLoading:false,
        };
    },
    methods:{
        getImage:function(e){
            return '/images/'+e;
        },
        alertclass:function(status){
            return "alert alert-"+status;
        },
        getItem:function(){
            axios.get('/api/cardshop/'+this.user_id)
            .then((res) => {
            this.items=res.data;
            this.priceTotal=0;
            this.items.forEach(elem => {
                this.priceTotal+=parseInt(elem.price);
            });
            })
            .catch(err=>console.log(err));
        },
        deleteItem:function(id){
            axios.delete('/api/cardshop/'+id)
            .then((res) => {
              console.log(res.data);
              this.message=res.data.message;
              this.status=res.data.status;
              this.getItem();
            })
            .catch(err=>console.log(err));
        },
        confirme:function(){
            axios.post('/api/order',this.items)
            .then((res) => {
              this.buttonValue='Laading ...';
              this.isLoading=true;
            //   window.location.href = "/home";xx
              setTimeout( () => {
                  this.message=res.data.message;
                    this.status=res.data.status;
              }, 2000);
            setTimeout( () => window.location.href = "/orders", 2000);
            })
            .catch(err=>console.log(err));
        },

    },
    mounted() {
        this.getItem();
    },
}
</script>
