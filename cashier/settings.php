<?php

// include functions
require_once './functions.php';


// $lala = '1232';

// $test = '123';
// $hash = password_hash($test, PASSWORD_DEFAULT);

// echo '<script>console.log('. json_encode($hash) .');</script>';

// $cek = password_verify($lala, $hash);
// echo '<script>console.log('. json_encode($cek) .');</script>';


// echo '<script>console.log('. json_encode($get) .');</script>';
// if form with id = update-profile-form is submitted, update profile 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit-profile'])) {
    $update_result = updateCashierProfile($conn, $_POST);
    if ($update_result) {
        $_SESSION['alert'] = [
            'title' => 'Berhasil!',
            'text' => 'Profil berhasil diperbarui.',
            'icon' => 'success'
        ];
    } else {
        $_SESSION['alert'] = [
            'title' => 'Gagal!',
            'text' => 'Profil gagal diperbarui.',
            'icon' => 'error'
        ];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit-resetPass'])) {
    $reset_result = resetPassword($conn, $_POST);
}




$user_profile = getCashierProfile($conn);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foodie - Cashier Settings</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="dashboard-page">
<?php
if (isset($_SESSION['alert'])) {
    $alert = $_SESSION['alert'];
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: '{$alert['title']}',
                text: '{$alert['text']}',
                icon: '{$alert['icon']}',
                confirmButtonText: 'OK'
            });
        });
    </script>
    ";
    unset($_SESSION['alert']);
}
?>
  <aside class="sidebar">
      <div class="sidebar-header">
        <img class="logo" src="../assets/logo/LogoFoodie.png" alt="" srcset="">
          <p class="role">Cashier</p>
      </div>
      
      <nav class="sidebar-nav">
          <ul>
              <li><a href="index.html"><i class="fas fa-home"></i> Dashboard</a></li>
              <li><a href="orders.html"><i class="fas fa-clipboard-list"></i> Orders</a></li>
              <li><a href="transactions.html"><i class="fas fa-receipt"></i> Transactions</a></li>
              <li class="active"><a href="settings.html"><i class="fas fa-cog"></i> Settings</a></li>
          </ul>
      </nav>
      
      <div class="sidebar-footer">
          <div class="user-info">
              <div class="user-avatar">
                  <i class="fas fa-user"></i>
              </div>
              <div class="user-details">
                  <p id="user-name">Cashier Name</p>
                  <p id="user-id">ID: CSH001</p>
              </div>
          </div>
          <a href="../login_cashier.html" id="logout-button" class="logout-button"><i class="fas fa-sign-out-alt"></i> Logout</a>
      </div>
  </aside>
  
  <main class="main-content">
      <header class="dashboard-header">
          <div class="header-left">
              <button id="toggle-sidebar" class="toggle-sidebar">
                  <i class="fas fa-bars"></i>
              </button>
              <h2>Settings</h2>
          </div>
          <div class="header-right">
              <div class="date-time">
                  <span id="current-date">Date</span>
                  <span id="current-time">Time</span>
              </div>
              <div class="notifications">
                  <button id="notification-button" class="notification-button">
                      <i class="fas fa-bell"></i>
                      <span class="notification-badge">3</span>
                  </button>
              </div>
          </div>
      </header>
      
      <div class="dashboard-container">
          <div class="settings-container">
<form action="" method="post" id="update-profile-form">
              <div class="settings-section">
                  <h3>Account Settings</h3>
                  <div class="settings-card">
                      <div class="settings-form">
                          <div class="form-group">
                              <label for="display-name">Nama lengkap</label>
                              <input type="text" id="display-name" value="<?=$user_profile['nama']?>" name="name">
                          </div>
                          <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" id="email" value="<?=$user_profile['email']?>" name="email">
                          </div>
                          <div class="form-group">
                              <label for="phone">Nomor Handphone</label>
                              <input type="tel" id="phone" value="<?=$user_profile['nohp']?>" name="phone">
                          </div>
                            <input type="hidden" name="id" value="<?=$user_profile['id']?>">
                          <button type="submit" class="save-button" name="submit-profile">Save Changes</button>
                      </div>
                  </div>
                </div>
</form>
<form action="" method="post" id="reset-password-form">
              <div class="settings-section">
                  <h3>Change Password</h3>
                  <div class="settings-card">
                      <div class="settings-form">
                          <div class="form-group">
                              <label for="current-password">Current Password</label>
                              <input type="password" id="current-password" name="current_password" required>
                          </div>
                          <div class="form-group">
                              <label for="new-password">New Password</label>
                              <input type="password" id="new-password" name="new_password">
                          </div>
                          <div class="form-group">
                              <label for="confirm-password">Confirm New Password</label>
                              <input type="password" id="confirm-password" name="confirm_password">
                          </div>
                          <button class="save-button" name="submit-resetPass">Change Password</button>
                      </div>
                  </div>
              </div>
</form>
          </div>
      </div>
  </main>
  
  <!-- <script src="../js/cashier-settings.js"></script> -->
</body>
</html>

