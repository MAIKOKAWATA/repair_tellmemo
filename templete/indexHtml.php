<!DOCTYPE html>
<html lang="ja">
  <head>
   <meta charset="UTF-8">
   <title>伝言メモ自動送信</title>
   <script>
    var body="";

    function msg(){
      var co_name=document.getElementById("co_name").value;//企業名
      var busyo=document.getElementById("busyo").value;//部署
      var cu_name=document.getElementById("cu_name").value;//お客様名
      var act=document.getElementById("act").value;//折返
      var con=document.getElementById("con").value;//用件
      var tell=document.getElementById("tell").value;//伝言内容
      var plus=document.getElementById("plus").value;//追加情報(急ぎかメール確認か)
      var telnum=document.getElementById("telnum").value;//折返先電話番号1102追加
      var mailadd=document.getElementById("mailadd").value;//ペタ社員メールアドレス1106追加
      var send_emp=document.getElementById("send_emp").value;//メール送信先1106追加
      body="";

      /*    本文に宛名を入れる    */
      document.getElementById("co_info").innerHTML="<div>"+send_emp+"";
      body+=""+send_emp+"%0D%0A";

      if(con!=""){//co_info内の文章生成
        document.getElementById("co_info").innerHTML+=""+co_name+"&nbsp;"+busyo+"&nbsp;"+cu_name+"より"+con+"の件でお電話いただきました。</div>";
        body+=""+co_name+" "+busyo+" "+cu_name+"より"+con+"の件でお電話いただきました。"+"%0D%0A";
      }else{
        document.getElementById("co_info").innerHTML+=""+co_name+"&nbsp;"+busyo+"&nbsp;"+cu_name+"よりお電話いただきました。</div>";
        body+=""+co_name+" "+busyo+" "+cu_name+"よりお電話いただきました。"+"%0D%0A";
      }

      if(act!="ご伝言を承っております。"){//tel_info内の文章生成
        document.getElementById("tel_info").innerHTML="<div>"+act+"とのことでした。</div>";
        body+=""+act+"とのことでした。"+"%0D%0A";
      }else{
        document.getElementById("tel_info").innerHTML="<div>"+act+"<br><pre>"+tell+"</pre>とのことでした。</div>";
        tell=tell.replace(/\r?\n/g,'%0D%0A');
        tell="------------------------------%0D%0A"
             +tell+"%0D%0A"
             +"------------------------------%0D%0A";
        body+=""+act+"%0D%0A"+tell+"とのことでした。"+"%0D%0A";
      }
      
      if(plus=="メールをご確認のうえ、"){//plus_info内の文章生成
        document.getElementById("plus_info").innerHTML="<div>お手数をおかけして大変恐縮ですが、<br>"+plus+"ご対応をよろしくお願いいたします。";
        body+="お手数をおかけして大変恐縮ですが、%0D%0A"+plus+"ご対応をよろしくお願いいたします。%0D%0A";
      }else if(plus=="少しお急ぎのご様子でしたので、早めに"){
        document.getElementById("plus_info").innerHTML="<div>お忙しいところ、大変恐縮ですが、<br>"+plus+"<br>ご対応いただけますと幸いです。<br>何卒よろしくお願いいたします。";
        body+="お忙しいところ、大変恐縮ですが、%0D%0A"+plus+"%0D%0Aご対応いただけますと幸いです。%0D%0A何卒よろしくお願いいたします。%0D%0A";
      }else{
        document.getElementById("plus_info").innerHTML="<div>お手数をおかけして大変恐縮ですが、<br>ご対応をよろしくお願いいたします。";
        body+="お手数をおかけして大変恐縮ですが、%0D%0Aご対応をよろしくお願いいたします。%0D%0A";
      }
      if(telnum!=""){//1102追加
        document.getElementById("plus_info").innerHTML+="折返先お電話番号:"+telnum;//1102追加
        body+="折返先お電話番号:"+telnum;//1102追加
      }//1102追加
    }
    function tit(){
      var act=document.getElementById("act").value;//折返
      var plus=document.getElementById("plus").value;//追加情報(急ぎかメール確認か)
      var telnum=document.getElementById("telnum").value;//折返先電話番号//1102追加

      if(plus=="少しお急ぎのご様子でしたので、早めに"){
        document.getElementById("tit").innerHTML="【急：";
      }else{
        document.getElementById("tit").innerHTML="【";
      }

      if(act=="連絡があったことをお伝えください" || act=="改めてご連絡させていただきます"){
        document.getElementById("tit").innerHTML+="要ご確認】お電話頂きました";
      }else if(act=="折り返しご連絡ください"){
        document.getElementById("tit").innerHTML+="要折返】お電話頂きました";
      }else if(act=="ご伝言を承っております。"){
        document.getElementById("tit").innerHTML+="伝言有】お電話頂きました";
      }else if(act=="メールをお送りさせていただきますので、ご確認をお願いいたします"){
        document.getElementById("tit").innerHTML+="メール確認】お電話頂きました";
      }
    }

    function subbtncreate(){
      var mailtit=document.getElementById("tit").textContent;//メール題名
      var mailtxt=document.getElementById("msg_cr").textContent;//メール本文
      var mailsend=document.getElementById("mailadd").value;//メール送り先

      document.getElementById("submitbtn").innerHTML="<button type='button'><a href='mailto:"+mailsend+"?subject="+mailtit+"&body="+body+"' target='_blank'>メールを送信する</a></button>";
    }
    function re(){
      location.reload();
    }
    function mail(){
      var act=document.getElementById("act").selectedIndex;//折返
      if(act==4){
        document.getElementById("plus").selectedIndex=1;
      }
    }
    function tellchange(){
      document.getElementById("act").selectedIndex=3;
    }
    function select_mail($selected_mail,$selected_employ){
      if(document.getElementById("mailadd").value!=""){document.getElementById("mailadd").value+=",";}
      document.getElementById("mailadd").value+=$selected_mail;
      //document.getElementById("employ").value="";
      if(document.getElementById("employ").value!=""){document.getElementById("employ").value+=",";}
      //document.getElementById("employ").value+=$selected_employ;
      if(document.getElementById("send_emp").value!=""){document.getElementById("send_emp").value+=",";}
      document.getElementById("send_emp").value+=$selected_employ;
      document.getElementById("result").style.display="none";
    }
  </script>
  </head>
  <body>
    <h3>伝言メモ　本文自動生成</h3>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><!--JQuery読込-->
    <div id="empretbox">
      <form id="empinfo" method="post" accept-charset="UTF-8">
          <p>ペタ社員名： <input type="text" name = "employ" id ="employ"> </p>
          <!--宛名を入れるための社員名記載欄--><input type="hidden" name="send_emp" id="send_emp">
          <p>メールアドレス： <input type="text" name = "mailadd" id ="mailadd" size="100" readonly> </p>
      </form>
      <button id="ajax">社員名検索</button>
        <div class="result" id="result" style="overflow:hidden;position:absolute;left:50px;top:50px;display:none;background-color: #99cc00;width:500px;height:300px;border:#000000 solid 2px;">
          <div style="background-color: #ffffff;width:450px;display:inline-block;">社員名検索&emsp;</div>
          <div style="background-color: #ff0000;width:50px;float:right;display:inline-block;text-align:center;" onclick="document.getElementById('result').style.display='none';">×</div>
          <div class="res" id="res" style="background-color: #dcdcdc;overflow: scroll;height:276px;"></div>
        </div>
    </div>
