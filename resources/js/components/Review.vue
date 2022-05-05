<template>
      <section class="review">
      <div class="container">
        <div class="row">
          <div class="col-lg-6" id="image">
            <img src="images/review.png" alt="">
          </div>
          <div class="col-lg-6" id="content">
            <h1>What peaple says about us</h1>
            <div>
            <carousel :autoplay="true" :items="5" :autoWidth="true" :dots="true" :loop="true">
              <div class="item">
                <div class="header">
                  <div class="img_person">
                    <img src="/images/avatar-03.png" alt="">
                  </div>
                  <div>
                    <h2>Mouhcine az</h2>
                    <p>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </p>
                  </div>
                </div>
                <div class="body">
                  <i class="fas fa-quote-left"></i>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus deserunt qui libero alias dolorem facere molestiae consequuntur
                    <i class="fas fa-quote-right"></i>
                  </p>
                </div>
              </div>
            </carousel>
            </div>
          </div>
        </div>
      </div>
    </section>
</template>

<script>
import carousel from 'vue-owl-carousel'

export default {
    components: { carousel },
}
</script>