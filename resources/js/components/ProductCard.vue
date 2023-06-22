<template>
        <div class="product-card">
            <div class="card-background"></div>
            <!--            по клику на картинку открывается диалоговое окно-->
            <img @click.stop="dialog = true" width="200px" height="200px" :src="'../storage/' + dataInfo.preview_image" class="card-image-preview">
            <!--            <img @click.stop="dialog = true" width="200px" height="200px" class="card-image-preview">-->
            <div class="card-title">{{ dataInfo.title }}</div>
            <div class="card-description">{{ dataInfo.description }}</div>
            <div class="card-price">Цена: <div style="display:flex;">{{ dataInfo.price }}₽/<div v-if="dataInfo.weight < 1000">{{ dataInfo.weight }}гр</div><div v-else>{{ dataInfo.weight / 1000 }}кг</div></div></div>
            <div class="card-count">Количество: <span>{{ dataInfo.count }}</span></div>
            <div class="card-slider">
            <span class="card-slider-remove">
                <i class="fa fa-2x fa-minus-circle" @click="slider_remove()"></i>
            </span>
                <div class="card-slider-value-container">
                    <span class="card-slider-value">{{ slider_value }}</span>
                </div>
                <span class="card-slider-add" @click="slider_add()">
                <i class="fa fa-2x fa-plus-circle"></i>
            </span>
            </div>
            <v-btn variant="flat" height="30" width="150" class="card-button" @click="add_to_card()" :color="'#ffffff'">Заказать</v-btn>
            <v-dialog
                v-model="dialog"
                width="auto">
                <v-card>
                    <div class="product-card-dialog">
                        <img width="200px" height="200px" :src="'../storage/' + dataInfo.preview_image" class="card-dialog-image-preview">
                        <div class="card-dialog-title">{{ dataInfo.title }}</div>
                        <div class="card-dialog-description">{{ dataInfo.description }}</div>
                        <div class="card-dialog-article">Артикул: {{ dataInfo.article }}</div>
                        <div class="card-dialog-price">Цена: <span>{{ dataInfo.price }}₽</span></div>
                        <div class="card-dialog-count">Количество: <span>{{ dataInfo.count }}</span></div>
                    </div>
                </v-card>
            </v-dialog>
        </div>
</template>

<script>
export default {
    name: "ProductCard",
    props:{
        dataInfo: Object
    },
    data () {
        return {
            slider_value: 1,
            dialog: false,
        }
    },
    methods: {
        //записывает количество товаров в переменную count, которая отображается в кружочке рядом с корзиной
        //далее заполняется переменная заказа, куда отправляется артикул, название, цена и количество.
        //Можно отправить хоть все значения, но оно надо?
        add_to_card(){
            this.$store.state.count = this.$store.state.count + this.slider_value;
            this.$store.state.order.push({article: this.dataInfo.article,
                                        title: this.dataInfo.title,
                                        price: this.dataInfo.price,
                                        count: this.slider_value});
        },
        //Увеличим значение слайдера
       slider_add(){
           if(this.slider_value < this.dataInfo.count){
               this.slider_value = this.slider_value + 1;

           }
       },
        //Уменьшим значение слайдера
        slider_remove(){
            if(this.slider_value > 1){
                this.slider_value--
            }
        },
    }
}
</script>

<style scoped>

</style>
