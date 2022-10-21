/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


var mySwiper = new Swiper(".swiper-container", {
    // オプション設定
    loop: true, // ループ
    speed: 300, // 切り替えスピード(ミリ秒)。
    slidesPerView: 1, // １スライドの表示数
    spaceBetween: 0, // スライドの余白(px)
    direction: "horizontal", // スライド方向
    effect: "fade", // スライド効果 ※ここを変更

    // スライダーの自動再生設定
    autoplay: {
        delay: 3000, // スライドが切り替わるまでの時間(ミリ秒)
        stopOnLast: false, // 自動再生の停止なし
        disableOnInteraction: true, // ユーザー操作後の自動再生停止
    },

    // ページネーションを有効化
    pagination: {
        el: ".swiper-pagination",
    },

    // ナビゲーションを有効化
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

const API_GET_DATA = '/products/sort'; // ①

            new Vue({
                el:'#sort',
                data(){
                    
                    return {
                        order: '',
                        orderItems: [ // ②
                            {name: '更新順（降順）', value: '1'},
                            {name: '更新順（昇順）', value: '2'},
                            {name: '新着順（降順）', value: '3'},
                            {name: '新着順（昇順）', value: '4'},
                            {name: '価格順（降順）', value: '5'},
                            {name: '価格順（昇順）', value: '6'},
                        ]
                    }
                },
                watch: {
    /**
    * 一覧の初期値取得
    * 初期表示はオススメ順でソート
    */
                    order() {
                        axios.post(API_GET_DATA, {
                            order: this.order // ③
                        })
                        .then(res => {
                            this.datas = res.data;
                            console.log(this.datas);
                        });
                    }
                }
            });
