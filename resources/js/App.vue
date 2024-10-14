<template>
  <section>
    <HeaderComponent :totalFavorite="totalFavorite" />
      <router-view></router-view>
    <FooterComponent />
  </section>
</template>

<script>
import HeaderComponent from "./components/HeaderComponent.vue";
import FooterComponent from "./components/FooterComponent.vue";
export default {
    name: "App",
    components: {FooterComponent, HeaderComponent},
    data() {
        return {
        totalFavorite: 0
        }
    },
    mounted() {
        this.favoriteCount();
    },
    methods: {
        toggleFavorite: function (total){
            this.totalFavorite = total;
        },
        favoriteCount: function (){
            if (localStorage.getItem('favorites')) {
                try {
                    let favorites = JSON.parse(localStorage.getItem('favorites'));
                    this.totalFavorite = favorites.length;
                } catch(e) {
                    localStorage.removeItem('favorites');
                }
            }
        }
    }
}
</script>

<style>

</style>
