<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foodie - Restaurant Menu</title>
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
              <li class="active"><a href="menu.html"><i class="fas fa-utensils"></i> Menu</a></li>
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
              <h2>Menu Management</h2>
          </div>
          <div class="header-right">
              <div class="date-time">
                  <span id="current-date">Date</span>
                  <span id="current-time">Time</span>
              </div>
              <div class="notifications">
                  <button id="notification-button" class="notification-button">
                      <i class="fas fa-
                      bell"></i>
                      <span class="notification-badge">5</span>
                  </button>
              </div>
          </div>
      </header>
      
      <div class="dashboard-container">
          <div class="menu-actions">
              <div class="search-filter">
                  <input type="text" id="menu-search" placeholder="Search menu items...">
                  <button id="search-button"><i class="fas fa-search"></i></button>
              </div>
              <button id="add-item-button" class="add-item-button">
                  <i class="fas fa-plus"></i> Add New Item
              </button>
              <button id="edit-category-button" class="add-item-button" style="margin-left:10px;">
                  <i class="fas fa-tags"></i> Edit Category
              </button>
          </div>
          
          <div class="menu-categories">
              <div class="filter-tabs">
                  <a href="menu.php" class="filter-tab<?= $kategori_aktif === 0 ? ' active' : '' ?>" data-category="all">All</a>
                  <?php foreach ($all_categories as $cat): ?>
                      <a href="menu.php?kategori=<?= $cat['id'] ?>" class="filter-tab<?= ($kategori_aktif === intval($cat['id'])) ? ' active' : '' ?>" data-category="<?= $cat['id'] ?>">
                          <?= htmlspecialchars($cat['nama_kategori']) ?>
                      </a>
                  <?php endforeach; ?>
              </div>
          </div>
          
          <div class="menu-items-grid">
          <?php
          require_once 'functions.php';
          // Inisialisasi variabel notifikasi agar tidak undefined
          $cat_error = $cat_success = $error_message = $success_message = '';

          // Ambil kategori untuk filter dan form (PASTIKAN INI DI PALING ATAS SEBELUM HTML)
          $all_categories = getAllCategories();
          $kategori_menu = $all_categories;
          $kategori_aktif = isset($_GET['kategori']) ? intval($_GET['kategori']) : 0;
          if ($kategori_aktif > 0) {
              $items = getItemsByCategory($kategori_aktif);
          } else {
              $items = getAllItems();
          }

          // Handle kategori CRUD
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              if (isset($_POST['add_category'])) {
                  $result = addCategory($_POST['category_name'] ?? '');
                  if ($result['success']) {
                      $cat_success = 'Kategori berhasil ditambah!';
                  } else {
                      $cat_error = $result['error'];
                  }
              } elseif (isset($_POST['edit_category'])) {
                  $result = updateCategory(intval($_POST['category_id']), $_POST['category_name_edit'] ?? '');
                  if ($result['success']) {
                      $cat_success = 'Kategori berhasil diubah!';
                  } else {
                      $cat_error = $result['error'];
                  }
              } elseif (isset($_POST['delete_category'])) {
                  $result = deleteCategory(intval($_POST['category_id_delete']));
                  if ($result['success']) {
                      $cat_success = 'Kategori berhasil dihapus!';
                  } else {
                      $cat_error = $result['error'];
                  }
              }
          }

          // Handle Add Item
          if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_item'])) {
              $nama_item = trim($_POST['item_name'] ?? '');
              $kategori_menu_id = intval($_POST['item_category'] ?? 0);
              $harga_item = floatval($_POST['item_price'] ?? 0);
              $deskripsi = trim($_POST['item_description'] ?? '');
              $foto_item = null;

              // Validasi dasar
              if ($nama_item === '' || $kategori_menu_id === 0 || $harga_item <= 0) {
                  $error_message = 'Nama, kategori, dan harga wajib diisi.';
              } else {
                  // Upload gambar jika ada
                  if (isset($_FILES['item_image']) && $_FILES['item_image']['error'] !== UPLOAD_ERR_NO_FILE) {
                      $upload = upload_item_image($_FILES['item_image']);
                      if ($upload['success']) {
                          $foto_item = $upload['filename'];
                      } else {
                          $error_message = $upload['error'];
                      }
                  }
                  if ($error_message === '') {
                      $insert = insert_item($kategori_menu_id, $nama_item, $harga_item, $foto_item, $deskripsi);
                      if ($insert['success']) {
                          $success_message = 'Item berhasil ditambahkan!';
                      } else {
                          $error_message = $insert['error'];
                      }
                  }
              }
          }
          ?>
          <?php if (count($items) === 0): ?>
              <div style="padding:2rem;text-align:center;width:100%;">Tidak ada item untuk kategori ini.</div>
          <?php else: ?>
              <?php foreach ($items as $item): ?>
                  <div class="menu-item-card">
                      <div class="menu-item-image" style="background-image: url('../assets/img/<?= htmlspecialchars($item['foto_item'] ?: 'default.png') ?>');"></div>
                      <div class="menu-item-details">
                          <h3><?= htmlspecialchars($item['nama_item']) ?></h3>
                          <p class="menu-item-category">Kategori: <?= htmlspecialchars($item['nama_kategori'] ?: '-') ?></p>
                          <p class="menu-item-price">Rp <?= number_format($item['harga_item'],0,',','.') ?></p>
                          <p class="menu-item-desc" style="font-size:0.95em;color:#666;"> <?= htmlspecialchars($item['deskripsi']) ?> </p>
                      </div>
                      <div class="menu-item-actions">
                          <button class="edit-item-button"><i class="fas fa-edit"></i></button>
                          <button class="toggle-item-button active"><i class="fas fa-toggle-on"></i></button>
                          <button class="delete-item-button"><i class="fas fa-trash"></i></button>
                      </div>
                  </div>
              <?php endforeach; ?>
          <?php endif; ?>
          </div>
          
          <div class="pagination">
              <button class="pagination-button" disabled><i class="fas fa-chevron-left"></i></button>
              <button class="pagination-button active">1</button>
              <button class="pagination-button">2</button>
              <button class="pagination-button"><i class="fas fa-chevron-right"></i></button>
          </div>
      </div>
  </main>
  
  <div id="add-edit-item-modal" class="modal">
      <div class="modal-content">
          <div class="modal-header">
              <h2 id="modal-title">Add New Item</h2>
              <span class="close-modal">&times;</span>
          </div>
          <div class="modal-body">
              <form id="menu-item-form" method="POST" enctype="multipart/form-data" action="menu.php">
                  <div class="form-group">
                      <label for="item-name">Item Name</label>
                      <input type="text" id="item-name" name="item_name" required>
                  </div>
                  <div class="form-group">
                      <label for="item-category">Category</label>
                      <select id="item-category" name="item_category" required>
                          <option value="">-- Pilih Kategori --</option>
                          <?php foreach ($kategori_menu as $kat): ?>
                              <option value="<?= htmlspecialchars($kat['id']) ?>"><?= htmlspecialchars($kat['nama_kategori']) ?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="item-price">Price (Rp)</label>
                      <input type="number" id="item-price" name="item_price" min="0" step="1000" required>
                  </div>
                  <div class="form-group">
                      <label for="item-description">Description</label>
                      <textarea id="item-description" name="item_description" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                      <label for="item-image">Image</label>
                      <input type="file" id="item-image" name="item_image" accept="image/*">
                      <div id="image-preview" class="image-preview"></div>
                  </div>
                  <div class="form-group checkbox">
                      <input type="checkbox" id="item-available" name="item_available" checked>
                      <label for="item-available">Available</label>
                  </div>
                  <div class="form-group checkbox">
                      <input type="checkbox" id="item-popular" name="item_popular">
                      <label for="item-popular">Mark as Popular</label>
                  </div>
                  <div class="form-actions">
                      <button type="button" id="cancel-button" class="cancel-button">Cancel</button>
                      <button type="submit" id="save-item-button" class="save-button" name="add_item">Save Item</button>
                  </div>
                  <?php if ($error_message): ?>
                      <div class="form-error" style="color:red;"> <?= htmlspecialchars($error_message) ?> </div>
                  <?php elseif ($success_message): ?>
                      <div class="form-success" style="color:green;"> <?= htmlspecialchars($success_message) ?> </div>
                  <?php endif; ?>
              </form>
          </div>
      </div>
  </div>
  
  <div id="delete-confirmation-modal" class="modal">
      <div class="modal-content">
          <div class="modal-header">
              <h2>Confirm Deletion</h2>
              <span class="close-modal">&times;</span>
          </div>
          <div class="modal-body">
              <p>Are you sure you want to delete <span id="delete-item-name"></span>?</p>
              <p>This action cannot be undone.</p>
              
              <div class="confirmation-actions">
                  <button id="cancel-delete-button" class="cancel-button">Cancel</button>
                  <button id="confirm-delete-button" class="delete-button">Delete Item</button>
              </div>
          </div>
      </div>
  </div>
  
  <!-- Modal Manajemen Kategori -->
  <div id="category-modal" class="modal">
      <div class="modal-content" style="max-width:500px;">
          <div class="modal-header">
              <h2>Manajemen Kategori</h2>
              <span class="close-modal" id="close-category-modal">&times;</span>
          </div>
          <div class="modal-body">
              <?php if ($cat_error): ?>
                  <div class="form-error" style="color:red; margin-bottom:10px;"> <?= htmlspecialchars($cat_error) ?> </div>
              <?php elseif ($cat_success): ?>
                  <div class="form-success" style="color:green; margin-bottom:10px;"> <?= htmlspecialchars($cat_success) ?> </div>
              <?php endif; ?>
              <form method="POST" class="form-group" style="display:flex;gap:8px;margin-bottom:15px;align-items:center;">
                  <input type="text" name="category_name" placeholder="Nama kategori baru" required style="flex:1;">
                  <button type="submit" name="add_category" class="save-button">Tambah</button>
              </form>
              <table style="width:100%;border-collapse:collapse;background:#fff;border-radius:8px;box-shadow:0 2px 8px #0001;overflow:hidden;">
                  <thead style="background:var(--light-gray);">
                      <tr><th style="padding:8px 6px;text-align:left;">Nama Kategori</th><th style="width:120px;">Aksi</th></tr>
                  </thead>
                  <tbody>
                  <?php foreach ($all_categories as $cat): ?>
                      <tr style="border-bottom:1px solid var(--light-gray);">
                          <td style="padding:6px 6px;">
                              <form method="POST" style="display:flex;gap:6px;align-items:center;">
                                  <input type="hidden" name="category_id" value="<?= $cat['id'] ?>">
                                  <input type="text" name="category_name_edit" value="<?= htmlspecialchars($cat['nama_kategori']) ?>" style="width:70%;padding:4px 8px;border-radius:4px;border:1px solid var(--medium-gray);">
                                  <button type="submit" name="edit_category" class="save-button" style="padding:4px 10px;font-size:0.95em;">Edit</button>
                              </form>
                          </td>
                          <td style="padding:6px 6px;">
                              <form method="POST" style="display:inline;" onsubmit="return confirm('Hapus kategori ini?');">
                                  <input type="hidden" name="category_id_delete" value="<?= $cat['id'] ?>">
                                  <button type="submit" name="delete_category" class="delete-button" style="padding:4px 10px;font-size:0.95em;">Hapus</button>
                              </form>
                          </td>
                      </tr>
                  <?php endforeach; ?>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
  
  <script>document.addEventListener("DOMContentLoaded", () => {
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
  
        // Filter menu items based on category
        const category = this.dataset.category
        filterMenuByCategory(category)
      })
    })
  
    // Search functionality
    const searchInput = document.getElementById("menu-search")
    const searchButton = document.getElementById("search-button")
  
    searchButton.addEventListener("click", () => {
      const searchTerm = searchInput.value.trim().toLowerCase()
      searchMenuItems(searchTerm)
    })
  
    searchInput.addEventListener("keyup", (event) => {
      if (event.key === "Enter") {
        const searchTerm = searchInput.value.trim().toLowerCase()
        searchMenuItems(searchTerm)
      }
    })
  
    // Add new item button
    const addItemButton = document.getElementById("add-item-button")
    addItemButton.addEventListener("click", () => {
      showAddItemModal()
    })
  
    // Edit item buttons
    const editButtons = document.querySelectorAll(".edit-item-button")
    editButtons.forEach((button) => {
      button.addEventListener("click", function () {
        const itemCard = this.closest(".menu-item-card")
        const itemName = itemCard.querySelector("h3").textContent
        const itemCategory = itemCard.querySelector(".menu-item-category").textContent
        const itemPrice = itemCard.querySelector(".menu-item-price").textContent.replace("Rp ", "").replace(",", "")
  
        showEditItemModal(itemName, itemCategory, itemPrice)
      })
    })
  
    // Toggle item buttons
    const toggleButtons = document.querySelectorAll(".toggle-item-button")
    toggleButtons.forEach((button) => {
      button.addEventListener("click", function () {
        this.classList.toggle("active")
        this.classList.toggle("inactive")
  
        if (this.classList.contains("active")) {
          this.innerHTML = '<i class="fas fa-toggle-on"></i>'
        } else {
          this.innerHTML = '<i class="fas fa-toggle-off"></i>'
        }
      })
    })
  
    // Delete item buttons
    const deleteButtons = document.querySelectorAll(".delete-item-button")
    deleteButtons.forEach((button) => {
      button.addEventListener("click", function () {
        const itemCard = this.closest(".menu-item-card")
        const itemName = itemCard.querySelector("h3").textContent
  
        showDeleteConfirmation(itemName)
      })
    })
  
    // Modal kategori
    const catModal = document.getElementById("category-modal");
    const catBtn = document.getElementById("edit-category-button");
    const closeCatModal = document.getElementById("close-category-modal");
    catBtn.addEventListener("click", () => { catModal.style.display = "block"; });
    closeCatModal.addEventListener("click", () => { catModal.style.display = "none"; });
    window.onclick = function(event) {
        if (event.target == catModal) catModal.style.display = "none";
    };
  
    // Add/Edit Item Modal
    const addEditModal = document.getElementById("add-edit-item-modal")
    const closeAddEditModal = addEditModal.querySelector(".close-modal")
    const cancelButton = document.getElementById("cancel-button")
    const menuItemForm = document.getElementById("menu-item-form")
  
    closeAddEditModal.addEventListener("click", () => {
      addEditModal.style.display = "none"
    })
  
    cancelButton.addEventListener("click", () => {
      addEditModal.style.display = "none"
    })
  
    // HAPUS event.preventDefault() AGAR FORM SUBMIT KE PHP
    // menuItemForm.addEventListener("submit", (event) => {
    //   event.preventDefault()
    //   // ...
    // })
  
    // Delete Confirmation Modal
    const deleteModal = document.getElementById("delete-confirmation-modal")
    const closeDeleteModal = deleteModal.querySelector(".close-modal")
    const cancelDeleteButton = document.getElementById("cancel-delete-button")
    const confirmDeleteButton = document.getElementById("confirm-delete-button")
  
    closeDeleteModal.addEventListener("click", () => {
      deleteModal.style.display = "none"
    })
  
    cancelDeleteButton.addEventListener("click", () => {
      deleteModal.style.display = "none"
    })
  
    confirmDeleteButton.addEventListener("click", () => {
      const itemName = document.getElementById("delete-item-name").textContent
  
      // In a real app, you would send a request to the server to delete the item
      console.log(`Deleting item: ${itemName}`)
  
      // Close the modal
      deleteModal.style.display = "none"
  
      // Show success message
      alert(`Item "${itemName}" has been deleted.`)
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
          // This would typically load a different set of menu items
        })
      }
    })
  
    // Helper functions
    function filterMenuByCategory(category) {
      console.log(`Filtering menu by category: ${category}`)
      // This would typically filter the menu items based on category
    }
  
    function searchMenuItems(searchTerm) {
      console.log(`Searching menu items for: ${searchTerm}`)
      // This would typically filter the menu items based on search term
    }
  
    function showAddItemModal() {
      // Reset form
      document.getElementById("modal-title").textContent = "Add New Item"
      document.getElementById("menu-item-form").reset()
      document.getElementById("image-preview").style.backgroundImage = ""
  
      // Show modal
      addEditModal.style.display = "block"
    }
  
    function showEditItemModal(name, category, price) {
      // Set form values
      document.getElementById("modal-title").textContent = "Edit Item"
      document.getElementById("item-name").value = name
      document.getElementById("item-category").value = category.toLowerCase()
      document.getElementById("item-price").value = price
  
      // Show modal
      addEditModal.style.display = "block"
    }
  
    function showDeleteConfirmation(itemName) {
      document.getElementById("delete-item-name").textContent = itemName
      deleteModal.style.display = "block"
    }
})</script>
</body>
</html>

