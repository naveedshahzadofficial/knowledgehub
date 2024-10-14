<template>
    <form @submit.prevent="onSubmit" class="search-form">
        <div class="row">
                    <div class="col-lg-12 col-md-12  col-sm-12">
                        <Select2 v-model="v_department_id"  :options="departments" :placeholder="`Government Agency`" />

                    </div>
                    <div class="col-lg-12 col-md-12  col-sm-12 mt-3">
                        <Select2 v-model="v_activity_id" :options="activities" :placeholder="`Business Activity`" />
                    </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 text-right">
                <button type="submit" class="btn home-search-btn btn-sm px-5 text-light" :class="{'btn-loading': isLoading}">Search</button>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    name: "HomeSearchFormComponent",
    props: {
        department_id: "",
        activity_id: "",
    },
    data(){
        return {
            v_department_id:"",
            v_activity_id: "",
            isLoading:false
        }},
    computed: {
        departments() {
            return this.$store.state.department.departments;
        },
        activities() {
            return this.$store.state.activity.activities;
        },
    },
    mounted() {
        this.$store.dispatch('department/getDepartment');
        this.$store.dispatch('activity/getActivity');
        this.select2focus();
        this.v_activity_id = this.activity_id;
        this.v_department_id = this.department_id;
    },
    methods:{
        onSubmit: function (){
            this.isLoading = true;
            const newParams = {
                department_id: this.v_department_id,
                activity_id: this.v_activity_id,
            };
            this.$emit('search-params', newParams);
            this.isLoading = false;
        },
        select2focus: function (){
            $(document).on('select2:open', () => {
                document.querySelector('.select2-search__field').focus();
            });
        }
    }
}
</script>

<style scoped>

</style>
