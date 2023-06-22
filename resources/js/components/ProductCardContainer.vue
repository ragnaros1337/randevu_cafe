<template>
    <div class="body-content row">
        <div class="card-container col-4" v-for="item in this.$store.getters.cards">
<!--            карточка с количеством равным 0 не показывается-->
            <product-card v-if="item.count > 0" :data-info="item"></product-card>
        </div>
    </div>
<!--    наша пагинация. При нажатии на кнопки на ней обращаемся к GET_FILTERED_GOODS_FROM_API в store/index отправляя внутрь активный фильтр и кликнутую страницу-->
    <v-pagination @click="this.$store.dispatch('GET_FILTERED_GOODS_FROM_API', {filter : this.$store.getters.active_filter, next_page: this.$store.getters.pagination.page})"
        color="white"
        v-model="this.$store.getters.pagination.page"
        :length="this.$store.getters.pagination.length"
        :total-visible="this.$store.getters.pagination.total_visible"
        next-icon="mdi-arrow-right-thin"
        prev-icon="mdi-arrow-left-thin"
        class="card-pagination"
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
    //на моменте загрузки (это mounted) этого модуля отправляем первый запрос в GET_FILTERED_GOODS_FROM_API store/index
    //с начальным фильтром "все" и первой страницей
    mounted: function(){
        this.$store.dispatch('GET_FILTERED_GOODS_FROM_API', {filter : 'Все', next_page: 1});
    },
    methods: {
    },
}
</script>

<style scoped>

</style>
