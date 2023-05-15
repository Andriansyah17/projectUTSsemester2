<?php
require_once('../database/dbkoneksi.php');
// variable id nama stok harga merk_id deskripsi img
$_nama = $_POST['nama'];
$_stok = $_POST['stok'];
$_harga = $_POST['harga'];
$_merk_id = $_POST['merk_id'];
$_deskripsi = $_POST['deskripsi'];
// add img
$_img2 = $_FILES['img']['name'];
$_img_lama = $_POST['img_lama'];
$_tmp = $_FILES['img']['tmp_name'];
$_path = "../assets/produk/";
move_uploaded_file($_tmp, $_path . $_img2);
if ($_img2 == "") {
    $_img = $_img_lama;
} else {
    $_img = $_img2;
}

$_proses = $_POST['proses'];

// array data
$ar_data[] = $_nama;
$ar_data[] = $_stok;
$ar_data[] = $_harga;
$ar_data[] = $_merk_id;
$ar_data[] = $_deskripsi;
$ar_data[] = $_img;


if ($_proses == "Simpan") {
    // data baru
    $sql = "INSERT INTO produk (nama, stok, harga, merk_id, deskripsi, img) VALUES (?,?,?,?,?,?)";
} else if ($_proses == "Update") {
    $ar_data[] = $_POST['id']; // ? 8
    $sql = "UPDATE produk SET nama=?, stok=?, harga=?, merk_id=?, deskripsi=?, img=? WHERE id=?";
}
if (isset($sql)) {
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}
echo "<script>alert('Data berhasil di $_proses');location.href='produk.php';</script>";
