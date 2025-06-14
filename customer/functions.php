<?php

require_once '../koneksi.php';

function getItemData($conn) {
  
    $query = "
    SELECT * FROM item
    JOIN kategori_menu ON kategori_menu.id = item.kategori_menu_id
    JOIN merchant ON merchant.id = kategori_menu.merchant_id
    JOIN foodcourt ON foodcourt.id = merchant.foodcourt_id
    WHERE foodcourt.id = 1
    ";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC); 
    } else {
        return null; // No settings found
    }
}

function search($conn, $data) {
    $keyword = $data['search-input'];
    $keyword = mysqli_real_escape_string($conn, $keyword);

    $query = "
    SELECT *
    FROM item
    JOIN kategori_menu ON kategori_menu.id = item.kategori_menu_id
    JOIN merchant ON merchant.id = kategori_menu.merchant_id
    JOIN foodcourt ON foodcourt.id = merchant.foodcourt_id
    WHERE foodcourt.id = 1 AND (
        item.nama_item LIKE '%$keyword%' OR
        kategori_menu.nama_kategori LIKE '%$keyword%' OR
        merchant.nama_merchant LIKE '%$keyword%'
    )
    ";
    
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return [];
    }
}


function formatRupiah($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}