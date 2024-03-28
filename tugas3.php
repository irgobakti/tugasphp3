<?php
// Data mahasiswa
$nilai_mahasiswa = [
    ['nim' => '001', 'nama' => 'Agus', 'nilai' => 75],
    ['nim' => '002', 'nama' => 'Budi', 'nilai' => 85],
    ['nim' => '003', 'nama' => 'Citra', 'nilai' => 60],
    ['nim' => '004', 'nama' => 'Dewi', 'nilai' => 70],
    ['nim' => '005', 'nama' => 'Eko', 'nilai' => 50],
    ['nim' => '006', 'nama' => 'Fajar', 'nilai' => 90],
    ['nim' => '007', 'nama' => 'Gita', 'nilai' => 55],
    ['nim' => '008', 'nama' => 'Hani', 'nilai' => 80],
    ['nim' => '009', 'nama' => 'Indra', 'nilai' => 65],
    ['nim' => '010', 'nama' => 'Joko', 'nilai' => 95],
    ['nim' => '011', 'nama' => 'Kartika', 'nilai' => 72],
    ['nim' => '012', 'nama' => 'Lukman', 'nilai' => 68],
    ['nim' => '013', 'nama' => 'Mega', 'nilai' => 78],
    ['nim' => '014', 'nama' => 'Nina', 'nilai' => 63],
    ['nim' => '015', 'nama' => 'Oscar', 'nilai' => 58],
    ['nim' => '016', 'nama' => 'Putri', 'nilai' => 82],
    ['nim' => '017', 'nama' => 'Rudi', 'nilai' => 88],
    ['nim' => '018', 'nama' => 'Sari', 'nilai' => 67],
    ['nim' => '019', 'nama' => 'Tono', 'nilai' => 73],
    ['nim' => '020', 'nama' => 'Ulfa', 'nilai' => 91]
];

// Fungsi untuk mendapatkan grade
function getGrade($nilai)
{
    if ($nilai >= 85) {
        return 'A';
    } elseif ($nilai >= 75) {
        return 'B';
    } elseif ($nilai >= 65) {
        return 'C';
    } elseif ($nilai >= 50) {
        return 'D';
    } else {
        return 'E';
    }
}

// Fungsi untuk mendapatkan predikat
function getPredikat($grade)
{
    switch ($grade) {
        case 'A':
            return 'Memuaskan';
            break;
        case 'B':
            return 'Bagus';
            break;
        case 'C':
            return 'Cukup';
            break;
        case 'D':
            return 'Kurang';
            break;
        default:
            return 'Buruk';
            break;
    }
}

// Inisialisasi variabel untuk agregat
$jumlah_nilai = array_column($nilai_mahasiswa, 'nilai');
$nilai_tertinggi = max($jumlah_nilai);
$nilai_terendah = min($jumlah_nilai);
$jumlah_mahasiswa = count($nilai_mahasiswa);
$jumlah_keseluruhan_nilai = array_sum($jumlah_nilai);
$nilai_rata_rata = $jumlah_keseluruhan_nilai / $jumlah_mahasiswa;

// Menghitung jumlah mahasiswa yang lulus
$jumlah_lulus = 0;
foreach ($nilai_mahasiswa as $mahasiswa) {
    if ($mahasiswa['nilai'] >= 65) {
        $jumlah_lulus++;
    }
}

// Keterangan
$keterangan = [
    'Nilai Tertinggi' => $nilai_tertinggi,
    'Nilai Terendah' => $nilai_terendah,
    'Nilai Rata-rata' => number_format($nilai_rata_rata, 2),
    'Jumlah Mahasiswa' => $jumlah_mahasiswa,
    'Jumlah Keseluruhan Nilai' => $jumlah_keseluruhan_nilai,
    'Status Lulus' => $nilai_rata_rata >= 65 ? 'Lulus' : 'Tidak Lulus',
    'Jumlah Lulus' => $jumlah_lulus
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Nilai Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h3 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        thead {
            background-color: #007bff;
            color: #fff;
        }

        th:first-child,
        td:first-child {
            text-align: center;
        }

        tfoot {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        p {
            text-align: center;
            margin-top: 20px;
            color: #777;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        footer p {
            margin: 0;
        }

        @media (max-width: 768px) {
            .container {
                width: 95%;
            }
        }

        #keterangan-table {
            margin-top: 30px;
            width: 50%;
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
        }

        #keterangan-table th,
        #keterangan-table td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        #keterangan-table th {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3>Daftar Nilai Mahasiswa</h3>
        <table>
            <thead>

                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Nilai</th>
                    <th>Grade</th>
                    <th>Predikat</th>
                    <th>Status Lulus</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($nilai_mahasiswa as $mahasiswa) {
                    $grade = getGrade($mahasiswa['nilai']);
                    $predikat = getPredikat($grade);
                    $status_lulus = $mahasiswa['nilai'] >= 65 ? 'Lulus' : 'Tidak Lulus';
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $mahasiswa['nim'] ?></td>
                        <td><?= $mahasiswa['nama'] ?></td>
                        <td><?= $mahasiswa['nilai'] ?></td>
                        <td><?= $grade ?></td>
                        <td><?= $predikat ?></td>
                        <td><?= $status_lulus ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <?php foreach ($keterangan as $ket => $hasil) { ?>
                    <tr>
                        <th colspan="6"><?= $ket ?></th>
                        <th><?= $hasil ?></th>
                    </tr>
                <?php } ?>
            </tfoot>
        </table>
        <p>&copy; 2024 Irgo Satria Bakti</p>
    </div>
    <footer>
        <p>&copy; 2024 Irgo Satria Bakti</p>
    </footer>
</body>

</html>