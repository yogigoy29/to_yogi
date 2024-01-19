<?php
	$judul = "Edit Master Kelas";
	include "templates/templates.php";

	$id_kelas = $_GET['id_kelas'];
	$sql = "SELECT * FROM kelas a INNER JOIN kompetensi_keahlian b ON a.id_kompetensi=b.id_kompetensi WHERE a.id_kelas='$id_kelas'";
	$query= mysqli_query($koneksi, $sql);
	$data = mysqli_fetch_array($query);
	$kelas=$data['kelas'];
	$id_kompetensi=$data['id_kompetensi'];
?>

<div class="container">
  <div class="row">
    <div class="col-6">
			<h2>Edit Master Kelas</h2>
			<form action="kelas-update.php" method="post">
				<input type="hidden" name="id_kelas" value="<?= $id_kelas;?>">

				<!-- Kelas -->
				<div class="input-group mb-2">
					<span class="input-group-text lebar" >Level</span>
					<select name="kelas" required class="form-control form-control-chosen">
						<option value="X" <?php if($kelas=='X'){echo 'selected="selected"';}?>>Kelas X</option>
						<option value="XI" <?php if($kelas=='XI'){echo 'selected="selected"';}?>>Kelas XI</option>
						<option value="XII" <?php if($kelas=='XII'){echo 'selected="selected"';}?>>Kelas XII</option>

					</select>
				</div>

				<!-- Nama Kelas -->
				<div class="input-group mb-1 input-sm">
					<span class="input-group-text lebar" >Nama Kelas</span>
					<input type="text" name="nama_kelas" class="form-control form-control-sm"  value="<?= $data['nama_kelas'];?>" autofocus autocomplete="off" required>
				</div>

				<!-- Nama Komtensi Keahlian -->
				<div class="input-group mb-1">
					<span class="input-group-text lebar" >Nama Kompetensi</span>
					<select name="id_kompetensi" class="form-control form-control-chosen" required>
						<?php
						$sql = "SELECT * FROM kompetensi_keahlian ORDER BY nama_kompetensi_keahlian";
						$query = mysqli_query($koneksi, $sql);
						while($d = mysqli_fetch_array($query)){
							$id=$d['id_kompetensi'];?>
							<option value="<?= $id; ?>" <?php if($id==$id_kompetensi){echo 'selected="selected"';}?>><?= $d['nama_kompetensi_keahlian']; ?></option>
							<?php
						}?>
					</select>
				</div>

				<div class="input-group mb-1">
					<button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Update</button> | <a href="kelas.php" class="btn btn-sm btn-warning"><i class="fas fa-redo"></i> Cancel</a>
				</div>
			</form>
		</div>
	</div>
</div>

<?php include "templates/footer.php";?>
