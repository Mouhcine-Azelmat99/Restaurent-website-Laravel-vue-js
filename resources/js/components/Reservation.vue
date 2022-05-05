<template>
    <section class="reservation">
    <div class="container">
      <h1>Table Reservation</h1>
      <div class="row">
        <div class="col-lg-6 mx-auto">
      <div v-if="status" :class="alertclass(status)">
      {{message}}
    </div>
          <div class="my-2">
            <label for="place" class="form-label">Number Place</label>
            <div class="place">
                <button @click="increment" class="btn btn-lg"><i class="fas fa-plus"></i></button>
                <input type="number" v-model="reservation.places" name="place" disabled id="place" >
                <button @click="decrement" class="btn btn-lg"><i class="fas fa-minus"></i></button>
            </div>
          </div>
          <div class="my-2">
            <label for="message" class="form-label">Notes</label>
            <textarea name="note" v-model="reservation.notes" class="form-control" id="note" required></textarea>
          </div>
          <div class="my-2">
            <label for="message" class="form-label">Date / Time</label>
            <input type="datetime-local" v-model="reservation.date" name="date" id="date" class="form-control" required>
          </div>
          <div class="d-grid gap-2" >
            <button type="submit" @click="confirme" :disabled="disabled" class="btn btn-lg" id="submit">
                    {{buttonValue}}
                    <span v-if="disabled" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </button>
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
            item : {},
            message:"",
            status:'',
            reservation:{
              'places':1,
              'user_id':this.user_id,
              'notes':"",
              'date':undefined,
            },
            disabled:false,
            buttonValue:"Confirme",
        };
    },
    methods:{
        alertclass:function(status){
            return "alert alert-"+status;
        },
        increment:function(){
          this.reservation.places++;
        },
        decrement:function(){
          if(this.reservation.places>1){
            this.reservation.places--;
          }
        },
        confirme:function(){
            if(!this.reservation.date){
                this.message="date of reservation must be not empty !!! ";
                this.status='danger';
            }else{
            axios.post('/api/reservation',this.reservation)
            .then((res) => {
              this.message=res.data.message;
              this.status=res.data.status;
                this.disabled=true;
                this.buttonValue='Laading ...';
              setTimeout( () => {
                    this.message=res.data.message;
                    this.status=res.data.status;
              }, 4000);
              setTimeout( () => window.location.href = "/reservation", 3000);
            })
            .catch(err=>console.log(err));
            }
        },
    },
}
</script>
