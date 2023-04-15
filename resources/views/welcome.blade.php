<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand">Simple POS APP Metode FIFO</a>
            @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-white text-decoration-none">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-white text-decoration-none">Log in</a>
                    @endauth
                </div>
            @endif
        </div>
    </nav>
    <div class="text-center">
        <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
          width="200px" alt="profile">
      </div>
    <div class="container">
        <center>

            <h2>Dasar Sistem</h2>
            <div class="row">
                <div class="col"></div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <h3>Sistem POS</h3>
                            <p>Point of Sales merupakan sistem terkomputerisasi yang menggabungkan perangkat lunak dan keras untuk menyelesaikan kegiatan jual beli. Sistem ini digunakan untuk membuat kegiatan transaksi menjadi lebih mudah dan praktis</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <h3>Metode FIFO</h3>
                            <p>Metode Persediaan First In First Out (FIFO)
                                Secara mudahnya, persediaan barang yang masuk pertama kali ke dalam toko akan langsung dijual paling awal. Metode ini terus berlanjut sampai masuk stok barang terakhir, di mana barang tersebut nantinya yang akan dijual paling akhir.</p>
                        </div>
                    </div>
                </div>
                <div class="col"></div>
            </div>
            <hr>
            <h2>Kerangka Web</h2>
            <div class="row">
                <div class="col"></div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <h3>Laravel</h3>
                            <p>Laravel adalah kerangka kerja aplikasi web berbasis PHP yang sumber terbuka, menggunakan konsep Model-View-Controller (MVC). Laravel berada dibawah lisensi MIT, dengan menggunakan GitHub sebagai tempat berbagi kode.</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <h3>Bootstrap</h3>
                            <p>Bootstrap adalah kerangka kerja CSS yang sumber terbuka dan bebas untuk merancang situs web dan aplikasi web. Kerangka kerja ini berisi templat desain berbasis HTML dan CSS untuk tipografi, formulir, tombol, navigasi, dan komponen antarmuka lainnya, serta juga ekstensi opsional JavaScript.</p>
                        </div>
                    </div>
                </div>
                <div class="col"></div>
            </div>
        </div>
        <hr>
        </center>

        <footer>
            <p class="text-center mt-3">Created With &hearts; Snafcat</p>
        </footer>

</body>

</html>
