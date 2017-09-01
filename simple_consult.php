<?php
$mysqli = new mysqli('localhost', 'user', 'password', 'wf_workflow');
 
/* consult one case from application */
$sql="SELECT * FROM `APPLICATION` WHERE APP_NUMBER=00001";
$resultado=$mysqli->query($sql);
$result=$resultado->fetch_assoc();
 
$str=$result['APP_DATA'];
 
if (!unserialize($str) ) {
  $str = preg_replace('!s:(\d+):"(.*?)";!se', "'s:'.strlen('$2').':\"$2\";'", $str);
  $app_data=unserialize($str);
}else{
  $app_data=unserialize($str);
}
 
print_r($app_data);
 
 ?>
