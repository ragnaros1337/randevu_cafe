<template>
<!--    по клику на фильтре обращаемся к GET_FILTERED_GOODS_FROM_API отправляя фильтр и первую страницу-->
    <v-btn-toggle v-model="good_filter" class="header-buttons button-large-screen"
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
    <v-select class="header-buttons-select button-small-screen"
        :items="categories"
        variant="underlined"
        hide-details="true"
        color="white"
        v-model="good_filter"
        theme="dark"
        @update:modelValue="this.$store.dispatch('GET_FILTERED_GOODS_FROM_API', {filter : good_filter, next_page: 1})"
    ></v-select>
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
        clog(msg){
            console.log(msg)
        }
    },
}
</script>

<style scoped>

</style>
