<?php
	
	$biaya = $_POST['biaya'];
	$penjualan = $_POST['penjualan'];
	$banyak = $_POST['banyak'];
	$jmlRandom = $_POST['jmlRandom'];
	$res = $_POST['demandRes'];
	$demandRes = unserialize(base64_decode($res));
	$dem = $_POST['demand'];
	$demand = unserialize(base64_decode($dem));
	$hasilTotal = [];
	
	for($i=0; $i<$banyak; $i++) {
		$hasilTotal[$i] = 0;
	}
?>

<!DOCTYPE html>
<html>

<head>
    <title>MONTE CARLO</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <!-- bagian header template -->
    <header>
        <h1 class="judul">Pemrograman Simulasi - Simulasi Monte Carlo</h1>
        <h2 class="deskripsi">Adri Abdurrahman Ghani (152017068)</h2>
    </header>
    <!-- akhir bagian header template -->

    <div class="wrap">
        <!-- bagian menu		 -->
        <nav class="menu">
            <ul>
                <li>
                    <a href="http://localhost/Montecarlosim">Home</a>
                </li>
            </ul>
        </nav>
        <!-- akhir bagian menu -->

        <!-- bagian sidebar website -->
        <aside class="sidebar">
            <div class="widget">
                <h2>WELCOME.</h2>
                <p style="text-align:justify">Selamat datang, ini adalah web yang berisi Tugas Mata Kuliah Pemrograman Simulasi.</p>
                <p style="text-align:justify">Pada website ini anda akan melihat simulasi dari monte carlo.</p>
            </div>
            <div class="widget">
                <h2>Search field.</h2> 
                <input type="search" id="mySearch" placeholder="Search for something.."> 
                <p>Silahkan cari.</p> 
                <button onclick="myFunction()">Search</button> 
                <p id="demo"></p> 
                <script> 
                	function myFunction() { 
                		var x = document.getElementById("mySearch").placeholder; 
                		document.getElementById("demo").innerHTML = x; } 
                </script>
            </div>
        </aside>
        <!-- akhir bagian sidebar website -->

        <!-- bagian konten Blog -->
        <div class="blog">
            <div class="conteudo">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<h1>Prediksi Permintaan (Monte Carlo)</h1>
			</div>
		</div>
	</nav>
	<div class="container">
	
	<div class="panel panel-primary">
			<div class="panel-heading">Hasil Perhitungan</div>
			<div class="panel-body">
				<div class="input-group">
				  <div class="table table-responsive">
					<table class="table table-hover custom-table-header" border="0">
						  <tr>
							  <th rowspan="2">Hari</th>
							  <th>Quantity Order</th>
							<?php 
								for($i=0; $i<$banyak; $i++) {
							?><th><?php echo $demand[$i]; ?></th>
							<?php } ?>
						  </tr>
						  <tr>
							  <th>Permintaan</th>
							  <?php 
								for($i=0; $i<$banyak; $i++) {
							?><th></th>
							<?php } ?>
						  </tr>
						<?php for($i=0; $i<$jmlRandom; $i++): ?>
						  <tr>
							  <td> <?php
									echo $i+1; ?>
							  </td>
							  <td>
								<?php
									echo $demandRes[$i];
								?>
							  </td>
							  <?php
							  for($j=0; $j<$banyak; $j++){ ?>
								  <td>
									<?php 
										$result = ($demandRes[$i]*$penjualan)-($demand[$j]*$biaya);
										echo $result;
									?>
								  </td>
					   <?php } ?>
						  </tr>
						  <?php
								for($j=0; $j<$banyak; $j++) {
									for($k=0; $k<$jmlRandom; $k++):
										$hasil = ($demandRes[$k]*$penjualan)-($demand[$j]*$biaya);
										$hasilTotal[$j] += $hasil;
									endfor;
								}
							endfor; ?>
						<tr>
							<th colspan="2"><strong>Rata-rata profit</strong></th>
							<?php 
								for($i=0; $i<$banyak; $i++) {
									$avg = $hasilTotal[$i]/$jmlRandom;
							?>
									<th>
										<strong><?php echo round($avg/$jmlRandom, 2);// $hasilTotal[$i]; ?></strong>
									</th>
							<?php } ?>
						</tr>
					</table>
					<br/>
					<br/>
					<br/>
					<center><a href="prediksi_permintaan.php">Kembali Ke Awal</a></center>
				  </div>
				</div>
			</div>
		</div>
	</div>
			</div>
        </div>
        <!-- akhir bagian konten Blog -->
    </div>

</body>

</html>