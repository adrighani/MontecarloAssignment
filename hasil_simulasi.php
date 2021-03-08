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

		<?php
			$jmlRandom = $_POST['jmlRandom'];
			$x0 = $_POST['x0'];
			$a = $_POST['a'];
			$c = $_POST['c'];
			$m = $_POST['m'];
			$biaya = $_POST['biaya'];
			$penjualan = $_POST['penjualan'];
			$angka_random = [];
			$hasil = [];
			$hasil[0] = $x0;
			$pangkat = $_POST['pangkat'];
			$amount = $_POST['amount'];
			$lowestInterval = $_POST['lowestInterval'];
			$dem = $_POST['demand'];
			$demand = unserialize(base64_decode($dem));
			$botInt = $_POST['botInterval'];
			$botInterval = unserialize(base64_decode($botInt));
			$topInt = $_POST['topInterval'];
			$topInterval = unserialize(base64_decode($topInt));
			$demandResult;
		?>
		<div class="panel panel-primary">
			<div class="panel-heading">Hasil Perhitungan</div>
			<div class="panel-body">
				<div class="input-group">
				  <div class="table table-responsive">
					<table class="table table-hover custom-table-header">
						  <tr>
							  <th>Hari</th>
							  <th>Bilangan Acak</th>
							  <th>Permintaan</th>
						  </tr>
						<?php for($i=0; $i<$jmlRandom; $i++): ?>
						  <tr>
							  <td> <?php
									echo $i+1; ?>
							  </td>
							  <td>
								<?php
									//proses random dengan metode LCM
									$hasil[$i+1] = ($a*$hasil[$i] + $c) % $m;

									$angka_random[$i] = round($hasil[$i+1]/$m, 5);
									// $rBot[$i] = $lowestInterval * $pangkat;
									// $rTop[$i] = $topInterval[$amount-1] * $pangkat;
									//
									// $random[$i] = rand($rBot[$i], $rTop[$i]);
									//
									// $randomDec[$i] = $random[$i]/$pangkat;
									echo $angka_random[$i]."<br>";
									//echo $randomDec[$i] = 0.86;
								?>
							  </td>
							  <td>
								<?php
									for($j=0;$j<$amount;$j++){
										if($angka_random[$i] >= $botInterval[$j] && $angka_random[$i] <= $topInterval[$j]){
											$demandResult[$i] = $demand[$j];
											echo $demandResult[$i];
										}
									}
								?>
							  </td>
						  </tr>
						<?php endfor; ?>
					</table>
					<?php
						$total=0;
						for($i=0; $i<$jmlRandom; $i++):
							$total=$total+$demandResult[$i];
						endfor;

						$average = $total / $jmlRandom;
					?>
					<h4><center>Rata-rata jumlah permintaan: <b><?php echo $average; ?></b></center></h4><br/>
					<center>
					<form action="hitung_keuntungan.php" method="post">
						<table>
							<input type="hidden" value="<?php echo print base64_encode(serialize($demand)); ?>" name="demand">
							<input type="hidden" value="<?php echo print base64_encode(serialize($demandResult)); ?>" name="demandRes">
							<input type="hidden" value="<?php echo $amount; ?>" name="banyak">
							<input type="hidden" value="<?php echo $penjualan; ?>" name="penjualan">
							<input type="hidden" value="<?php echo $biaya; ?>" name="biaya">
							<input type="hidden" value="<?php echo $demandResult; ?>" name="demandResult">
							<input type="hidden" value="<?php echo $jmlRandom; ?>" name="jmlRandom">
							<tr>
								<td><input type="submit" class="btn btn-info" value="Prediksi Keuntungan" style="padding-left: 30px; padding-right: 30px;"></td>
							</tr>
						</table>
					</form>
					</center><br/>
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