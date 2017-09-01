<?php

$mysqli = new mysqli('localhost', 'user', 'password', 'wf_workflow');

 /* array with all cases especific */
$array=array(00001,00002,00003);

foreach ($array as $key => $value) {

  $sql="SELECT * FROM `APPLICATION` WHERE APP_NUMBER=$value";
  $result=$mysqli->query($sql);
    $result=$result->fetch_assoc();

    $str=$result['APP_DATA'];

    if (!unserialize($str) ) {
      $str = preg_replace('!s:(\d+):"(.*?)";!se', "'s:'.strlen('$2').':\"$2\";'", $str);
      $app_data=unserialize($str);
    }else{
      $app_data=unserialize($str);
    }

    /* example: echo $app_data['email']."<br>"; */
    echo $app_data['name_data']."<br>";
}
