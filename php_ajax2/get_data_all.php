<?php
    session_start();
    include 'connection.php';

    $id = $_POST['id'];
    $query = "SELECT * FROM `tbl_siswa_search` WHERE id=? ORDER BY `id`";
    $prepare1 = $db1->prepare($query);
    $prepare1->bind_param('i', $id);
    $prepare1->execute();
    $res1 = $prepare1->get_result();
    while ($row = $res1->fetch_assoc()) {
        $h['id'] = $row['id'];
        $h['nama_siswa'] = $row['nama_siswa'];
        $h['alamat'] = $row['alamat'];
        $h['jurusan'] = $row['jurusan'];
        $h['jenis_kelamin'] = $row['jenis_kelamin'];
        $h['tgl_masuk'] = $row['tgl_masuk'];
    }
    echo json_encode($h);
    $db1->close();
