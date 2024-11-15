<script>
import {useAssets} from "@/composable/use-assets";
import RlcoDetailComponent from "../components/RlcoDetailComponent";
export default {
    name: "Detail",
    data() {
        return {
            rlco_detail: {},
            loading: false,
        }
    },
    components: {
        RlcoDetailComponent
    },
    computed: {
        getDetailRlco: function (){
            return this.rlco_detail
        }
    },
    mounted() {
        this.loadRlcoDetail();
    },
    watch: {
        '$route.params.rlco_id': {
            immediate: true,
            handler(newId) {
                this.loadRlcoDetail();
            },
        },
    },
    methods: {
        loadRlcoDetail: function(){
            this.loading = true;
            axios.get(`rlco-detail/${this.$route.params.rlco_id}`).then(response => {
                this.rlco_detail = response.data.rlco_detail;
                this.loading = false;
            }).catch(error => {
                this.loading = false;
            })
        },
    }

}
</script>

<style scoped>

</style>
<template>
    <section>
        <RlcoDetailComponent :rlco_detail="getDetailRlco" :isOverFlow="true"/>
    </section>
</template>

