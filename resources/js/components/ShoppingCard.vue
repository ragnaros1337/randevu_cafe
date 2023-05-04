<template>
    <div class="header-card" @click="mustOpenDialog()">
        <i class="header-card-icon fas fa-shopping-bag">
            <span v-if="this.$store.getters.count > 0" class="header-card-circle">{{ $store.getters.count }}</span>
        </i>
    </div>
    <v-dialog
        persistent
        v-model="dialog_card"
        min-width="300"
        width="800">
        <v-card class="shopping-card-dialog">
            <v-card-item>
                <v-card-title class="shopping-card-dialog-header">Ваш заказ</v-card-title>
                <v-divider class="shopping-card-dialog-divider"></v-divider>
                <v-card-text class="shopping-card-dialog-body">
                        <div v-for="item in computedOrder" class="shopping-card-item row">
                            <div class="shopping-card-item-left col-10">
                                <div class="shopping-card-item-title">{{ item.title }}</div>
                            </div>
                            <div class="shopping-card-item-right col-2">
                                <div class="shopping-card-item-count">{{ item.count }} шт.</div>
                                <div class="shopping-card-item-price">{{ item.price * item.count}} ₽</div>
                            </div>
                        </div>
                        <v-divider class="shopping-card-dialog-divider shopping-card-dialog-divider-down"></v-divider>
                        <div class="shopping-card-dialog-footer">
                            <div class="shopping-card-itogo-text">Итого:</div>
                            <div class="shopping-card-itogo-price">{{ this.$store.getters.calculated_price }} ₽</div>
                        </div>
                    <v-card-actions class="shopping-card-dialog-actions">
                        <v-btn variant="tonal" color="#61ADF8FF" rounded="sm" elevation="4">Оформить заказ</v-btn>
                        <v-btn variant="tonal" color="#61ADF8FF"
                               rounded="sm" elevation="4" @click="this.dialog_card = false">Закрыть</v-btn>
                    </v-card-actions>
                </v-card-text>
            </v-card-item>
        </v-card>
    </v-dialog>
</template>

<script>
export default {
    name: "ShoppingCard",
    data () {
        return {
            dialog_card: false,
        }
    },
    methods: {
        mustOpenDialog(){
            if(this.$store.getters.count > 0){
                this.$store.dispatch('calculatePrice');
                this.dialog_card = true
            }
        },
    },
    computed: {
        computedOrder() {
            return this.$store.getters.order;
        },
    }
}
</script>

<style scoped>

</style>
