<?php

class Retrieval //retrieval.phpで使うclass
{
  private $db;

  function __construct($db){
    $this->db=$db;
  }

  public function mt_employ($employ){
    $data=[];
    $sql="SELECT * from `mt_employ` where `name` like ? and `retire_flag`=0";
    $stmt=$this->db->prepare($sql);
    $stmt->execute(array('%'.$employ.'%'));
    $data=getTableData($stmt);
    return $data;
  }
}
?>