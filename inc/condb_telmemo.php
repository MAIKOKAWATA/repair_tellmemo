<?php

function db(){
  $user="root";
  $pass="root";
  $dbname="db_tellmemo";
  $host="localhost:3306";
  $dsn="mysql:host={$host};dbname={$dbname};charset=utf8"; //接続文字列
  $pdo=new PDO($dsn,$user,$pass);
  return $pdo;
}

//データセットから、行列の連想配列を返す　$data[○行目]['列名']
function getTableData($stmt){
  $rownum=0;
  $data=[];
  //行ごとにループ
  while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    //列ごとにループ（列名と値）
    foreach($row as $column_namae=>$value){
      $data[$rownum][$column_namae]=$value;
    }
    $rownum++;
  }
  return $data;
}
?>