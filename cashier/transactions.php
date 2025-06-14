<?php 
require_once '../koneksi.php';
require_once './functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foodie - Cashier Transactions</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body class="dashboard-page">
  <aside class="sidebar">
      <div class="sidebar-header">
        <img class="logo" src="../assets/logo/LogoFoodie.png" alt="" srcset="">
          <p class="role">Cashier</p>
      </div>
      
      <nav class="sidebar-nav">
          <ul>
              <li><a href="index.html"><i class="fas fa-home"></i> Dashboard</a></li>
              <li><a href="orders.html"><i class="fas fa-clipboard-list"></i> Orders</a></li>
              <li class="active"><a href="transactions.html"><i class="fas fa-receipt"></i> Transactions</a></li>
              <li><a href="settings.html"><i class="fas fa-cog"></i> Settings</a></li>
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
              <h2>Transactions</h2>
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
          <div class="stats-cards">
              <div class="stat-card">
                  <div class="stat-icon">
                      <i class="fas fa-money-bill-wave"></i>
                  </div>
                  <div class="stat-info">
                      <h3>Today's Revenue</h3>
                      <p id="today-revenue">Rp 2,450,000</p>
                  </div>
              </div>
              
              <div class="stat-card">
                  <div class="stat-icon">
                      <i class="fas fa-receipt"></i>
                  </div>
                  <div class="stat-info">
                      <h3>Today's Transactions</h3>
                      <p id="today-transactions">23</p>
                  </div>
              </div>
              
              <div class="stat-card">
                  <div class="stat-icon">
                      <i class="fas fa-credit-card"></i>
                  </div>
                  <div class="stat-info">
                      <h3>Digital Payments</h3>
                      <p id="digital-payments">18</p>
                  </div>
              </div>
              
              <div class="stat-card">
                  <div class="stat-icon">
                      <i class="fas fa-hand-holding-usd"></i>
                  </div>
                  <div class="stat-info">
                      <h3>Cash Payments</h3>
                      <p id="cash-payments">5</p>
                  </div>
              </div>
          </div>
          
          <div class="transactions-filter">
              <div class="filter-section">
                  <div class="filter-tabs">
                      <button class="filter-tab active" data-payment="all">All Payments</button>
                      <button class="filter-tab" data-payment="qris">QRIS</button>
                      <button class="filter-tab" data-payment="gopay">GoPay</button>
                      <button class="filter-tab" data-payment="dana">DANA</button>
                      <button class="filter-tab" data-payment="cash">Cash</button>
                  </div>
                  <div class="search-filter">
                      <input type="text" id="transaction-search" placeholder="Search by transaction ID...">
                      <button id="search-button"><i class="fas fa-search"></i></button>
                  </div>
              </div>
              <div class="date-filter">
                  <label for="date-from">From:</label>
                  <input type="date" id="date-from">
                  <label for="date-to">To:</label>
                  <input type="date" id="date-to">
                  <button id="filter-button" class="filter-button">Apply Filter</button>
              </div>
          </div>
          
          <div class="transactions-table-container">
              <table class="table table-bordered">
                  <thead>
                      <tr>
                          <th>Transaction ID</th>
                          <th>Order ID</th>
                          <th>Date & Time</th>
                          <th>Payment Method</th>
                          <th>Amount</th>
                          <th>Status</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody id="transactions-table-body">
                      <!-- Transactions will be populated via JavaScript -->
                      <tr>
                          <td>TRX12345</td>
                          <td>ORD12345</td>
                          <td>March 27, 2024 15:45 PM</td>
                          <td>QRIS</td>
                          <td>Rp 125,000</td>
                          <td><span class="status-badge completed">Completed</span></td>
                          <td>
                              <button class="action-button view-button"><i class="fas fa-eye"></i></button>
                              <button class="action-button print-button"><i class="fas fa-print"></i></button>
                          </td>
                      </tr>
                      <tr>
                          <td>TRX12346</td>
                          <td>ORD12346</td>
                          <td>May 15, 2023 10:50 AM</td>
                          <td>GoPay</td>
                          <td>Rp 78,000</td>
                          <td><span class="status-badge completed">Completed</span></td>
                          <td>
                              <button class="action-button view-button"><i class="fas fa-eye"></i></button>
                              <button class="action-button print-button"><i class="fas fa-print"></i></button>
                          </td>
                      </tr>
                      <tr>
                          <td>TRX12347</td>
                          <td>ORD12347</td>
                          <td>May 15, 2023 11:20 AM</td>
                          <td>DANA</td>
                          <td>Rp 156,000</td>
                          <td><span class="status-badge completed">Completed</span></td>
                          <td>
                              <button class="action-button view-button"><i class="fas fa-eye"></i></button>
                              <button class="action-button print-button"><i class="fas fa-print"></i></button>
                          </td>
                      </tr>
                      <tr>
                          <td>TRX12349</td>
                          <td>ORD12350</td>
                          <td>May 15, 2023 12:15 PM</td>
                          <td>Cash</td>
                          <td>Rp 95,000</td>
                          <td><span class="status-badge completed">Completed</span></td>
                          <td>
                              <button class="action-button view-button"><i class="fas fa-eye"></i></button>
                              <button class="action-button print-button"><i class="fas fa-print"></i></button>
                          </td>
                      </tr>
                  </tbody>
              </table>
          </div>
          
          <div class="pagination">
              <button class="pagination-button" disabled><i class="fas fa-chevron-left"></i></button>
              <button class="pagination-button active">1</button>
              <button class="pagination-button">2</button>
              <button class="pagination-button">3</button>
              <button class="pagination-button"><i class="fas fa-chevron-right"></i></button>
          </div>
      </div>
  </main>
  
  <div id="transaction-detail-modal" class="modal">
      <div class="modal-content">
          <div class="modal-header">
              <h2>Transaction Details</h2>
              <span class="close-modal">&times;</span>
          </div>
          <div class="modal-body">
              <div class="transaction-detail-header">
                  <div class="transaction-id-date">
                      <p>Transaction #<span id="detail-transaction-id"></span></p>
                      <p id="detail-transaction-date"></p>
                  </div>
                  <div class="transaction-status">
                      <span id="detail-transaction-status"></span>
                  </div>
              </div>
              
              <div class="order-detail">
                  <h3>Order Information</h3>
                  <div class="detail-row">
                      <strong>Order ID:</strong> <span id="detail-order-id"></span>
                  </div>
                  <div class="detail-row">
                      <strong>Table:</strong> <span id="detail-table-id"></span>
                  </div>
                  <div class="detail-row">
                      <strong>Items:</strong> <span id="detail-items-count"></span>
                  </div>
              </div>
              
              <div class="customer-detail">
                  <h3>Customer Information</h3>
                  <div class="detail-row">
                      <strong>Name:</strong> <span id="detail-customer-name"></span>
                  </div>
                  <div class="detail-row">
                      <strong>Phone:</strong> <span id="detail-customer-phone"></span>
                  </div>
                  <div class="detail-row">
                      <strong>Email:</strong> <span id="detail-customer-email"></span>
                  </div>
              </div>
              
              <div class="payment-detail">
                  <h3>Payment Information</h3>
                  <div class="detail-row">
                      <strong>Payment Method:</strong> <span id="detail-payment-method"></span>
                  </div>
                  <div class="detail-row">
                      <strong>Amount:</strong> <span id="detail-amount"></span>
                  </div>
                  <div class="detail-row">
                      <strong>Payment Time:</strong> <span id="detail-payment-time"></span>
                  </div>
              </div>
              
              <div class="transaction-actions">
                  <button id="print-receipt-button" class="action-button large">Print Receipt</button>
              </div>
          </div>
      </div>
  </div>
  
  <script src="../js/cashier-transactions.js"></script>
</body>
</html>

