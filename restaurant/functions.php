<?php
require_once __DIR__ . '/../koneksi.php';

function upload_item_image($file) {
    $target_dir = __DIR__ . '/../assets/img/';
    $allowed_types = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];
    $max_size = 2 * 1024 * 1024; // 2MB

    if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
        return ['success' => false, 'error' => 'Gambar tidak diupload atau terjadi error.'];
    }

    if (!in_array($file['type'], $allowed_types)) {
        return ['success' => false, 'error' => 'Tipe file tidak didukung.'];
    }

    if ($file['size'] > $max_size) {
        return ['success' => false, 'error' => 'Ukuran file terlalu besar (maks 2MB).'];
    }

    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $random_name = uniqid('img_', true) . '.' . strtolower($ext);
    $target_file = $target_dir . $random_name;

    if (!move_uploaded_file($file['tmp_name'], $target_file)) {
        return ['success' => false, 'error' => 'Gagal menyimpan file gambar.'];
    }

    return ['success' => true, 'filename' => $random_name];
}

function insert_item($kategori_menu_id, $nama_item, $harga_item, $foto_item, $deskripsi) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO item (kategori_menu_id, nama_item, harga_item, foto_item, deskripsi) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        return ['success' => false, 'error' => 'Gagal menyiapkan statement: ' . $conn->error];
    }
    $stmt->bind_param('isdss', $kategori_menu_id, $nama_item, $harga_item, $foto_item, $deskripsi);
    if ($stmt->execute()) {
        return ['success' => true, 'id' => $stmt->insert_id];
    } else {
        return ['success' => false, 'error' => 'Gagal insert item: ' . $stmt->error];
    }
}

function get_kategori_menu() {
    global $conn;
    $result = $conn->query("SELECT id, nama_kategori FROM kategori_menu ORDER BY nama_kategori ASC");
    $kategori = [];
    while ($row = $result->fetch_assoc()) {
        $kategori[] = $row;
    }
    return $kategori;
}

function getAllCategories() {
    global $conn;
    $result = $conn->query("SELECT id, nama_kategori FROM kategori_menu ORDER BY nama_kategori ASC");
    $kategori = [];
    while ($row = $result->fetch_assoc()) {
        $kategori[] = $row;
    }
    return $kategori;
}

function addCategory($nama_kategori) {
    global $conn;
    $nama_kategori = trim($nama_kategori);
    if ($nama_kategori === '') {
        return ['success' => false, 'error' => 'Nama kategori tidak boleh kosong.'];
    }
    // Cek duplikat
    $stmt = $conn->prepare("SELECT COUNT(*) FROM kategori_menu WHERE nama_kategori = ?");
    $stmt->bind_param('s', $nama_kategori);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    if ($count > 0) {
        return ['success' => false, 'error' => 'Kategori sudah ada.'];
    }
    $stmt = $conn->prepare("INSERT INTO kategori_menu (nama_kategori) VALUES (?)");
    if (!$stmt) {
        return ['success' => false, 'error' => 'Gagal menyiapkan statement: ' . $conn->error];
    }
    $stmt->bind_param('s', $nama_kategori);
    if ($stmt->execute()) {
        return ['success' => true, 'id' => $stmt->insert_id];
    } else {
        return ['success' => false, 'error' => 'Gagal menambah kategori: ' . $stmt->error];
    }
}

function updateCategory($id, $nama_kategori) {
    global $conn;
    $nama_kategori = trim($nama_kategori);
    if ($nama_kategori === '') {
        return ['success' => false, 'error' => 'Nama kategori tidak boleh kosong.'];
    }
    // Cek duplikat (kecuali dirinya sendiri)
    $stmt = $conn->prepare("SELECT COUNT(*) FROM kategori_menu WHERE nama_kategori = ? AND id != ?");
    $stmt->bind_param('si', $nama_kategori, $id);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    if ($count > 0) {
        return ['success' => false, 'error' => 'Kategori sudah ada.'];
    }
    $stmt = $conn->prepare("UPDATE kategori_menu SET nama_kategori = ? WHERE id = ?");
    if (!$stmt) {
        return ['success' => false, 'error' => 'Gagal menyiapkan statement: ' . $conn->error];
    }
    $stmt->bind_param('si', $nama_kategori, $id);
    if ($stmt->execute()) {
        return ['success' => true];
    } else {
        return ['success' => false, 'error' => 'Gagal update kategori: ' . $stmt->error];
    }
}

function deleteCategory($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM kategori_menu WHERE id = ?");
    if (!$stmt) {
        return ['success' => false, 'error' => 'Gagal menyiapkan statement: ' . $conn->error];
    }
    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
        return ['success' => true];
    } else {
        return ['success' => false, 'error' => 'Gagal hapus kategori: ' . $stmt->error];
    }
}

function getAllItems() {
    global $conn;
    $sql = "SELECT item.*, kategori_menu.nama_kategori FROM item LEFT JOIN kategori_menu ON item.kategori_menu_id = kategori_menu.id ORDER BY item.id DESC";
    $result = $conn->query($sql);
    $items = [];
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
    return $items;
}

function getItemsByCategory($kategori_id) {
    global $conn;
    $kategori_id = intval($kategori_id);
    $sql = "SELECT item.*, kategori_menu.nama_kategori FROM item LEFT JOIN kategori_menu ON item.kategori_menu_id = kategori_menu.id WHERE item.kategori_menu_id = ? ORDER BY item.id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $kategori_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $items = [];
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
    return $items;
}
