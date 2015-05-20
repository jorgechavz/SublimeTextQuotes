<?php
include '../../includes/db.php';
include '../../lib/phrases.php';


if($_SERVER['REQUEST_METHOD'] == "POST"){
  $id = $_POST['id'];
  $sql = "DELETE FROM phrases WHERE phrase_id = '$id'";
  if(mysql_query($sql)){
    $response = array("code" => "200", "message" => "The quote was deleted succesfully");
  }else{
    $response = array("code" => "500", "message" => "Error when deleting phrase: ".mysql_error());
  }
  echo json_encode($response);
}
 ?>
