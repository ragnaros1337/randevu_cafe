<template>
    <div class="body-content row">
        <div class="card-container col-4" v-for="item in this.$store.getters.cards">
            <product-card :data-info="item"></product-card>
        </div>
    </div>
    <v-pagination @click="this.$store.dispatch('GET_FILTERED_GOODS_FROM_API', {filter : this.$store.getters.active_filter, next_page: this.$store.getters.pagination.page})"
        color="white"
        v-model="this.$store.getters.pagination.page"
        :length="this.$store.getters.pagination.length"
        :total-visible="this.$store.getters.pagination.total_visible"
    ></v-pagination>
</template>

<script>
export default {
    name: "ProductCardContainer",
    props: {
        paginate: Array,
    },
    data () {
        return {

        }
    },
    mounted: function(){
        this.$store.dispatch('GET_FILTERED_GOODS_FROM_API', {filter : 'Все', next_page: 1});
    },
    methods: {
        // clog(msg){
        //     console.log(msg);
        // }
    },
    // computed: {
    //     computedPage() {
    //         return this.$store.getters.pagination.page;
    //     },
    // }
}
</script>

<style scoped>

</style>
