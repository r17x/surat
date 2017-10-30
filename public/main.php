<?php 
use Surat\Surat;

$arsip = new Surat($_REQUEST);
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	if(isset($_POST['Tambah'])){
		$arsip->add();
	}else if (isset($_POST['Simpan'])){
		$arsip->update();
	}else if (isset($_POST['delete'])){
		$arsip->delete($_POST['delete']);
	}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Dashboard</a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
        </ul>
        <form class="form-inline mt-2 mt-md-0 right" method="POST">
          <!-- <input class="form-control mr-sm-2" type="text" placeholder="Search"> -->
          <input type="hidden" value="logout" name="logout">
          <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
        </form>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">Berkas <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?page=tambah">Tambah Surat</a>
            </li>
            <li class="nav-item" style="display:none">
              <a class="nav-link" href="?page=import"> Pengaturan </a>
            </li>
          </ul>
        </nav>

        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
          <h2>Daftar Berkas</h2>
          <hr>
<?php if (isset($_REQUEST['edit'])) {
$val = $arsip->first($_REQUEST['edit']);
} ?>
			<?php if (
				in_array('tambah', array_values($_GET))  OR 
				in_array('edit', array_keys($_REQUEST))
			): ?>
          <form class="col-md-6" method="post">
      			<div class="form-group">
					<label class="form-label"> Jenis Surat </label>
					<select class="form-control" name="jenis">
						<option value="masuk"> Masuk </option>
						<option values="keluar"> Keluar </option>
					</select>
				</div> 
      			<div class="form-group">
					<label class="form-label"> Nomor Surat </label>
					<input type="text" name="nomor" value="<?= isset($val) ? $val->nomor : null ?>" placeholder="Nomor Surat" class="form-control" required/>
				</div> 
      			<div class="form-group">
					<label class="form-label"> Asal Surat</label>
					<input type="text" name="asal"  value="<?= isset($val) ? $val->asal : null ?>" placeholder="Asal Surat"  class="form-control" required/>
				</div> 
      			<div class="form-group">
					<label class="form-label"> Tanggal </label>
					<input type="date" name="tanggal" placeholder="Tanggal" value="<?= isset($val) ? $val->tanggal : null?>"  class="form-control" required/>
				</div> 
      			<div class="form-group">
					<label class="form-label"> Perihal </label>
					<input type="text" name="perihal" placeholder="Perihal"  value="<?= isset($val) ? $val->perihal  : null ?>" class="form-control" required/>
				</div> 
      			<div class="form-group">
					<label class="form-label"> Keterangan </label>
					<input type="text" name="keterangan" placeholder="Keterangan"  value="<?= isset($val) ? $val->keterangan  : null ?>" class="form-control" required/>
				</div> 
				<input type="hidden" value="<?= isset($val) ? $val->id : null ?>" name="oldid" /> 
            <input type="submit" class="btn btn-success" name="<?= isset($_REQUEST['edit']) ? 'Simpan' : 'Tambah' ?>" >
          </form>
        <?php endif ?>
          <?php if(in_array('import', array_values($_GET))): ?>
          
<form  method="post" class="form-inline" method="post" enctype="multipart/form-data">
    <input type="file" class="form-control" name="excelfile" >
    <input type="submit" value="Import" class="btn btn-warning">
</form>

          <?php endif ?>
          <hr>
          <div class="table-responsive">
<table class="table table-striped">
    <thead>
        <th> No </th>
        <th> Jenis </th>
        <th> Nomor Surat </th>
        <th> Asal Surat </th>
        <th> Tanggal </th>
		<th> Perihal </th>
		<th> Keterangan </th>
        <th class="text-center"> * </th>
    </thead>

    <tbody>
        <?php 
			  $data = $arsip->getAll();
				$num = 0;
			if(!is_null($data)){
            foreach($data as $d) {
				$num++;
         ?>    
        <tr> 
            <td><?= $num ?></td>
            <td><?= $d->jenis ?></td>
            <td><?= $d->nomor ?></td>
            <td><?= $d->asal ?></td>
            <td><?= substr($d->tanggal,0,10) ?></td>
			<td><?= $d->perihal ?></td>
			<td><?= $d->keterangan ?></td>
            <td class="text-center class="form-inline"">
              
              <form method="post">
              <input type="hidden" value="<?= $d->id ?>" name="delete">
              <button class="btn btn-danger btn-sm">Hapus</button> 
              </form>

              <form method="post">
              <input type="hidden" value="<?= $d->id ?>" name="edit">
              <button class="btn btn-warning btn-sm">Edit</button> 
              </form>
            </td>
        </tr>

        <?php  }} else {  ?>
          <tr class="text-center">
            <td colspan="5">
              <form>
                <input type="hidden" value="tambah" name="page">
                <label for="">
                Belum Ada Data, Silahkan 
                <input type="submit" class="btn btn-primary btn-sm" value="Tambah"> 
                Data
                </label>
              </form>
            </td>
		  </tr>
	<?php } ?>
    </tbody>
</table>
</div>

        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-slim.min.js" ></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

