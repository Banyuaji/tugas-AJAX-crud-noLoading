<?php 
    session_start();
    include 'connection.php';

    $id = $_POST['id'];

    $query = "DELETE FROM `tbl_siswa_search` WHERE id=?";
    $prepare1 = $db1->prepare($query);
    $prepare1->bind_param("i", $id);
    $prepare1->execute();

    echo json_encode(['success' => "Sukses"]);
    $db->close();
