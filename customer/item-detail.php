<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodie - Item Detail</title>
    <link rel="stylesheet" href="./styles-detail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <div class="header-container">
            <div class="header-left">
                <a href="javascript:history.back()" class="back-button">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h1 class="page-title">Item Detail</h1>
            </div>
            <div class="header-right">
                <div class="table-info">
                    <span class="table-label">Table:</span>
                    <span id="table-id" class="table-id">##</span>
                </div>
            </div>
        </div>
    </header>

    <main class="item-detail-container">
        <div class="item-image-container">
            <img id="item-image" src="/placeholder.svg" alt="Food Item">
        </div>

        <div class="item-right-content">
            <div class="item-info">
                <h2 id="item-name" class="item-name"></h2>
                <p id="item-description" class="item-description"></p>
                <p id="item-price" class="item-price"></p>
                <p id="item-restaurant" class="item-restaurant"></p>
            </div>

            <div class="item-options">
                <div class="quantity-selector">
                    <h3>Quantity</h3>
                    <div class="quantity-control">
                        <button id="decrease-quantity" class="quantity-button">-</button>
                        <input type="number" id="quantity" value="1" min="1" max="99">
                        <button id="increase-quantity" class="quantity-button">+</button>
                    </div>
                </div>

                <div id="food-options" class="food-options">
                    <h3>Extras</h3>
                    <div class="option-checkbox">
                        <input type="checkbox" id="extra-rice" name="extra-rice" value="Extra Rice">
                        <label for="extra-rice">Extra Rice (+Rp 5,000)</label>
                    </div>
                    <div class="option-checkbox">
                        <input type="checkbox" id="extra-sauce" name="extra-sauce" value="Extra Sauce">
                        <label for="extra-sauce">Extra Sauce (+Rp 3,000)</label>
                    </div>
                </div>

                <div id="drink-options" class="drink-options hidden">
                    <h3>Cup Size</h3>
                    <div class="option-radio">
                        <input type="radio" id="size-s" name="cup-size" value="S" checked>
                        <label for="size-s">S</label>

                        <input type="radio" id="size-m" name="cup-size" value="M">
                        <label for="size-m">M (+Rp 5,000)</label>

                        <input type="radio" id="size-l" name="cup-size" value="L">
                        <label for="size-l">L (+Rp 10,000)</label>
                    </div>

                    <h3>Toppings</h3>
                    <div class="option-checkbox">
                        <input type="checkbox" id="bubble" name="topping" value="Bubble">
                        <label for="bubble">Bubble (+Rp 5,000)</label>
                    </div>
                    <div class="option-checkbox">
                        <input type="checkbox" id="jelly" name="topping" value="Jelly">
                        <label for="jelly">Jelly (+Rp 5,000)</label>
                    </div>
                </div>

                <div class="notes-section">
                    <h3>Special Request</h3>
                    <textarea id="notes" placeholder="Add your special request here..."></textarea>
                </div>
            </div>

            <div class="add-to-cart-container">
                <div class="total-price-display">
                    <span class="total-label">Total:</span>
                    <span id="total-item-price" class="total-price">Rp 0</span>
                </div>
                <button id="add-to-cart" onclick="redirectToCart()" class="add-to-cart-button">Add to Cart</button>
            </div>
        </div>
    </main>

    <div class="bottom-nav">
        <a href="index.html" class="bottom-nav-item">
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
        const table = params.get("table");
        document.getElementById("table-id").textContent = table;

        const quantityInput = document.getElementById("quantity");
        const increaseButton = document.getElementById("increase-quantity");
        const decreaseButton = document.getElementById("decrease-quantity"); 

        const price = params.get("price");
        const numericPrice = parseInt(price.replace("Rp ", "").replace(".", ""));
        const name = params.get("name");
        const restaurant = params.get("restaurant");
        const description = params.get("desc");
        const img = params.get("img");
        const match = img.match(/url\(["']?(.*?)["']?\)/);
        const imageUrl = match ? match[1] : "";

        const extraRiceCheckbox = document.getElementById("extra-rice");
        const extraSauceCheckbox = document.getElementById("extra-sauce");

        function updateTotal() {
            let totalHarga = parseInt(quantityInput.value) * numericPrice;
            if (extraRiceCheckbox.checked) totalHarga += 5000;
            if (extraSauceCheckbox.checked) totalHarga += 3000;
            document.getElementById("total-item-price").textContent = `Rp ${totalHarga.toLocaleString("id-ID")}`;
        }

        extraRiceCheckbox.addEventListener("change", updateTotal);
        extraSauceCheckbox.addEventListener("change", updateTotal);

        quantityInput.addEventListener("input", updateTotal);

        increaseButton.addEventListener("click", function() {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue < 99) quantityInput.value = currentValue + 1;
            updateTotal();
        });

        decreaseButton.addEventListener("click", function() {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) quantityInput.value = currentValue - 1;
            updateTotal();
        });

        document.getElementById("item-name").textContent = name;
        document.getElementById("item-restaurant").textContent = restaurant;
        document.getElementById("item-description").textContent = description;
        document.getElementById("item-image").src = imageUrl;
        updateTotal();

        function redirectToCart() {
            const tableNumber = document.getElementById("table-id").textContent;
            const quantity = document.getElementById("quantity").value;
            const extraRice = document.getElementById("extra-rice").checked;
            const extraSauce = document.getElementById("extra-sauce").checked;
            const notes = document.getElementById("notes").value;
            const price = document.getElementById("total-item-price").textContent;
            const url = `cart.php?name=${encodeURIComponent(name)}&restaurant=${encodeURIComponent(restaurant)}&harga=${encodeURIComponent(numericPrice)}&notes=${encodeURIComponent(notes)}&extraRice=${encodeURIComponent(extraRice)}&extraSauce=${encodeURIComponent(extraSauce)}&price=${encodeURIComponent(price)}&desc=${encodeURIComponent(description)}&img=${encodeURIComponent(img)}&quantity=${encodeURIComponent(quantity)}`;

            window.location.href = tableNumber ? url + `&table=${encodeURIComponent(tableNumber)}` : url;
        }
    </script>
</body>
</html>
