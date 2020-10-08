<?php

$db=new PDO("mysql:dbname=latihan;host:localhost","root","");


// $simpan= $db->query("insert into kelas values('','SMA','IPA')");
$tampil=$db->query("select * from kelas");

// $tampil_data=$tampil->fetch(PDO::FETCH_OBJ);
$tampil_data=$tampil->fetchAll(PDO::FETCH_OBJ);

// echo $tampil_data->['kelas'];
// echo $tampil_data->kelas

var_dump($tampil_data);

class tes{

    const HELLO ='Hello';
}




?>