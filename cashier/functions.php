<?php
require_once '../koneksi.php';

// Function to fetch cashier settings
function getCashierProfile($conn) {
    $query = "SELECT * FROM user WHERE id = 1001"; 
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return null; // No settings found
    }
}

// function to update user profile
function updateCashierProfile($conn, $data) {
    $id = $data['id'];
    $name = $data['name'];
    $email = $data['email'];
    $phone = $data['phone'];

    // Gunakan prepared statement untuk keamanan
    $stmt = $conn->prepare("UPDATE user SET nama = ?, email = ?, nohp = ? WHERE id = ?");
    $stmt->bind_param("sssi", $name, $email, $phone, $id);

    if ($stmt->execute()) {
        return true; // Update berhasil
    } else {
        return false; // Gagal update
    }
}

// funtions reset password
// function resetPassword($conn, $data){
//     // select from user where id = 1001
//     $query = "SELECT * FROM user WHERE id = 1";
    
//     $result = mysqli_query($conn, $query);
//     if ($result && mysqli_num_rows($result) > 0) {
//         $user = mysqli_fetch_assoc($result);
//     } else {
//         return false; // User not found
//     }

//     $user_id = '1';
//     $current_password = $data['current_password'];
//     $new_password = $data['new_password'];
//     $confirm_password = $data['confirm_password'];
//     // Validasi apakah password baru dan konfirmasi password cocok
//     if ($new_password !== $confirm_password) {
//         echo '<script>console.log("Tidak Sama");</script>';
//         return false; // Password baru dan konfirmasi tidak cocok
//     }
//     // Cek apakah password saat ini cocok
//     if (!password_verify($current_password, $user['password'])) {
//         echo '<script>console.log("Tidak cocok");</script>';
//         return false; // Password saat ini tidak cocok
//     }
//     // Validasi panjang password baru
//     if (strlen($new_password) < 8) {
//         echo '<script>console.log("terlalu pendek");</script>';
//         return false; // Password baru terlalu pendek
//     }


//     // Hash password baru
//     $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

//     // Gunakan prepared statement untuk keamanan
//     $stmt = $conn->prepare("UPDATE user SET password = ? WHERE id = ?");
//     $stmt->bind_param("si", $hashed_password, $user_id);

//     if ($stmt->execute()) {
//         return true; // Update berhasil
//     } else {
//         return false; // Gagal update
//         echo '<script>console.log("GAGAL");</script>';
//     }
// }


function resetPassword($conn, $data){
    $query = "SELECT * FROM user WHERE id = 1";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        $_SESSION['alert'] = [
            'title' => 'Gagal!',
            'text' => 'Pengguna tidak ditemukan.',
            'icon' => 'warning'
        ];
        return false;
    }

    $user_id = 1;
    $current_password = $data['current_password'];
    $new_password = $data['new_password'];
    $confirm_password = $data['confirm_password'];

    // Validasi apakah password baru dan konfirmasi password cocok
    if ($new_password !== $confirm_password) {
        $_SESSION['alert'] = [
            'title' => 'Gagal!',
            'text' => 'Password baru dan konfirmasi password tidak sama.',
            'icon' => 'warning'
        ];
        return false;
    }

    // Cek apakah password saat ini cocok
    if (!password_verify($current_password, $user['password'])) {
        $_SESSION['alert'] = [
            'title' => 'Gagal!',
            'text' => 'Pasword Lama salah!.',
            'icon' => 'warning'
        ];
        return false;
    }

    // Validasi panjang password baru
    if (strlen($new_password) < 8) {
        $_SESSION['alert'] = [
            'title' => 'Gagal!',
            'text' => 'Password baru harus memiliki minimal 8 karakter.',
            'icon' => 'warning'
        ];
        return false;
    }

    // Hash password baru
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Gunakan prepared statement untuk keamanan
    $stmt = $conn->prepare("UPDATE user SET password = ? WHERE id = ?");
    $stmt->bind_param("si", $hashed_password, $user_id);

    if ($stmt->execute()) {
        $_SESSION['alert'] = [
            'title' => 'Berhasil!',
            'text' => 'Password berhasil diubah.',
            'icon' => 'success'
        ];
        return true;
    } else {
        $_SESSION['alert'] = [
            'title' => 'Gagal!',
            'text' => 'Terjadi kesalahan saat menyimpan password baru.',
            'icon' => 'error'
        ];
        return false;
    }
}








?>