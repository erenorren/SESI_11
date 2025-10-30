<?php
require_once "config/Database.php";
require_once "classes/Mahasiswa.php";

$db = new Database();
$mhs = new Mahasiswa(db: $db->getConnection());
$data = $mhs->readAll(); 
?>

<!DOCTYPE html>
<html>
    <head><tittle>Data Mahasiswa</tittle></head>
    <body>
        <h2>Data Mahasiswa</h2>
        <a href="tambah.php"> Tambah Data</a><br><nr>
        <table border="1" cellpadding="8">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>jurusan</th>
                <th>Aksi</th>
            </tr>
            <?php while ($row = $data->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?=$row['id']?></td>
                <td><?=$row['nama']?></td>
                <td><?=$row['nim']?></td>
                <td><?=$row['jurusan']?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id']?>"> Edit</a>
                    <a href="hapus.php?id=<?= $row['id']?>" onclick="return confir('Yakin ingin hapus?')">Hapus</a>
                </td>
            </tr>  
            <?php endwhile; ?>
        </table>
    </body>
</html>        
    