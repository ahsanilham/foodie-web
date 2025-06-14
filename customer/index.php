<?php
require_once './functions.php';
session_start();
$data = getItemData($conn);
echo '<script>console.log('. json_encode($data) .');</script>';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search-button'])) {
    $data = search($conn, $_POST);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodie - Menu</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <div class="header-container">
            <div class="header-left">
                <img class="logo" src="../assets/logo/LogoFoodie.png" alt="" srcset="">
            </div>
            <div class="header-right">
                <div class="table-info">
                    <span class="table-label">Table:</span>
                    <span id="table-id" class="table-id">##</span>
                </div>
                <div class="history-button">
                    <a href="history.html"><i class="fas fa-history"></i></a>
                </div>
            </div>
        </div>
    </header>
    
    <div class="search-container">
        <form action="" method="post">
            <div class="search-bar">
                <input type="text" name="search-input" id="search-input" placeholder="Search for food or restaurant...">
                <button id="search-button" name="search-button"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
    
    <main>
        <section class="restaurants-section" style="display: none;">
            <h2>Choose a Restaurant</h2>
            <div class="restaurant-list" id="restaurant-list">
                <div class="restaurant-card">
                    <div class="restaurant-image" style="background-image: url('../assets/restaurant-1.jpg')"></div>
                    <div class="restaurant-info">
                        <h3 class="restaurant-name">Warung Padang</h3>
                        <p class="restaurant-category">Indonesian</p>
                        <div class="restaurant-rating">
                            <span class="rating-star"><i class="fas fa-star"></i></span>
                            <span>4.5</span>
                        </div>
                    </div>
                </div>
                <div class="restaurant-card">
                    <div class="restaurant-image" style="background-image: url('../assets/restaurant-2.jpg')"></div>
                    <div class="restaurant-info">
                        <h3 class="restaurant-name">Sushi Corner</h3>
                        <p class="restaurant-category">Japanese</p>
                        <div class="restaurant-rating">
                            <span class="rating-star"><i class="fas fa-star"></i></span>
                            <span>4.3</span>
                        </div>
                    </div>
                </div>
                <div class="restaurant-card">
                    <div class="restaurant-image" style="background-image: url('../assets/restaurant-3.jpg')"></div>
                    <div class="restaurant-info">
                        <h3 class="restaurant-name">Burger House</h3>
                        <p class="restaurant-category">Fast Food</p>
                        <div class="restaurant-rating">
                            <span class="rating-star"><i class="fas fa-star"></i></span>
                            <span>4.1</span>
                        </div>
                    </div>
                </div>
                <div class="restaurant-card">
                    <div class="restaurant-image" style="background-image: url('../assets/restaurant-4.jpg')"></div>
                    <div class="restaurant-info">
                        <h3 class="restaurant-name">Coffee Haven</h3>
                        <p class="restaurant-category">Cafe</p>
                        <div class="restaurant-rating">
                            <span class="rating-star"><i class="fas fa-star"></i></span>
                            <span>4.7</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="popular-items-section">
            <h2>Popular Items</h2>
            <div class="menu-items" id="popular-items">
                <div class="menu-item"  onclick="redirectToDetail(this)">
                    <div class="menu-item-image" style="background-image: url('https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/e742f588-70bd-49df-8b46-95505b8a266b_Go-Biz_20221107_095331.jpeg?auto=format')"></div>
                    <div class="menu-item-info">
                        <p class="menu-item-desc" style="display: none;">Nasi + katsu</p>
                        <h3 class="menu-item-name">Ayam Katsu</h3>
                        <p class="menu-item-restaurant">Ayam Bu rani</p>
                        <p class="menu-item-price">Rp 24.000</p>
                    </div>
                </div>
                <div class="menu-item"  onclick="redirectToDetail(this)">
                    <div class="menu-item-image" style="background-image: url('https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/9242910b-d13d-4093-9782-3e118c8ab527_Go-Biz_20230320_165702.jpeg?auto=format')"></div>
                    <div class="menu-item-info">
                        <h3 class="menu-item-name">Paket Ayam Woku Lengkap</h3>
                        <p class="menu-item-desc" style="display: none;">Nasi + Ayam Woku/Dabu2/Saus Tiram + Tahu + Tempe</p>
                        <p class="menu-item-restaurant">Ayam Bu rani</p>
                        <p class="menu-item-price">Rp 24.000</p>
                    </div>
                </div>
                <div class="menu-item"  onclick="redirectToDetail(this)">
                    <div class="menu-item-image" style="background-image: url('https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/7b989d97-45f6-4667-a9e4-d4f5976f0f00_Go-Biz_20230320_172239.jpeg?auto=format')"></div>
                    <div class="menu-item-info">
                        <p class="menu-item-desc" style="display: none;">Nasi + Ikan Nila + Tahu + Tempe + Sambal</p>
                        <h3 class="menu-item-name">Ikan Nila Dabu-Dabu</h3>
                        <p class="menu-item-restaurant">Ayam Bu rani</p>
                        <p class="menu-item-price">Rp 29.000</p>
                    </div>
                </div>
                <div class="menu-item"  onclick="redirectToDetail(this)">
                    <div class="menu-item-image" style="background-image: url('https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/8f03edd0-cf1a-43ad-996d-9e761a5d6989_Go-Biz_20240209_112217.jpeg?auto=format')"></div>
                    <div class="menu-item-info">
                        <h3 class="menu-item-name">Ayam Timbel</h3>
                        <p class="menu-item-desc" style="display: none;">Ayam Timbel + Nasi + Tahu dan Tempe + Sambal</p>
                        <p class="menu-item-restaurant">Ayam Bu Rani</p>
                        <p class="menu-item-price">Rp 24.000</p>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="menu-section" id="menu-section">
            <h2>All Menu Items</h2>
            <div class="category-tabs">
                <button class="category-tab active" data-category="all">All</button>
                <button class="category-tab" data-category="food">Food</button>
                <button class="category-tab" data-category="drink">Drinks</button>
                <button class="category-tab" data-category="dessert">Desserts</button>
            </div>
            <div class="menu-items" id="menu-items">
                <?php foreach($data as $datas) : ?>
                    <div class="menu-item"  onclick="redirectToDetail(this)">
                        <div class="menu-item-image" style="background-image: url('https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/b1efd145-a7aa-485c-afa1-557545510659_Go-Biz_20240209_115317.jpeg?auto=format')"></div>
                        <div class="menu-item-info">
                            <h3 class="menu-item-name"><?=$datas['nama_item']?></h3>
                            <p class="menu-item-desc" style="display: none;"><?=$datas['deskripsi']?></p>
                            <p class="menu-item-restaurant"><?=$datas['nama_merchant']?></p>
                            <p class="menu-item-price"><?=formatrupiah($datas['harga_item'])?></p>
                        </div>
                    </div>
                <?php endforeach ?>


           <!-- <div class="menu-item"  onclick="redirectToDetail(this)">
                    <div class="menu-item-image" style="background-image: url('https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/b1efd145-a7aa-485c-afa1-557545510659_Go-Biz_20240209_115317.jpeg?auto=format')"></div>
                    <div class="menu-item-info">
                        <h3 class="menu-item-name">Mie Ayam Bakso Kecil</h3>
                        <p class="menu-item-desc" style="display: none;">Mie Ayam + Bakso Kecil (5 Biji)</p>
                        <p class="menu-item-restaurant">Bakso Pak Agus</p>
                        <p class="menu-item-price">Rp 27.000</p>
                    </div>
                </div>
                <div class="menu-item"  onclick="redirectToDetail(this)">
                    <div class="menu-item-image" style="background-image: url('https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/54912b49-c99a-4495-8982-91144b405d18_Go-Biz_20240209_115112.jpeg?auto=format')"></div>
                    <div class="menu-item-info">
                        <h3 class="menu-item-name">Mie Ayam</h3>
                        <p class="menu-item-desc" style="display: none;">Mie Ayam Saja</p>
                        <p class="menu-item-restaurant">Bakso Pak Agus</p>
                        <p class="menu-item-price">Rp 19.000</p>
                    </div>
                </div>
                <div class="menu-item"  onclick="redirectToDetail(this)">
                    <div class="menu-item-image" style="background-image: url('https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/9ad94721-bd13-4bed-a3e8-06f19b19a276_Go-Biz_20240209_114808.jpeg?auto=format')"></div>
                    <div class="menu-item-info">
                        <h3 class="menu-item-name">Nasi Bakar Cumi</h3>
                        <p class="menu-item-desc" style="display: none;"></p>
                        <p class="menu-item-restaurant">Restoran Seafood</p>
                        <p class="menu-item-price">Rp 26.000</p>
                    </div>
                </div>
                <div class="menu-item"  onclick="redirectToDetail(this)">
                    <div class="menu-item-image" style="background-image: url('https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/47d97db5-ddb8-4819-be78-432c7a57e434_Go-Biz_20240209_122826.jpeg?auto=format')"></div>
                    <div class="menu-item-info">
                        <h3 class="menu-item-name">Mentai Chicken Rice</h3>
                        <p class="menu-item-desc" style="display: none;">Nasi + Ayam + Saus Mentai</p>
                        <p class="menu-item-restaurant">Restoran Jepang</p>
                        <p class="menu-item-price">Rp 21.000</p>
                    </div>
                </div>
                <div class="menu-item"  onclick="redirectToDetail(this)">
                    <div class="menu-item-image" style="background-image: url('https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/72ee791e-c8dc-4444-ba11-b8ac7f21b486_Go-Biz_20240209_113134.jpeg?auto=format')"></div>
                    <div class="menu-item-info">
                        <h3 class="menu-item-name">Chicken Cordon Blue</h3>
                        <p class="menu-item-desc" style="display: none;">Chicken Cordon Blue + Nasi/kentang</p>
                        <p class="menu-item-restaurant">Restoran Western</p>
                        <p class="menu-item-price">Rp 24.000</p>
                    </div>            
                </div>
                <div class="menu-item"  onclick="redirectToDetail(this)">
                    <div class="menu-item-image" style="background-image: url('https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/ff2bdcf0-2b29-455a-9adf-b1ca14fc05c0_Go-Biz_20240209_113608.jpeg?auto=format')"></div>
                    <div class="menu-item-info">
                        <h3 class="menu-item-name">Chicken Mozza Stick</h3>
                        <p class="menu-item-desc" style="display: none;">Chicken Moza Stick + Nasi/kentang</p>
                        <p class="menu-item-restaurant">Restoran Pembuat Ayam</p>
                        <p class="menu-item-price">Rp 24.000</p>
                    </div>            
                </div>
                <div class="menu-item"  onclick="redirectToDetail(this)">
                    <div class="menu-item-image" style="background-image: url('https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/82f1ea2d-38f1-4e6e-88d5-d9ab6048f4d7_Go-Biz_20240209_113909.jpeg?auto=format')"></div>
                    <div class="menu-item-info">
                        <h3 class="menu-item-name">Sate Lilit Bali</h3>
                        <p class="menu-item-desc" style="display: none;">Sate Lilit Bali (Ayam/ikan Dori) + Nasi/kentang</p>
                        <p class="menu-item-restaurant">Restoran Bali</p>
                        <p class="menu-item-price">Rp 24.000</p>
                    </div>
                </div>
                <div class="menu-item"  onclick="redirectToDetail(this)">
                    <div class="menu-item-image" style="background-image: url('https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/c841ae5e-2c45-4d04-b7a7-bc259636769f_Go-Biz_20240209_114328.jpeg?auto=format')"></div>
                    <div class="menu-item-info">
                        <h3 class="menu-item-name">Opor Ayam</h3>
                        <p class="menu-item-desc" style="display: none;">Opor Ayam + Nasi/lontong</p>
                        <p class="menu-item-restaurant">Restoran Tradisional</p>
                        <p class="menu-item-price">Rp 24.000</p>
                    </div>
                </div>
                <div class="menu-item"  onclick="redirectToDetail(this)">
                    <div class="menu-item-image" style="background-image: url('https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/8f03edd0-cf1a-43ad-996d-9e761a5d6989_Go-Biz_20240209_112217.jpeg?auto=format')"></div>
                    <div class="menu-item-info">
                        <h3 class="menu-item-name">Ayam Timbel</h3>
                        <p class="menu-item-desc" style="display: none;">Ayam Timbel + Nasi + Tahu dan Tempe + Sambal</p>
                        <p class="menu-item-restaurant">Ayam Bu Rani</p>
                        <p class="menu-item-price">Rp 24.000</p>
                    </div>
                </div>
                <div class="menu-item"  onclick="redirectToDetail(this)">
                    <div class="menu-item-image" style="background-image: url('https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/4f4d98f1-bfd3-441b-b352-726c4448c97c_Go-Biz_20240209_115211.jpeg?auto=format')"></div>
                    <div class="menu-item-info">
                        <h3 class="menu-item-name">Mie Bakso</h3>
                        <p class="menu-item-desc" style="display: none;">Mie/Bihun + Bakso Urat / Telur / Cincang + Bakso Kecil + Sayur</p>
                        <p class="menu-item-restaurant">Bakso pak Agus</p>
                        <p class="menu-item-price">Rp 24.000</p>
                    </div>
                </div> -->
            </div>
        </section>
    </main>
    
    <div id="checkout-bar" class="checkout-bar hidden">
        <div class="checkout-info">
            <div class="cart-icon">
                <i class="fas fa-shopping-cart"></i>
                <span id="cart-count" class="cart-count">0</span>
            </div>
            <div class="checkout-summary">
                <span id="total-items">0 items</span>
                <span id="total-price">Rp 0</span>
            </div>
        </div>
        <button id="checkout-button" class="checkout-button">CHECKOUT</button>
    </div>
    
    <!-- Bottom Navigation -->
    <div class="bottom-nav">
        <a href="index.html" class="bottom-nav-item active">
            <div class="bottom-nav-icon"><i class="fas fa-home"></i></div>
            <span>Home</span>
        </a>
        <a href="#" class="bottom-nav-item">
            <div class="bottom-nav-icon"><i class="fas fa-search"></i></div>
            <span>Search</span>
        </a>
        <a href="cart.html" class="bottom-nav-item">
            <div class="bottom-nav-icon">
                <i class="fas fa-shopping-cart"></i>
                <span id="nav-cart-count" class="cart-count hidden">0</span>
            </div>
            <span>Cart</span>
        </a>
        <a href="history.html" class="bottom-nav-item">
            <div class="bottom-nav-icon"><i class="fas fa-history"></i></div>
            <span>History</span>
        </a>
    </div>

