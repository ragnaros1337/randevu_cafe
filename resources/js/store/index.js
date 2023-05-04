import {createStore} from 'vuex';

const store = createStore({
    state: {
        order: [],
        count: 0,
        calculated_price: 0,
        active_filter: 'Все',
        cards: [],
        pagination: {
            page: 1,
            length: 15,
            total_visible: 5
        }
    },
    actions: {
        calculatePrice({ commit, getters }){
            commit('calculatePrice', {getters});
        },
        GET_FILTERED_GOODS_FROM_API({commit, state}, db_filter){
                axios.post('/api/get_filtered_database', {
                    filter: JSON.stringify(db_filter.filter),
                    next_page: db_filter.next_page
                })
                    .then(response => {
                        commit('SET_FILTERED_GOODS_TO_VUEX', response.data.good);
                    })
                    .then(response => {
                        commit('CHANGE_FILTER', db_filter.filter);
                    })
                    .catch(error => {
                        console.log(error);
                    })

        },
        CHANGE_FILTER_VALUE({commit}, db_filter){
            this.dispatch('GET_FILTERED_GOODS_FROM_API', {filter : db_filter});
        }
    },
    mutations: {
        calculatePrice(state, {getters}){
            let order = getters.order;
            for(let i = 0; i< order.length; i++){
                state.calculated_price = state.calculated_price + order[i].count * order[i].price;
            }
        },
        CHANGE_FILTER(state, data) {
            state.active_filter = data;
        },
        SET_FILTERED_GOODS_TO_VUEX(state, data){
            state.cards = data.data
            state.pagination.page = data.current_page;
            state.pagination.length = data.last_page;
        }
    },
    getters: {
        order: state => {
            return state.order;
        },
        count: state => {
            return state.count;
        },
        calculated_price: state => {
            return state.calculated_price;
        },
        active_filter: state => {
            return state.active_filter;
        },
        cards: state => {
            return state.cards;
        },
        pagination: state => {
            return state.pagination;
        }
    }
})

export default store;

