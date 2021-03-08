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
                    <a href="http://localhost/Montecarlosim/">Home</a>
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
			<?php
				error_reporting(E_ERROR);

				$demand = $_POST['demand'];
				$freq = $_POST['freq'];
				$total = 0;
				$biaya = $_POST['biaya'];
				$penjualan = $_POST['penjualan'];
				$banyak = $_POST['banyak'];
				$probability[-1] = 0;
				$amount = count($freq);
				$botInterval = [];
				$topInterval = [];

				//menghitung total frekuensi permintaan
				for($i=0;$i<count($freq);$i++){
					$total = $total + $freq[$i];
				}

				//menghitung peluang/kemungkinan terjadinya permintaan
				for($i=0;$i<count($freq);$i++){
					$probability[$i] = round($freq[$i]/$total,3);
					$cumulative[$i] =  round($cumulative[$i-1] + $probability[$i],3);
				}

				//menghitung panjang angka dibelakang koma
				$length = 0;
				for($i=0;$i<count($freq);$i++){
					if($length < strlen($cumulative[$i])){
						$length = strlen($cumulative[$i]) - 2;
					}
				}

				//menghitung interfal paling bawah
				$lowestInterval = 1;
				for($j=0;$j<$length;$j++){
					$lowestInterval = $lowestInterval/10;
				}

				$lowestInterval = round($lowestInterval,3);

				//menentukan interval bawah dan atas pertama
				$botInterval[0] = $lowestInterval;
				$topInterval[0] = $cumulative[0];

				//menentukan interval bawah dan atas
				for($i=1;$i<count($freq);$i++){
					$botInterval[$i] = round($topInterval[$i-1] + $lowestInterval,3);
					$topInterval[$i] = round($cumulative[$i],3);
				}

				//menghitung untuk perkalian desimal agar bisa digunakan untuk interval bilangan acak
				$pangkat = 1;
				for($j=0;$j<$length;$j++){
					$pangkat = $pangkat * 10;
				}

			?>

		<!-- Container -->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading">Tabel Distribusi</div>
				<div class="panel-body">
					<div class="input-group">

					  <div class="table table-responsive">
						<table class="table table-hover custom-table-header">
						  <tr>
							  <th>Permintaan</th>
							  <th>Kemungkinan Terjadi</th>
							  <th>Kemungkinan Kumulatif</th>
							  <th>Interval Bilangan Acak</th>
						  </tr>
					<?php for($i=0; $i<count($freq); $i++): ?>
						  <tr>
							  <td> <?php echo $demand[$i]; ?> </td>
							  <td> <?php echo $probability[$i]; ?> </td>
							  <td> <?php echo $cumulative[$i]; ?> </td>
							  <td>
								<?php
									echo $botInterval[$i]." - ";
									echo $topInterval[$i]."<br>";
								?>
							  </td>
						  </tr>
					<?php endfor; ?>
						</table>
					  </div>
					</div>
					<div class="input-group">
						<form action="hasil_simulasi.php" method="post">
							<table class="custom-padding-table">
								<tr>
									<td>Masukan jumlah simulasi <?php echo $banyak; ?></td>
									<td>:</td>
									<td><input type="number" min="1" class="form-control" name="jmlRandom" required="" oninvalid="this.setCustomValidity('Harap di isi !')" oninput="setCustomValidity('')"></td>
									<td width="350px"></td>
									<td></td>
									<td>Dengan Asumsi: </td>
								</tr>
								<tr>
									<td>Masukan X0</td>
									<td>:</td>
									<td><input type="number" min="1" class="form-control" name="x0" required="" oninvalid="this.setCustomValidity('Harap di isi !')" oninput="setCustomValidity('')"></td>
									<td width="350px"></td>
									<td></td>
									<td>X0 < m </td>
								</tr>
								<tr>
									<td>Masukan a</td>
									<td>:</td>
									<td><input type="number" min="1" class="form-control" name="a" required="" oninvalid="this.setCustomValidity('Harap di isi !')" oninput="setCustomValidity('')"></td>
									<td width="350px"></td>
									<td></td>
									<td>a < m </td>
								</tr>
								<tr>
									<td>Masukan c</td>
									<td>:</td>
									<td><input type="number" min="1" class="form-control" name="c" required="" oninvalid="this.setCustomValidity('Harap di isi !')" oninput="setCustomValidity('')"></td>
									<td width="350px"></td>
									<td></td>
									<td>c < m </td>
								</tr>
								<tr>
									<td>Masukan m</td>
									<td>:</td>
									<td><input type="number" min="1" class="form-control" name="m" required="" oninvalid="this.setCustomValidity('Harap di isi !')" oninput="setCustomValidity('')"></td>
									<td width="350px"></td>
									<td></td>
									<td>m > 0 </td>
								</tr>
									<input type="hidden" value="<?php echo $pangkat; ?>" name="pangkat">
									<input type="hidden" value="<?php echo $biaya; ?>" name="biaya">
									<input type="hidden" value="<?php echo $penjualan; ?>" name="penjualan">
									<input type="hidden" value="<?php echo $banyak; ?>" name="banyak">
									<input type="hidden" value="<?php echo $amount; ?>" name="amount">
									<input type="hidden" value="<?php echo $lowestInterval; ?>" name="lowestInterval">
									<input type="hidden" value="<?php echo print base64_encode(serialize($demand)); ?>" name="demand">
									<input type="hidden" value="<?php print base64_encode(serialize($botInterval)); ?>" name="botInterval">
									<input type="hidden" value="<?php print base64_encode(serialize($topInterval)); ?>" name="topInterval">
									<tr>
										<td colspan="2" align="center"><input type="submit" class="btn btn-success" value="Run" style="padding-left: 30px; padding-right: 30px;"></td>
									</tr>
									
							</table>
						</form>
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