<script>
    const params = new URLSearchParams(window.location.search);
    const tableNumber = params.get("table");

    // Jika parameter "table" ada, ubah teksnya
    if (tableNumber) {
        document.getElementById("table-id").textContent = tableNumber;
    } else {
        tableNumber = document.getElementById("table-id").textContent = "00";
    }


    function redirectToDetail(element) {
        const name = element.querySelector(".menu-item-name").textContent;
        const restaurant = element.querySelector(".menu-item-restaurant").textContent;
        const price = element.querySelector(".menu-item-price").textContent;
        const description = element.querySelector(".menu-item-desc").textContent;
        const img = element.querySelector(".menu-item-image").style.backgroundImage;

        // img hash
        // console.log(img);

        // console.log(tableNumber);
       
        const url = `item-detail.php?name=${encodeURIComponent(name)}&restaurant=${encodeURIComponent(restaurant)}&price=${encodeURIComponent(price)}&desc=${encodeURIComponent(description)}&img=${encodeURIComponent(img)}`;
        
         // Cek apakah ada tableNumber, jika ada tambahkan ke URL
        if (tableNumber) {
            window.location.href = url + `&table=${encodeURIComponent(tableNumber)}`;
        } else {
            window.location.href = url;
        }
    }
</script>    
</body>
</html>