<?php 

  error_reporting( E_ALL );
  ini_set( "display_errors", 1 );


$mysql_hostname = 'host.docker.internal';

$mysql_username = 'db_id';

$mysql_password = 'db_password';

$mysql_database = 'db_name';

$mysql_port = '52000';

$mysql_charset = 'UTF8';


$conn = new mysqli($mysql_hostname, $mysql_username, $mysql_password, $mysql_database, $mysql_port, $mysql_charset);


if($conn->connect_errno){

    echo '[연결실패..] : '.$connect->connect_error.'';

}

?>