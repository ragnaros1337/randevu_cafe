<template>
    <v-btn-toggle v-model="good_filter"
                  min-width="120px"
                  color="white"
                  divided
                  theme="dark"
                  group>
        <v-btn @click="this.$store.dispatch('GET_FILTERED_GOODS_FROM_API', {filter : 'Все', next_page: this.$store.getters.pagination.page})" value="Все">Все</v-btn>
        <v-btn @click="this.$store.dispatch('GET_FILTERED_GOODS_FROM_API', {filter : category.title, next_page: this.$store.getters.pagination.page})" v-for="category in categories" :value="category.title">
            {{ category.title }}
        </v-btn>
    </v-btn-toggle>
</template>

<script>
export default {
    name: "HeaderButtonGroup",
    props:{
        categories: Array,
    },
    data () {
        return {
            good_filter: 'Все',
        }
    },
    methods:{

    }
}
</script>

<style scoped>

</style>
