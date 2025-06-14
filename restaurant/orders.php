<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foodie - Restaurant Orders</title>
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
              <li class="active"><a href="orders.html"><i class="fas fa-clipboard-list"></i> Orders</a></li>
              <li><a href="menu.html"><i class="fas fa-utensils"></i> Menu</a></li>
              <li><a href="transactions.html"><i class="fas fa-receipt"></i> Transactions</a></li>
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
              <h2>Orders</h2>
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
          <div class="orders-filter">
              <div class="filter-section">
                  <div class="filter-tabs">
                      <button class="filter-tab active" data-status="all">All Orders</button>
                      <button class="filter-tab" data-status="new">New</button>
                      <button class="filter-tab" data-status="preparing">Preparing</button>
                      <button class="filter-tab" data-status="ready">Ready</button>
                      <button class="filter-tab" data-status="completed">Completed</button>
                  </div>
                  <div class="search-filter">
                      <input type="text" id="order-search" placeholder="Search by order ID or table...">
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
          
          <div class="active-orders-container">
              <h3>Active Orders</h3>
              <div class="order-cards" id="active-orders">
                  <!-- Active orders will be populated via JavaScript -->
                  <div class="order-card">
                      <div class="order-card-header">
                          <div class="order-card-id-time">
                              <h4>Order #ORD12345</h4>
                              <p>10 min ago</p>
                          </div>
                          <div class="order-card-table">
                              <p>Table A1</p>
                          </div>
                      </div>
                      <div class="order-card-items">
                          <ul>
                              <li>
                                  <span class="item-quantity">2x</span>
                                  <span class="item-name">Nasi Padang</span>
                              </li>
                              <li>
                                  <span class="item-quantity">1x</span>
                                  <span class="item-name">Beef Rendang</span>
                                  <span class="item-note">(Extra spicy)</span>
                              </li>
                          </ul>
                      </div>
                      <div class="order-card-actions">
                          <button class="view-order-button">View Details</button>
                          <button class="complete-order-button">Mark as Ready</button>
                      </div>
                  </div>
                  
                  <div class="order-card">
                      <div class="order-card-header">
                          <div class="order-card-id-time">
                              <h4>Order #ORD12346</h4>
                              <p>15 min ago</p>
                          </div>
                          <div class="order-card-table">
                              <p>Table C3</p>
                          </div>
                      </div>
                      <div class="order-card-items">
                          <ul>
                              <li>
                                  <span class="item-quantity">1x</span>
                                  <span class="item-name">Nasi Goreng</span>
                              </li>
                              <li>
                                  <span class="item-quantity">1x</span>
                                  <span class="item-name">Soto Ayam</span>
                              </li>
                              <li>
                                  <span class="item-quantity">2x</span>
                                  <span class="item-name">Es Teh Manis</span>
                              </li>
                          </ul>
                      </div>
                      <div class="order-card-actions">
                          <button class="view-order-button">View Details</button>
                          <button class="complete-order-button">Mark as Ready</button>
                      </div>
                  </div>
              </div>
          </div>
          
          <div class="orders-history">
              <h3>Order History</h3>
              <div class="orders-table-container">
                  <table class="orders-table">
                      <thead>
                          <tr>
                              <th>Order ID</th>
                              <th>Table</th>
                              <th>Items</th>
                              <th>Status</th>
                              <th>Time</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody id="orders-history-table">
                          <!-- Order history will be populated via JavaScript -->
                          <tr>
                              <td>ORD12340</td>
                              <td>B2</td>
                              <td>3 items</td>
                              <td><span class="status-badge completed">Completed</span></td>
                              <td>1 hour ago</td>
                              <td>
                                  <button class="action-button view-button"><i class="fas fa-eye"></i></button>
                              </td>
                          </tr>
                          <tr>
                              <td>ORD12339</td>
                              <td>A1</td>
                              <td>2 items</td>
                              <td><span class="status-badge completed">Completed</span></td>
                              <td>1.5 hours ago</td>
                              <td>
                                  <button class="action-button view-button"><i class="fas fa-eye"></i></button>
                              </td>
                          </tr>
                          <tr>
                              <td>ORD12338</td>
                              <td>D4</td>
                              <td>4 items</td>
                              <td><span class="status-badge completed">Completed</span></td>
                              <td>2 hours ago</td>
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
      </div>
  </main>
  
  <div id="order-detail-modal" class="modal">
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
              
              <div class="order-notes">
                  <h3>Order Notes</h3>
                  <p id="detail-order-notes"></p>
              </div>
              
              <div class="order-timeline">
                  <h3>Order Timeline</h3>
                  <div class="timeline">
                      <div class="timeline-item">
                          <div class="timeline-icon">
                              <i class="fas fa-clipboard-list"></i>
                          </div>
                          <div class="timeline-content">
                              <h4>Order Received</h4>
                              <p id="timeline-received"></p>
                          </div>
                      </div>
                      <div class="timeline-item">
                          <div class="timeline-icon">
                              <i class="fas fa-check"></i>
                          </div>
                          <div class="timeline-content">
                              <h4>Order Approved</h4>
                              <p id="timeline-approved"></p>
                          </div>
                      </div>
                      <div class="timeline-item" id="timeline-preparing-item">
                          <div class="timeline-icon">
                              <i class="fas fa-spinner"></i>
                          </div>
                          <div class="timeline-content">
                              <h4>Preparing</h4>
                              <p id="timeline-preparing"></p>
                          </div>
                      </div>
                      <div class="timeline-item" id="timeline-ready-item">
                          <div class="timeline-icon">
                              <i class="fas fa-utensils"></i>
                          </div>
                          <div class="timeline-content">
                              <h4>Ready</h4>
                              <p id="timeline-ready"></p>
                          </div>
                      </div>
                  </div>
              </div>
              
              <div class="order-actions">
                  <button id="detail-start-button" class="action-button large start-button">Start Preparing</button>
                  <button id="detail-ready-button" class="action-button large complete-button">Mark as Ready</button>
              </div>
          </div>
      </div>
  </div>
  
  <!-- <script src="../js/restaurant-orders.js"></script> -->
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
  
        // Filter orders based on status
        const status = this.dataset.status
        filterOrdersByStatus(status)
      })
    })
  
    // Search functionality
    const searchInput = document.getElementById("order-search")
    const searchButton = document.getElementById("search-button")
  
    searchButton.addEventListener("click", () => {
      const searchTerm = searchInput.value.trim().toLowerCase()
      searchOrders(searchTerm)
    })
  
    searchInput.addEventListener("keyup", (event) => {
      if (event.key === "Enter") {
        const searchTerm = searchInput.value.trim().toLowerCase()
        searchOrders(searchTerm)
      }
    })
  
    // Date filter functionality
    const dateFrom = document.getElementById("date-from")
    const dateTo = document.getElementById("date-to")
    const filterButton = document.getElementById("filter-button")
  
    filterButton.addEventListener("click", () => {
      filterOrdersByDate(dateFrom.value, dateTo.value)
    })
  
    // View order details
    const viewButtons = document.querySelectorAll(".view-order-button, .view-button")
    viewButtons.forEach((button) => {
      button.addEventListener("click", function () {
        let orderId
        if (this.classList.contains("view-button")) {
          orderId = this.closest("tr").cells[0].textContent
        } else {
          orderId = this.closest(".order-card").querySelector("h4").textContent.replace("Order #", "")
        }
        showOrderDetails(orderId)
      })
    })
  
    // Complete order buttons
    const completeButtons = document.querySelectorAll(".complete-order-button")
    completeButtons.forEach((button) => {
      button.addEventListener("click", function () {
        const orderId = this.closest(".order-card").querySelector("h4").textContent.replace("Order #", "")
        const buttonText = this.textContent.trim()
  
        if (buttonText === "Mark as Ready") {
          markAsReady(orderId)
        } else {
          startPreparing(orderId)
        }
      })
    })
  
    // Modal functionality
    const modal = document.getElementById("order-detail-modal")
    const closeModal = document.querySelector(".close-modal")
  
    closeModal.addEventListener("click", () => {
      modal.style.display = "none"
    })
  
    window.addEventListener("click", (event) => {
      if (event.target === modal) {
        modal.style.display = "none"
      }
    })
  
    // Modal action buttons
    const startButton = document.getElementById("detail-start-button")
    const readyButton = document.getElementById("detail-ready-button")
  
    startButton.addEventListener("click", () => {
      const orderId = document.getElementById("detail-order-id").textContent
      startPreparing(orderId)
      modal.style.display = "none"
    })
  
    readyButton.addEventListener("click", () => {
      const orderId = document.getElementById("detail-order-id").textContent
      markAsReady(orderId)
      modal.style.display = "none"
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
          // This would typically load a different set of orders
        })
      }
    })
  
    // Helper functions
    function filterOrdersByStatus(status) {
      console.log(`Filtering orders by status: ${status}`)
      // This would typically filter the orders based on status
    }
  
    function searchOrders(searchTerm) {
      console.log(`Searching orders for: ${searchTerm}`)
      // This would typically filter the orders based on search term
    }
  
    function filterOrdersByDate(fromDate, toDate) {
      console.log(`Filtering orders from ${fromDate} to ${toDate}`)
      // This would typically filter the orders based on date range
    }
  
    function showOrderDetails(orderId) {
      console.log(`Showing details for order: ${orderId}`)
  
      // In a real app, you would fetch the order details from the server
      // For now, we'll just show the modal with some sample data
      document.getElementById("detail-order-id").textContent = orderId
      document.getElementById("detail-order-date").textContent = "May 15, 2023 10:30 AM"
      document.getElementById("detail-table-id").textContent = "A1"
      document.getElementById("detail-order-status").textContent = "Processing"
      document.getElementById("detail-order-status").className = "status-badge processing"
  
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
  
      document.getElementById("detail-order-notes").textContent = "Please provide extra napkins"
  
      // Update timeline
      document.getElementById("timeline-received").textContent = "May 15, 2023 10:30 AM"
      document.getElementById("timeline-approved").textContent = "May 15, 2023 10:35 AM"
  
      // For this example, let's say the order is approved but not yet being prepared
      document.getElementById("timeline-preparing").textContent = "Pending"
      document.getElementById("timeline-ready").textContent = "Pending"
      document.getElementById("timeline-preparing-item").style.opacity = "0.5"
      document.getElementById("timeline-ready-item").style.opacity = "0.5"
  
      // Show/hide action buttons based on order status
      startButton.style.display = "block"
      readyButton.style.display = "none"
  
      // Show the modal
      modal.style.display = "block"
    }
  
    function startPreparing(orderId) {
      console.log(`Starting preparation for order: ${orderId}`)
      // This would typically send a request to the server to update the order status
      alert(`Started preparing order: ${orderId}`)
    }
  
    function markAsReady(orderId) {
      console.log(`Marking order as ready: ${orderId}`)
      // This would typically send a request to the server to update the order status
      alert(`Order ${orderId} is now ready for pickup.`)
    }
})
   </script>
</body>
</html>

