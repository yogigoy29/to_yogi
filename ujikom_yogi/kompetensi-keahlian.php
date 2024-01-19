<?php 
	$judul = "KOMPETENSI KEAHLIAN";
	include "templates/templates.php";
?>

<div class="container">
  <div class="row">
    <div class="col-8">
			<h2>Rekapitulasi Kompetensi Keahlian</h2>
			<hr>
			<button type="button" class="badge badge-success p-2 mb-3" data-toggle="modal" data-target="#staticBackdrop">
				<i class="fas fa-plus"></i> Tambah
			</button>

			<table class="table table-bordered table-hover" id="kelas">
				<thead>
					<tr class="text-center">
						<th>No.</th>
						<th>Nama Kompetensi Keahlian</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no 		= 1;
					$sql 		= "SELECT * FROM kompetensi_keahlian ORDER BY nama_kompetensi_keahlian";
					$query 	= mysqli_query($koneksi, $sql);
					while($data = mysqli_fetch_array($query)){
						$id_kompetensi=$data['id_kompetensi'];?>
						<tr>
							<td align="center" width="5%"><?= $no++;?>.</td>
							<td><?= $data['nama_kompetensi_keahlian'];?></td>
							<td align="center" width="25%">
								<?php 
								$sql1="SELECT * FROM kelas WHERE id_kompetensi = '$id_kompetensi'";
								$query1=mysqli_query($koneksi, $sql1);
								if(mysqli_num_rows($query1)=='0'){?>
								
									<a href="kompetensi-keahlian-edit.php?id_kompetensi=<?= $id_kompetensi;?>" class="badge badge-success p-2" title="Edit"><i class="fas fa-edit"></i></a> | <a href="kompetensi-keahlian-delete.php?id_kompetensi=<?= $id_kompetensi;?>" class="badge badge-danger delete-data p-2" title='Delete'><i class="fas fa-trash"></i></a>
									<?php 
								}?>
							</td>
						</tr>
						<?php
					}?>7
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Modal Tambah-->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">	
					Input Nama Kompetensi Keahlian
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="kompetensi-keahlian-simpan.php" method="post">
					<!-- Nama Kompetensi Keahlian -->
					<div class="input-group mb-1">
						<span class="input-group-text lebar" >Nama Kompetensi</span>
						<input type="text" name="nama_kompetensi_keahlian" required autocomplete="off" class="form-control form-control-sm" placeholder="Input Nama Kompetensi Keahlian">
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>  Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include "templates/footer.php";?>
<script>
	$(document).ready(function() {
		$('#kelas').dataTable();
  });
</script>