<?php

include "connection.php";



$input=$db->exec("insert into daftar(nama,status) values('".$_POST['nama']."','".$_POST['status']."')");

if($input)
{
    header("Location:index.php");
}

