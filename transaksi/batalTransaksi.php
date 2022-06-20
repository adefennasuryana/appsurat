<?php
    include "koneksi.php";
    $kd_pinjam = $_POST['kd_pinjam'];

    $sql = "DELETE FROM detail_pinjam WHERE kd_pinjam = '$kd_pinjam'";
    mysql_query($sql);

?>