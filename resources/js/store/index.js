import {createStore} from 'vuex';

const store = createStore({
    state: {
        //Сюда набивается заказ
        order: [],
        //Здесь количество заказанных единиц товара
        count: 0,
        //Здесь калькулируется цена заказа
        calculated_price: 0,
        //Наш активный фильтр
        active_filter: 'Все',
        //Сюда приходят все параметры карточек товаров на данной странице
        cards: [],
        //Сюда приходит разбиение по страницам. Номер текущей страницы. Количество страниц. И количество отображаемых
        //страниц в модуле пагинации. Если их более 5, то самые дальние от текущей будут "..."
        pagination: {
            page: 1,
            length: 15,
            total_visible: 5
        }
    },
    actions: {
        //зовем мутацию calculatePrice
        calculatePrice({ commit, getters }){
            commit('calculatePrice', {getters});
        },
        //отправляем запрос на сервер по адресу в route /api/get_filtered_database
        //отправляя туда текущий фильтр и номер страницы
        GET_FILTERED_GOODS_FROM_API({commit, state}, db_filter){
                axios.post('/api/get_filtered_database', {
                    filter: JSON.stringify(db_filter.filter),
                    next_page: db_filter.next_page
                })
                    //после принятия ответа от контроллера зовем мутацию SET_FILTERED_GOODS_TO_VUEX и отправляем ей
                    //принятые с контроллера данные
                    .then(response => {
                        commit('SET_FILTERED_GOODS_TO_VUEX', response.data.good);
                    })
                    //после первой отправки меняем активный фильтр, если нажимали на кнопки в хэдере
                    //если просто меняли страницы в пределах одного фильтра просто не поменяется значение
                    .then(response => {
                        commit('CHANGE_FILTER', db_filter.filter);
                    })
                    //ловим ошибки в консоль
                    .catch(error => {
                        console.log(error);
                    })

        },
        //зовем мутацию GET_FILTERED_GOODS_FROM_API отправляя ей фильтр
        CHANGE_FILTER_VALUE({commit}, db_filter){
            this.dispatch('GET_FILTERED_GOODS_FROM_API', {filter : db_filter});
        }
    },
    mutations: {
        //Пересчитываем цену заказа (происходит после клика на корзине)
        calculatePrice(state, {getters}){
            let order = getters.order;
            for(let i = 0; i< order.length; i++){
                state.calculated_price = state.calculated_price + order[i].count * order[i].price;
            }
        },
        //Меняем значения активного фильтра
        CHANGE_FILTER(state, data) {
            state.active_filter = data;
        },
        //записываем пришедшие данные из контроллера в переменные state (карточки товаров и параметры пагинации)
        SET_FILTERED_GOODS_TO_VUEX(state, data){
            state.cards = data.data
            state.pagination.page = data.current_page;
            state.pagination.length = data.last_page;
        }
    },
    //при помощи этого получаем АКТУАЛЬНЫЕ значения переменных из state
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

