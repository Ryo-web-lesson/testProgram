$(function () {
    let like = $('.like-toggle'); //like-toggleのついたiタグを取得し代入。
    let likeProductId; //変数を宣言
    like.on('click', function () { //onはイベントハンドラー
      let $this = $(this); //this=イベントの発火した要素＝iタグを代入
      likeProductId = $this.data('product-id'); //iタグに仕込んだdata-product-idの値を取得
      //ajax処理スタート
      $.ajax({
        headers: { //HTTPヘッダ情報をヘッダ名と値のマップで記述
          'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        },  //↑name属性がcsrf-tokenのmetaタグのcontent属性の値を取得
        url: '/like', //通信先アドレス
        method: 'POST', 
        data: { 
          'product_id': likeProductId 
        },
      })
      //通信成功した時の処理
      .done(function (data) {
        $this.toggleClass('liked'); //likedクラスのON/OFF切り替え。
        $this.next('.like-counter').html(data.product_likes_count);
      })
      //通信失敗した時の処理
      .fail(function () {
        console.log('fail'); 
      });
    });
    });

    $(function () {
      let quantity = $('.quantity'); //quantityのついたformの値を取得し代入。
      let quantityProductId; //変数を宣言
      quantity.on('change', function () { //changeはイベントハンドラー
        let $this = $(this); //this=イベントの発火した要素＝formを代入
        quantityProductId = $this.data('product-id'); //iタグに仕込んだdata-product-idの値を取得
        let changeQuantity = $('.quantity').val();
        //ajax処理スタート
        $.ajax({
          headers: { //HTTPヘッダ情報をヘッダ名と値のマップで記述
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
          },  //↑name属性がcsrf-tokenのmetaタグのcontent属性の値を取得
          url: '/quantityChange', //通信先アドレス
          method: 'POST', 
          data: { 
            'product_id': quantityProductId,
            'quantity': changeQuantity,
          },
        })
        //通信成功した時の処理
        .done(function (data) {
          console.log(data.quantity);
        })
        //通信失敗した時の処理
        .fail(function () {
          console.log('fail'); 
        });
      });
      });