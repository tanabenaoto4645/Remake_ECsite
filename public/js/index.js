const API_GET_DATA = '/api/data/get/'; // ①

new Vue({
  data(){
    return {
      order: '',
      orderItems: [ // ②
        {name: 'おすすめ順', value: 'recommend'},
        {name: '費用安い順', value: 'lowinitial'},
        {name: '近い順', value: 'nearly'},
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
        this.$store.commit('setValue', res.data);
      });
    }
  }
});