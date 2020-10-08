<?php

// include "connection.php";

// $siswa=$db->query("select * from lontong"); //prepare statment

// $data_siswa=$siswa->fetchAll();  //execetue and get data as array

// // var_dump($data_siswa);

// foreach($data_siswa as $key)
// {
//     // echo $key['sudi']." ". $key['Yono']." ".$key['nilai']."<br>";
// }

// if (isset($_POST['search'])) {
    

//     $filter=$db->query("select * from lontong where sudi=".$filter." or Yono=$filter");
//     $data->execetue();

//     var_dump($data->fetchAll());
// }

$db = new PDO("mysql:dbname=latihan;localhost", 'root', '');

if (isset($_POST['search'])) {
  $name = $_POST['search'];
  $search = $db->prepare("select * from ambar where sudi=? or Yono=? ");
  $search->bindValue(1, $name, PDO::PARAM_STR);
  $search->bindValue(2, $name, PDO::PARAM_STR);

  $tampil_data = $search->fetchAll();

  $row=$search->rowCount();

} else {
  $data = $db->query("select * from lontong");

  $tampil_data = $data->fetchAll();
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<div class="container">
    <div class="row">
        <h2>Data</h2>
                       <!-- Alert Message -->

      <?php if(isset($row)): ?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
         <p class="lead"><?php echo $row; ?> data ditemukan !</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
          </button>
    </div>

    <?php endif; ?>

    <table class="table border 1px">
  <thead>
    <tr>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($data_siswa as $key) :?>
    <tr>
    <td><?php echo $key ['sudi']; ?></td>
    <td><?php echo $key ['Yono']; ?></td> 
    <td><?php echo $key ['nilai']; ?></td> 
    </tr>
    <?php endforeach ;?>
    <!-- <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
    </tr> -->
  </tbody>
</table>
<div class="col-8">
    <h3 class="col">Cari Nama Manusia</h3>
    <div class="input-group col-5">
  <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
   <button type="button" class="btn btn-outline-primary">Cari</button>
 </div>
 <form action="index.php" method="post">
<select class="ml-3"name="filter">
    <option value="">
        Tampilkan Semua
    </option>
     <?php foreach ($pilihan as $key): ?>
        <option value="<?php echo $key; ?>"><?php echo $key; ?></option>
    <?php endforeach; ?>      
</select>
</form>
</div>    
</div>
</div>
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>