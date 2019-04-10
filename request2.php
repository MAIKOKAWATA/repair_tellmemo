<?php
    header('Content-type: text/plain; charset= UTF-8');
    if(isset($_POST['employ'])){

        require_once("./inc/condb_telmemo.php");
        require_once("./inc/model.php");
        $db=db();
        $retrieval = new Retrieval($db);
        $data = $retrieval -> mt_employ($_POST["employ"]);

        //$str=$data[0]["mailadd"];
        $str='';
        foreach($data as $val){
          $str.="<a href='javascript:void(0);' onclick='document.getElementById(\"mail\").value=\"". $val["mailadd"] ."\";getElementById(\"result\").style.display=\"none\";' name='rg'>".$val["name"].",".$val["mailadd"]."</a><br>";
        }

        $result = nl2br($str);
        echo $result;
    }else{
        echo 'FAIL TO AJAX REQUEST';
    }
?>