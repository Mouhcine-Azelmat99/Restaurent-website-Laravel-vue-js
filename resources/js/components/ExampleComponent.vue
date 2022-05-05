<template>
    <div>
        <Menu :user_id="user_id" />
        <MenuGlobal :user_id="user_id" />
        <Review />
    </div>
</template>

<script>
import Menu from './Menu.vue';
import Popular from './Popular.vue';
import MenuGlobal from './MenuGlobal.vue';
import Review from './Review.vue';
    export default {
        props:['user_id'],
        components:{
            Menu ,
            Popular,
            MenuGlobal,
            Review,
        }
    }
</script>
