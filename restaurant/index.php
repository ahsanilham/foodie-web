<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodie - Restaurant Dashboard</title>
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
                <li class="active"><a href="index.html"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="orders.html"><i class="fas fa-clipboard-list"></i> Orders</a></li>
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
                <h2>Dashboard</h2>
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
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <div class="stat-info">
                        <h3>New Orders</h3>
                        <p id="new-orders-count">8</p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-spinner"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Processing</h3>
                        <p id="processing-orders-count">3</p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Completed Today</h3>
                        <p id="completed-orders-count">15</p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Today's Revenue</h3>
                        <p id="today-revenue">Rp 1,250,000</p>
                    </div>
                </div>
            </div>
            
            <div class="orders-section">
                <div class="section-header">
                    <h3>Active Orders</h3>
                    <a href="orders.html" class="view-all">View All</a>
                </div>
                
                <div class="active-orders-container">
                    <div class="order-cards" id="active-orders">
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
                                        <span class="item-quantity">1x</span>
                                        <span class="item-name">Mie Ayam Bakso Kecil</span>
                                    </li>
                                    <li>
                                        <span class="item-quantity">1x</span>
                                        <span class="item-name">Mie Ayam</span>
                                        <span class="item-note">(Tambah telur)</span>
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
                                        <span class="item-quantity">2x</span>
                                        <span class="item-name">Mie Bakso</span>
                                    </li>
                                    <li>
                                        <span class="item-quantity">1x</span>
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
            </div>
            
            <div class="dashboard-bottom">
                <div class="popular-items">
                    <div class="section-header">
                        <h3>Popular Items Today</h3>
                    </div>
                    <div class="popular-items-list">
                        <div class="popular-item">
                            <div class="popular-item-rank">1</div>
                            <div class="popular-item-info">
                                <h4>Mie Ayam Bakso Kecil</h4>
                                <p>Bakso Pak Agus</p>
                            </div>
                            <div class="popular-item-revenue">
                                <p>Rp 486,000</p>
                            </div>
                        </div>
                        <div class="popular-item">
                            <div class="popular-item-rank">2</div>
                            <div class="popular-item-info">
                                <h4>Mie Ayam</h4>
                                <p>Bakso Pak Agus</p>
                            </div>
                            <div class="popular-item-revenue">
                                <p>Rp 190,000</p>
                            </div>
                        </div>
                        <div class="popular-item">
                            <div class="popular-item-rank">3</div>
                            <div class="popular-item-info">
                                <h4>Mie Bakso</h4>
                                <p>Bakso Pak Agus</p>
                            </div>
                            <div class="popular-item-revenue">
                                <p>Rp 192,000</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="recent-activity">
                    <div class="section-header">
                        <h3>Recent Activity</h3>
                    </div>
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon complete-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="activity-details">
                                <p class="activity-text">You completed order <strong>ORD12344</strong></p>
                                <p class="activity-time">15 minutes ago</p>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon new-icon">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                            <div class="activity-details">
                                <p class="activity-text">New order <strong>ORD12346</strong> received</p>
                                <p class="activity-time">25 minutes ago</p>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon complete-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="activity-details">
                                <p class="activity-text">You completed order <strong>ORD12340</strong></p>
                                <p class="activity-time">45 minutes ago</p>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon new-icon">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                            <div class="activity-details">
                                <p class="activity-text">New order <strong>ORD12345</strong> received</p>
                                <p class="activity-time">1 hour ago</p>
                            </div>
                        </div>
                    </div>
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
    
    <script src="../js/restaurant-dashboard.js"></script>
</body>
</html>

