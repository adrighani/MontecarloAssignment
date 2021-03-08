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
                    <a href="http://localhost/MonteCarloSim-master">Home</a>
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

			</div>
        </div>
        <!-- akhir bagian konten Blog -->
    </div>

</body>

</html>