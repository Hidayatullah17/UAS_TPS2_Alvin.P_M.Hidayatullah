<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['namaUser'])) {
    echo "<script>window.location.replace(\"index.php\");</script>";
    exit();
}

$idMenu = 23;
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google" value="notranslate">
    <meta name="robots" content="nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sangkuriang">
    <meta name="author" content="Diah Nur & Sulis Setyo">
    <link rel="icon" href="alat2/uniga.ico">

    <title>Sangkuriang</title>

    <link rel="stylesheet" href="alat2/styles.css">
    <link rel="stylesheet" href="alat2/all.min.css">
    <script src="alat2/all.min.js"></script>
</head>

<body class="sb-nav-fixed" onload="window.print()">
    <div id="layoutSidenav">

        <div id="layoutSidenav_content">
            <div class="row">
                <div class="col-4">
                    <img src="alat2/sangkuriang.png" alt="" class="img-fluid m-4" width="100">
                </div>
                <div class="col-8 text-end">
                    <h4 class="mt-4 text-end">Honor Pengajar</h4>
                    <span class="text-start">Tgl Cetak: <?= date("d F Y") ?></span>
                </div>
            </div>
            <main>
                <div class="container-fluid px-4">
                    <form method="post" action="gunoraksi.php">
                        <?php 
                            $st = "SELECT
    t_tari.nama,
    t_guru.nama,
    t_sista.no_regis,
    t_sista.nama_siswa
FROM
    t_guri
INNER JOIN
    t_sista ON t_guri.idTari = t_sista.kode_tari
INNER JOIN
    t_guru ON t_guri.idGuru = t_guru.ID
INNER JOIN
    t_tari ON t_guri.idTari = t_tari.kode
WHERE
    t_guru.nama = 'Nuni Nuraeni'";

                            $qrySS = mysqli_query($conSS, $st);

                            $nmr = 1;
                        ?>

                <div class="row">
                    <div class="col-4">
                    <h4 class="mt-4">Tarian : </h4>
                    <span class="text-start"></span>
                </div>
                    
                </div>
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <td class="text-center">No.</td>
                                    <td>NIP.</td>
                                    <td class="text-center">Nama Peserta</td>
                                    <td class="text-center" colspan="7">Tanda Tangan</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                while ($data = mysqli_fetch_array($qrySS)) : ?>
                                    <tr>
                                        <td class="text-center"><?= $nmr++; ?></td>
                                        <td class="text-center"><?= $data['no_regis']; ?></th>
                                        <td class="text-start"><?= $data['nama_siswa']; ?></th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                    </tr>
                                <?php endwhile; ?>
                                
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </form>
                </div>
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-item-center justify-content-between small">
                        <div class="text-muted">&copy; 2024 Alvin Putra & Hidayatullah</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="alat2/bootstrap.bundle.min.js"></script>
    <script src="alat2/scripts.js"></script>
    <script>
    </script>
</body>
</html>