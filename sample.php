<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>Ajax Sample</title>
  </head>
  <body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><!--JQuery読込-->
    <form id="form_1" method="post" accept-charset="UTF-8">
        <p>名前 <input type="text" name = "employ" id ="employ"> </p>
<!--        <p>パスワード <input type="text" name = "passward" id="passward"> </p>-->
        <p>メールアドレス <input type="text" name = "mail" id ="mail"> </p>
    </form>

    <button id="ajax">ajax</button>
    <div class="result" id="result" style="overflow:hidden;position:absolute;left:50px;top:50px;display:none;background-color: #99cc00;width:500px;height:300px;border:#000000 solid 2px;">
<!--        <table width="100%" cellspacing="0">
            <tr><td style="background-color: #6666FF;width:470px;"></td>
            <td style="background-color: #AAAAAA;">×</td></tr>
        </table>-->
        <div style="background-color: #ffffff;width:450px;display:inline-block;">社員名検索&emsp;</div>
        <div style="background-color: #ff0000;width:50px;float:right;display:inline-block;">×</div>
        <div class="res" id="res" style="background-color: #dcdcdc;overflow: scroll;height:276px;">
        </div>
    </div>

    <script>

        $(function(){
            // Ajax button click buttonをクリックした際に無名関数を動かす
            $('#ajax').on('click',function(){//【ボタンID】
                $.ajax({
                    url:'request2.php',//飛び先
                    type:'POST',//通信方法
                    data:{
                        'employ':$('#employ').val(),//id=useridのvalueをuseridとして引いてくる
                        //'passward':$('#passward').val()//id=passwardのvalueをpasswordとして引いてくる
                    }
                })
                // Ajaxリクエストが成功した時発動
                .done( (data) => {//上記($.ajaxが成功したら)
                    $('#result').css("display","block")
                    $('.res').html(data);//class=resultのhtmlに内容(data)を吐き出す【innerHTML】
                })
                // Ajaxリクエストが失敗した時発動
                .fail( (data) => {//$.ajaxが失敗したら
                    $('.res').html(data);
                })
                // Ajaxリクエストが成功・失敗どちらでも発動
                .always( (data) => {

                });
            });
        });

    </script>
  </body>
</html>