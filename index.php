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
        <div class="panel panel-primary">
                    <div class="panel-heading">Input Data Permintaan</div>
                        <div class="panel-body">
                            <?php if(empty($_POST)): ?>
                            <div class="input-group">
                                <form action="prediksi_permintaan.php" method="post">
                                    <table class="custom-padding-table">
                                        <tr>
                                            <td>Masukan jumlah data</td>
                                            <td>:</td>
                                            <td><input type="number" min="0" name="jumlah" class="form-control" required="" oninvalid="this.setCustomValidity('Harap di isi !')" oninput="setCustomValidity('')"></td>
                                            <div class="input-group-btn">
                                            <td><input type="submit" value="Ok" class="btn btn-success"></td>
                                            </div>
                                    </table>
                                </form>
                            </div>
                            <?php else: ?>
                                <?php $banyak = $_POST['jumlah'];?>
                                    <?php if(!empty($banyak)): ?>
                                    <div class="input-group">
                                      <form action="proses_prediksi_permintaan.php" method="post">
                                        <div class="table table-responsive">
                                          <table class="table table-hover custom-table-header">
                                                  <tr>
                                                    <th>Permintaan</th>
                                                    <th>Frekuensi</th>
                                                  <tr>
                                            <?php for($i=0; $i<$banyak; $i++): ?>
                                                  <tr>
                                                      <td><input type=number min=0 name=demand[] placeholder="0" class="form-control" required="" oninvalid="this.setCustomValidity('Harap di isi !')" oninput="setCustomValidity('')"></td>
                                                      <td><input type=number min=1 name=freq[] placeholder="0" class="form-control" required="" oninvalid="this.setCustomValidity('Harap di isi !')" oninput="setCustomValidity('')"></td>
                                                  </tr>
                                            <?php endfor; ?>
                                          </table>
                                          <table class="table table-hover custom-table-header">
                                                  <tr>
                                                    <th>Biaya Produksi / Unit</th>
                                                    <th>Harga Penjualan / Unit</th>
                                                  <tr>
                                                  <tr>
                                                      <td><input type=number min=1 name="biaya" placeholder="0" class="form-control" required="" oninvalid="this.setCustomValidity('Harap di isi !')" oninput="setCustomValidity('')"></td>
                                                      <td><input type=number min=1 name="penjualan" placeholder="0" class="form-control" required="" oninvalid="this.setCustomValidity('Harap di isi !')" oninput="setCustomValidity('')"></td>
                                                  </tr>
                                          </table>
                                          <div class="input-group-btn">
                                            <input type="hidden" name="jumlah" value="<?php echo $banyak; ?>">
                                            <center><input type="submit" value="Hitung" name="submit" class="btn btn-success" style="padding-left: 30px; padding-right: 30px;"></center>
                                          </div>
                                        </div>
                                      </form>
                                    </div>
                                    <?php endif; ?>
                            <?php endif; ?>
                                    </div>
        </div>  
			</div>
        </div>
        <!-- akhir bagian konten Blog -->
    </div>

</body>

</html>