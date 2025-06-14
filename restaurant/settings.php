<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foodie - Restaurant Settings</title>
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
                  <p id="user-name">Restaurant Manager</p>
                  <p id="user-id">ID: RST001</p>
              </div>
          </div>
          <a href="../login_restaurant.html" class="logout-button"><i class="fas fa-sign-out-alt"></i> Logout</a>
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
                      <span class="notification-badge">5</span>
                  </button>
              </div>
          </div>
      </header>
      
      <div class="dashboard-container">
          <div class="settings-container">
              <div class="settings-section">
                  <h3>Restaurant Information</h3>
                  <div class="settings-card">
                      <div class="settings-form">
                          <div class="form-group">
                              <label for="restaurant-id">Restaurant ID</label>
                              <input type="text" id="restaurant-id" value="RST001" disabled>
                          </div>
                          <div class="form-group">
                              <label for="restaurant-name-input">Restaurant Name</label>
                              <input type="text" id="restaurant-name-input" value="Bakso Pak Agus">
                          </div>
                          <div class="form-group">
                              <label for="restaurant-category">Category</label>
                              <input type="text" id="restaurant-category" value="Indonesian">
                          </div>
                          <div class="form-group">
                              <label for="restaurant-description">Description</label>
                              <textarea id="restaurant-description" rows="3">Authentic Bakso Khas Wonogiri</textarea>
                          </div>
                          <div class="form-group">
                              <label for="restaurant-logo">Restaurant Logo</label>
                              <input type="file" id="restaurant-logo" accept="image/*">
                              <div id="logo-preview" class="image-preview"></div>
                          </div>
                          <button class="save-button">Save Changes</button>
                      </div>
                  </div>
              </div>
              
              <div class="settings-section">
                  <h3>Contact Information</h3>
                  <div class="settings-card">
                      <div class="settings-form">
                          <div class="form-group">
                              <label for="contact-name">Contact Person</label>
                              <input type="text" id="contact-name" value="Restaurant Manager">
                          </div>
                          <div class="form-group">
                              <label for="contact-email">Email</label>
                              <input type="email" id="contact-email" value="baksokumis@example.com">
                          </div>
                          <div class="form-group">
                              <label for="contact-phone">Phone Number</label>
                              <input type="tel" id="contact-phone" value="081234567890">
                          </div>
                          <button class="save-button">Save Changes</button>
                      </div>
                  </div>
              </div>
              
              <div class="settings-section">
                  <h3>Operating Hours</h3>
                  <div class="settings-card">
                      <div class="settings-form">
                          <div class="operating-hours">
                              <div class="day-hours">
                                  <div class="day-label">Monday</div>
                                  <div class="hours-input">
                                      <input type="time" value="08:00"> to <input type="time" value="21:00">
                                      <div class="closed-toggle">
                                          <input type="checkbox" id="monday-closed">
                                          <label for="monday-closed">Closed</label>
                                      </div>
                                  </div>
                              </div>
                              <div class="day-hours">
                                  <div class="day-label">Tuesday</div>
                                  <div class="hours-input">
                                      <input type="time" value="08:00"> to <input type="time" value="21:00">
                                      <div class="closed-toggle">
                                          <input type="checkbox" id="tuesday-closed">
                                          <label for="tuesday-closed">Closed</label>
                                      </div>
                                  </div>
                              </div>
                              <div class="day-hours">
                                  <div class="day-label">Wednesday</div>
                                  <div class="hours-input">
                                      <input type="time" value="08:00"> to <input type="time" value="21:00">
                                      <div class="closed-toggle">
                                          <input type="checkbox" id="wednesday-closed">
                                          <label for="wednesday-closed">Closed</label>
                                      </div>
                                  </div>
                              </div>
                              <div class="day-hours">
                                  <div class="day-label">Thursday</div>
                                  <div class="hours-input">
                                      <input type="time" value="08:00"> to <input type="time" value="21:00">
                                      <div class="closed-toggle">
                                          <input type="checkbox" id="thursday-closed">
                                          <label for="thursday-closed">Closed</label>
                                      </div>
                                  </div>
                              </div>
                              <div class="day-hours">
                                  <div class="day-label">Friday</div>
                                  <div class="hours-input">
                                      <input type="time" value="08:00"> to <input type="time" value="22:00">
                                      <div class="closed-toggle">
                                          <input type="checkbox" id="friday-closed">
                                          <label for="friday-closed">Closed</label>
                                      </div>
                                  </div>
                              </div>
                              <div class="day-hours">
                                  <div class="day-label">Saturday</div>
                                  <div class="hours-input">
                                      <input type="time" value="09:00"> to <input type="time" value="22:00">
                                      <div class="closed-toggle">
                                          <input type="checkbox" id="saturday-closed">
                                          <label for="saturday-closed">Closed</label>
                                      </div>
                                  </div>
                              </div>
                              <div class="day-hours">
                                  <div class="day-label">Sunday</div>
                                  <div class="hours-input">
                                      <input type="time" value="09:00"> to <input type="time" value="21:00">
                                      <div class="closed-toggle">
                                          <input type="checkbox" id="sunday-closed">
                                          <label for="sunday-closed">Closed</label>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <button class="save-button">Save Changes</button>
                      </div>
                  </div>
              </div>
              
              <div class="settings-section">
                  <h3>Notification Settings</h3>
                  <div class="settings-card">
                      <div class="settings-form">
                          <div class="form-group checkbox">
                              <input type="checkbox" id="new-order-notification" checked>
                              <label for="new-order-notification">New Order Notifications</label>
                          </div>
                          <div class="form-group checkbox">
                              <input type="checkbox" id="order-status-notification" checked>
                              <label for="order-status-notification">Order Status Updates</label>
                          </div>
                          <div class="form-group checkbox">
                              <input type="checkbox" id="email-notification" checked>
                              <label for="email-notification">Email Notifications</label>
                          </div>
                          <button class="save-button">Save Preferences</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </main>
  
  <script src="../js/restaurant-settings.js"></script>
</body>
</html>

