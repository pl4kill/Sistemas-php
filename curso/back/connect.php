<?php
$localhost = "localhost";
$username="root";
$password = "";
$dbname = "cursos";

$connect = new mysqli($localhost,$username,$password,$dbname);

if($connect -> connect_error){
die ("A conexão falhou: ".$connect -> connect_error);
}
else{
echo "";
}
?>