<script>
      $(function(){
        // Ajax button click buttonをクリックした際に無名関数を動かす
        $('#ajax').on('click',function(){
            $.ajax({
                url:'../htdocs/retrieval.php',//飛び先
                type:'POST',//通信方法
                data:{
                    'employ':$('#employ').val(),//id=employのvalueをemployとして引いてくる
                }
            })
            // Ajaxリクエストが成功した時発動
            .done( (data) => {//上記($.ajaxが成功したら)
                $('#result').css("display","block");
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

    <form id="info">
      <span>企業名：</span><input type="text" id="co_name" value="" size="50"><br>
      <span>部署：</span><input type="text" id="busyo" value=""><br>
      <span>お客様名：</span><input type="text" id="cu_name" value="様"><br>
      <span>折返：</span>
        <select id="act" onchange="mail();">
          <option value="連絡があったことをお伝えください">連絡があったことをお伝えください</option>
          <option value="折り返しご連絡ください">折り返しご連絡ください</option>
          <option value="改めてご連絡させていただきます">改めて電話します</option>
          <option value="ご伝言を承っております。">伝言をいたします</option>
          <option value="メールをお送りさせていただきますので、ご確認をお願いいたします">メール確認</option>
        </select>
        <br>
      <span>折返先お電話番号：</span><input type="text" id="telnum" value="" size="40">
        <br>
      <span>ご用件：</span><input type="text" id="con" value="" size="60"><span>の件で</span>
      <br>
      <span>伝言内容：</span><textarea id="tell" value="" rows="5" cols="50" onchange="tellchange()"></textarea>
      <br>
      <span>追加情報：</span>
        <select id="plus">
          <option value="">　</option>
          <option value="メールをご確認のうえ、">メール確認</option>
          <option value="少しお急ぎのご様子でしたので、早めに">急ぎ</option>
        </select>
<!--
        <div id="plus">
          <input type="checkbox" value="メールをご確認のうえ、" id="plusmail">メール確認
          <input type="checkbox" value="少しお急ぎのご様子でしたので、早めに" id="plushurry">急ぎ
        </div>
-->
        <br>
      <input type="button" onClick="tit();msg();subbtncreate();" value="本文出力">
      <input type="reset" onClick="re()" value="リセットする">
    </form>
    <div id="tit"></div>
    <div id="msg_cr">
      <div id="co_info"></div>
      <div id="tel_info"></div>
      <div id="plus_info"></div>
    </div>
    <div id="submitbtn"></div>
  </body>
</html>