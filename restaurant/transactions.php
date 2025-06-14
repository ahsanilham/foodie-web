<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foodie - Restaurant Transactions</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="dashboard-page restaurant-dashboard">
  <aside class="sidebar">
      <div class="sidebar-header">
        <img class="logo" src="../assets/logo/LogoFoodie.png" alt="" srcset="">
        <p class="role">Restaurant</p>
          <p id="restaurant-name" class="restaurant-name">Bakso Pak Agus</p>
      </div>
      
      <nav class="sidebar-nav">
          <ul>
              <li><a href="index.html"><i class="fas fa-home"></i> Dashboard</a></li>
              <li><a href="orders.html"><i class="fas fa-clipboard-list"></i> Orders</a></li>
              <li><a href="menu.html"><i class="fas fa-utensils"></i> Menu</a></li>
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
                  <p id="user-name">Restaurant Manager</p>
                  <p id="user-id">ID: RST001</p>
              </div>
          </div>
          <a href="../login_restaurant.html" id="logout-button" class="logout-button"><i class="fas fa-sign-out-alt"></i> Logout</a>
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
                      <span class="notification-badge">5</span>
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
                      <p id="today-revenue">Rp 1,250,000</p>
                  </div>
              </div>
              
              <div class="stat-card">
                  <div class="stat-icon">
                      <i class="fas fa-receipt"></i>
                  </div>
                  <div class="stat-info">
                      <h3>Today's Transactions</h3>
                      <p id="today-transactions">15</p>
                  </div>
              </div>
              
              <div class="stat-card">
                  <div class="stat-icon">
                      <i class="fas fa-utensils"></i>
                  </div>
                  <div class="stat-info">
                      <h3>Items Sold Today</h3>
                      <p id="items-sold">42</p>
                  </div>
              </div>
              
              <div class="stat-card">
                  <div class="stat-icon">
                      <i class="fas fa-chart-line"></i>
                  </div>
                  <div class="stat-info">
                      <h3>Avg. Order Value</h3>
                      <p id="avg-order-value">Rp 83,333</p>
                  </div>
              </div>
          </div>
          
          <div class="transactions-filter">
              <div class="filter-section">
                  <div class="filter-tabs">
                      <button class="filter-tab active" data-period="today">Today</button>
                      <button class="filter-tab" data-period="week">This Week</button>
                      <button class="filter-tab" data-period="month">This Month</button>
                      <button class="filter-tab" data-period="custom">Custom</button>
                  </div>
                  <div class="search-filter">
                      <input type="text" id="transaction-search" placeholder="Search by order ID...">
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
              <table class="transactions-table">
                  <thead>
                      <tr>
                          <th>Order ID</th>
                          <th>Date & Time</th>
                          <th>Table</th>
                          <th>Items</th>
                          <th>Amount</th>
                          <th>Status</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody id="transactions-table-body">
                      <!-- Transactions will be populated via JavaScript -->
                      <tr>
                          <td>ORD12345</td>
                          <td>May 15, 2023 10:35 AM</td>
                          <td>A1</td>
                          <td>3 items</td>
                          <td>Rp 125,000</td>
                          <td><span class="status-badge completed">Completed</span></td>
                          <td>
                              <button class="action-button view-button"><i class="fas fa-eye"></i></button>
                          </td>
                      </tr>
                      <tr>
                          <td>ORD12346</td>
                          <td>May 15, 2023 10:50 AM</td>
                          <td>C3</td>
                          <td>3 items</td>
                          <td>Rp 78,000</td>
                          <td><span class="status-badge completed">Completed</span></td>
                          <td>
                              <button class="action-button view-button"><i class="fas fa-eye"></i></button>
                          </td>
                      </tr>
                      <tr>
                          <td>ORD12347</td>
                          <td>May 15, 2023 11:20 AM</td>
                          <td>B2</td>
                          <td>4 items</td>
                          <td>Rp 156,000</td>
                          <td><span class="status-badge completed">Completed</span></td>
                          <td>
                              <button class="action-button view-button"><i class="fas fa-eye"></i></button>
                          </td>
                      </tr>
                      <tr>
                          <td>ORD12350</td>
                          <td>May 15, 2023 12:15 PM</td>
                          <td>D4</td>
                          <td>2 items</td>
                          <td>Rp 95,000</td>
                          <td><span class="status-badge completed">Completed</span></td>
                          <td>
                              <button class="action-button view-button"><i class="fas fa-eye"></i></button>
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
              <h2>Order Details</h2>
              <span class="close-modal">&times;</span>
          </div>
          <div class="modal-body">
              <div class="order-detail-header">
                  <div class="order-id-date">
                      <p>Order #<span id="detail-order-id"></span></p>
                      <p id="detail-order-date"></p>
                  </div>
                  <div class="order-detail-table">
                      <p>Table: <span id="detail-table-id"></span></p>
                  </div>
                  <div class="order-status">
                      <span id="detail-order-status"></span>
                  </div>
              </div>
              
              <div class="order-items-detail">
                  <h3>Items Ordered</h3>
                  <ul id="detail-order-items" class="detail-items-list">
                      <!-- Order items will be populated via JavaScript -->
                  </ul>
              </div>
              
              <div class="order-summary-detail">
                  <h3>Order Summary</h3>
                  <div class="summary-line">
                      <span>Subtotal</span>
                      <span id="detail-subtotal">Rp 0</span>
                  </div>
                  <div class="summary-line">
                      <span>Tax (10%)</span>
                      <span id="detail-tax">Rp 0</span>
                  </div>
                  <div class="summary-line total">
                      <span>Total</span>
                      <span id="detail-total">Rp 0</span>
                  </div>
              </div>
              
              <div class="payment-detail">
                  <h3>Payment Information</h3>
                  <div class="detail-row">
                      <strong>Payment Method:</strong> <span id="detail-payment-method"></span>
                  </div>
                  <div class="detail-row">
                      <strong>Payment Status:</strong> <span id="detail-payment-status"></span>
                  </div>
                  <div class="detail-row">
                      <strong>Payment Time:</strong> <span id="detail-payment-time"></span>
                  </div>
              </div>
          </div>
      </div>
  </div>
  
  <script>

