<?php 
$conn=mysqli_connect("localhost","root","root","shuyu"); 
if (mysqli_connect_error($conn))
{ 
    echo "���� MySQL ʧ��: " . mysqli_connect_error(); 
} 
foreach ($_GET as $key => $value) {
	 $value= str_ireplace('\'','',$value);
	 $value= str_ireplace('"','',$value);
     $value= str_ireplace('union','',$value);
     $value= str_ireplace('select','',$value);
     $value= str_ireplace('from','',$value);
     $value= str_ireplace('or','',$value);
	 $_GET[$key] =$value;
 }
?>