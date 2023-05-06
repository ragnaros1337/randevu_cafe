<template>
<!--    по клику на фильтре обращаемся к GET_FILTERED_GOODS_FROM_API отправляя фильтр и первую страницу-->
    <v-btn-toggle v-model="good_filter"
                  min-width="120px"
                  color="white"
                  divided
                  theme="dark"
                  group>
        <v-btn @click="this.$store.dispatch('GET_FILTERED_GOODS_FROM_API', {filter : 'Все', next_page: 1})" value="Все">Все</v-btn>
        <v-btn @click="this.$store.dispatch('GET_FILTERED_GOODS_FROM_API', {filter : category.title, next_page: 1})" v-for="category in categories" :value="category.title">
            {{ category.title }}
        </v-btn>
    </v-btn-toggle>
</template>

<script>
export default {
    name: "HeaderButtonGroup",
    //сюда заезжают категории отправленные с контроллера
    props:{
        categories: Array,
    },
    data () {
        return {
            //временное хранилище активного фильтра
            good_filter: 'Все',
        }
    },
    methods:{

    }
}
</script>

<style scoped>

</style>