document.addEventListener("DOMContentLoaded", () => {
    // Toggle sidebar on mobile
    const toggleSidebarBtn = document.getElementById("toggle-sidebar")
    const sidebar = document.querySelector(".sidebar")
  
    toggleSidebarBtn.addEventListener("click", () => {
      sidebar.classList.toggle("active")
    })
  
    // Close sidebar when clicking outside on mobile
    document.addEventListener("click", (event) => {
      if (
        window.innerWidth < 768 &&
        !sidebar.contains(event.target) &&
        !toggleSidebarBtn.contains(event.target) &&
        sidebar.classList.contains("active")
      ) {
        sidebar.classList.remove("active")
      }
    })
  
    // Update date and time
    function updateDateTime() {
      const now = new Date()
      const dateOptions = { weekday: "short", year: "numeric", month: "short", day: "numeric" }
      const timeOptions = { hour: "2-digit", minute: "2-digit" }
  
      document.getElementById("current-date").textContent = now.toLocaleDateString("en-US", dateOptions)
      document.getElementById("current-time").textContent = now.toLocaleTimeString("en-US", timeOptions)
    }
  
    updateDateTime()
    setInterval(updateDateTime, 60000) // Update every minute
  
    // Filter tabs functionality
    const filterTabs = document.querySelectorAll(".filter-tab")
    filterTabs.forEach((tab) => {
      tab.addEventListener("click", function () {
        // Remove active class from all tabs
        filterTabs.forEach((t) => t.classList.remove("active"))
  
        // Add active class to clicked tab
        this.classList.add("active")
  
        // Filter transactions based on period
        const period = this.dataset.period
        filterTransactionsByPeriod(period)
      })
    })
  
    // Search functionality
    const searchInput = document.getElementById("transaction-search")
    const searchButton = document.getElementById("search-button")
  
    searchButton.addEventListener("click", () => {
      const searchTerm = searchInput.value.trim().toLowerCase()
      searchTransactions(searchTerm)
    })
  
    searchInput.addEventListener("keyup", (event) => {
      if (event.key === "Enter") {
        const searchTerm = searchInput.value.trim().toLowerCase()
        searchTransactions(searchTerm)
      }
    })
  
    // Date filter functionality
    const dateFrom = document.getElementById("date-from")
    const dateTo = document.getElementById("date-to")
    const filterButton = document.getElementById("filter-button")
  
    filterButton.addEventListener("click", () => {
      filterTransactionsByDate(dateFrom.value, dateTo.value)
    })
  
    // View transaction details
    const viewButtons = document.querySelectorAll(".view-button")
    viewButtons.forEach((button) => {
      button.addEventListener("click", function () {
        const orderId = this.closest("tr").cells[0].textContent
        showTransactionDetails(orderId)
      })
    })
  
    // Modal functionality
    const modal = document.getElementById("transaction-detail-modal")
    const closeModal = document.querySelector(".close-modal")
  
    closeModal.addEventListener("click", () => {
      modal.style.display = "none"
    })
  
    window.addEventListener("click", (event) => {
      if (event.target === modal) {
        modal.style.display = "none"
      }
    })
  
    // Pagination functionality
    const paginationButtons = document.querySelectorAll(".pagination-button")
    paginationButtons.forEach((button) => {
      if (!button.disabled) {
        button.addEventListener("click", function () {
          // Remove active class from all buttons
          paginationButtons.forEach((b) => b.classList.remove("active"))
  
          // Add active class to clicked button
          this.classList.add("active")
  
          // Change page
          // This would typically load a different set of transactions
        })
      }
    })
  
    // Helper functions
    function filterTransactionsByPeriod(period) {
      console.log(`Filtering transactions by period: ${period}`)
      // This would typically filter the transactions based on period
  
      // Show/hide date filter based on period
      const dateFilter = document.querySelector(".date-filter")
      if (period === "custom") {
        dateFilter.style.display = "flex"
      } else {
        dateFilter.style.display = "none"
      }
    }
  
    function searchTransactions(searchTerm) {
      console.log(`Searching transactions for: ${searchTerm}`)
      // This would typically filter the transactions based on search term
    }
  
    function filterTransactionsByDate(fromDate, toDate) {
      console.log(`Filtering transactions from ${fromDate} to ${toDate}`)
      // This would typically filter the transactions based on date range
    }
  
    function showTransactionDetails(orderId) {
      console.log(`Showing details for order: ${orderId}`)
  
      // In a real app, you would fetch the transaction details from the server
      // For now, we'll just show the modal with some sample data
      document.getElementById("detail-order-id").textContent = orderId
      document.getElementById("detail-order-date").textContent = "May 15, 2023 10:30 AM"
      document.getElementById("detail-table-id").textContent = "A1"
      document.getElementById("detail-order-status").textContent = "Completed"
      document.getElementById("detail-order-status").className = "status-badge completed"
  
      // Sample order items
      const itemsList = document.getElementById("detail-order-items")
      itemsList.innerHTML = `
              <li>
                  <div class="detail-item-name">
                      <span class="detail-item-quantity">2x</span>
                      <span>Nasi Padang</span>
                  </div>
                  <div class="detail-item-price">Rp 90,000</div>
              </li>
              <li>
                  <div class="detail-item-name">
                      <span class="detail-item-quantity">1x</span>
                      <span>Beef Rendang (Extra spicy)</span>
                  </div>
                  <div class="detail-item-price">Rp 55,000</div>
              </li>
          `
  
      document.getElementById("detail-subtotal").textContent = "Rp 145,000"
      document.getElementById("detail-tax").textContent = "Rp 14,500"
      document.getElementById("detail-total").textContent = "Rp 159,500"
  
      document.getElementById("detail-payment-method").textContent = "QRIS"
      document.getElementById("detail-payment-status").textContent = "Completed"
      document.getElementById("detail-payment-time").textContent = "May 15, 2023 10:35 AM"
  
      // Show the modal
      modal.style.display = "block"
    }
  })
  
  
  </script>
</body>
</html>

