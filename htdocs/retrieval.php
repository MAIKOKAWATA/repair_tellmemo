<?php
    header('Content-type: text/plain; charset= UTF-8');
    if(isset($_POST['employ'])){

        require_once("../inc/condb_telmemo.php");
        require_once("../inc/model.php");
        $db=db();
        $retrieval = new Retrieval($db);
        $data = $retrieval -> mt_employ($_POST["employ"]);

        $str='';
        foreach($data as $val){
            if($val["name"]=="伊藤浩"){
                $str.="<a href='javascript:void(0);' onclick='select_mail(\"".$val["mailadd"]."\",\"伊藤社長\")' name='rg'>".$val["name"]."</a><br>";
            }else if($val["name"]=="佐野永時"){
                $str.="<a href='javascript:void(0);' onclick='select_mail(\"".$val["mailadd"]."\",\"佐野専務\")' name='rg'>".$val["name"]."</a><br>";
            }else{
                $str.="<a href='javascript:void(0);' onclick='select_mail(\"".$val["mailadd"]."\",\"".$val["name"]."さん\")' name='rg'>".$val["name"]."</a><br>";
            }
        }

        $result = nl2br($str);
        echo $result;
    }else{
        echo 'FAIL TO AJAX REQUEST';
    }
?>