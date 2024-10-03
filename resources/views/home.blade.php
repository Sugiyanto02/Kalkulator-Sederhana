<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KulKids</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .btn-lg-custom span {
            display: block;
            /* Pastikan setiap elemen berada di baris yang terpisah */
        }

        .btn-lg-custom span:first-child {
            font-size: 1.5rem;
            /* Ukuran yang lebih besar untuk teks pertama */
        }

        .btn-lg-custom span:last-child {
            font-size: 1.2rem;
            /* Ukuran yang lebih kecil untuk teks kedua */
        }

        .btn-lg-custom hr {
            width: 50%;
            /* Atur lebar hr */
            margin: 0.25rem auto;
            /* Rapatkan sedikit spasi */
        }
    </style>
</head>

<body>
    <nav class="navbar bg-primary p-0">
        <div class="container">
            <a class="navbar-brand position-relative top-0 start-50 translate-middle-x fw-bold fs-1 text-dark"
                href="#">KulKids</a>
        </div>
    </nav>
    <div class="body p-5 text-center">
        <h1 class="operation fw-bold pt-2">Pilih Operasi</h1>
        <h1 class="fw-bold p-2">(Select Operation)</h1>
    </div>

    <div class="container p-1">
        <div class="row justify-content-center text-center">
            <!-- Baris pertama dengan 2 tombol -->
            <div class="col-5">
                <a href="{{ route('operation', ['operation' => 'addition']) }}"
                    class="btn btn-primary btn-lg m-2 text-dark text-decoration-none d-flex align-items-center justify-content-center fw-bold fs-2 btn-lg-custom"
                    style="height: 120px;">
                    Pertambahan<br>(Addition)
                </a>
            </div>
            <div class="col-5">
                <a href="{{ route('operation', ['operation' => 'subtraction']) }}"
                    class="btn btn-primary btn-lg m-2 text-dark text-decoration-none d-flex align-items-center justify-content-center fw-bold fs-2 btn-lg-custom"
                    style="height: 120px;">
                    Pengurangan<br>(Subtraction)
                </a>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            <!-- Baris kedua dengan 2 tombol -->
            <div class="col-5">
                <a href="{{ route('operation', ['operation' => 'multiplication']) }}"
                    class="btn btn-primary btn-lg m-2 text-dark text-decoration-none d-flex align-items-center justify-content-center fw-bold fs-2 btn-lg-custom"
                    style="height: 120px;">
                    Perkalian<br>(Multiplication)
                </a>
            </div>
            <div class="col-5">
                <a href="{{ route('operation', ['operation' => 'division']) }}"
                    class="btn btn-primary btn-lg m-2 text-dark text-decoration-none d-flex align-items-center justify-content-center fw-bold fs-2 btn-lg-custom"
                    style="height: 120px;">
                    Pembagian<br>(Division)
                </a>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
