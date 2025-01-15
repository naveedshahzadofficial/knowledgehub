<template>
    <div
        class="card shadow-none border-none"
        style="margin-top: 70px; border: none"
    >
        <div class="card-body">
            <div class="tab-content" id="eBizServicesTab1Content">
                <div
                    class="tab-pane fade show active"
                    id="eBizService1-tab-pane"
                    role="tabpanel"
                    aria-labelledby="eBizService1-tab"
                    tabindex="0"
                >
                    <RlcoDetailComponent
                        :rlco_detail="getDetailRlco"
                        :isOverFlow="true"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import RlcoDetailComponent from "../components/RlcoDetailComponent";
import { usePreLoaderStore } from "../store/preloader";
export default {
    name: "Detail",
    data() {
        return {
            rlco_detail: {},
            loading: false,
        };
    },
    components: {
        RlcoDetailComponent,
    },
    created() {
        usePreLoaderStore().setIsShow(false);
        window.setTimeout(() => {
            usePreLoaderStore().setIsShow(true);
        }, 1000);
    },
    computed: {
        getDetailRlco: function () {
            return this.rlco_detail;
        },
    },
    mounted() {
        this.loadRlcoDetail();
    },
    methods: {
        loadRlcoDetail: function () {
            this.loading = true;
            axios
                .get(`rlco-detail/${this.$route.params.id}`)
                .then((response) => {
                    this.rlco_detail = response.data.rlco_detail;
                    this.loading = false;
                })
                .catch((error) => {
                    this.loading = false;
                });
        },
    },
};
</script>
