<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodie - Cart</title>
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
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
                <h1 class="page-title">Cart</h1>
            </div>
            <div class="header-right">
                <div class="table-info">
                    <span class="table-label">Table:</span>
                    <span id="table-id" class="table-id">A1</span>
                </div>
            </div>
        </div>
    </header>
    
    <main class="cart-container">
        <div class="order-type">
            <h2>Order Type: <span>Dine In</span></h2>
        </div>
        
        <div class="cart-items-container">
            <h2>Your Items</h2>
            <ul id="cart-items" class="cart-items">
                <!-- Cart items will be populated via JavaScript -->
                <div class="item-customization">
                    <div class="item-note">
                        <div class="item-details">
                            <div class="item-name-quantity">
                                <span id="item-quantity" class="item-quantity">x </span>
                                <span id="item-name" class="item-name"></span>
                            </div>
                        </div>
                        <div class="item-price-actions">
                            <div id="item-price" class="item-price"></div>
                            <div class="item-actions">
                                <i class="fas fa-trash-alt remove-item" data-index="${index}"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </ul>
        </div>
        
        <div class="additional-notes">
            <h2>Additional Notes</h2>
            <textarea id="additional-notes" placeholder="Add any additional notes for your entire order..."></textarea>
        </div>
        
        <div class="order-summary">
            <h2>Order Summary</h2>
            <div class="summary-line">
                <span>Subtotal</span>
                <span id="subtotal">Rp 0</span>
            </div>
            <div class="summary-line">
                <span>Tax (10%)</span>
                <span id="tax">Rp 0</span>
            </div>
            <div class="summary-line total">
                <span>Total</span>
                <span id="grand-total">Rp 0</span>
            </div>
        </div>
    </main>
    
    <div class="checkout-actions">
        <a href="index.html" class="add-more-button">Add More Items</a>
        <a href="checkout.html" class="proceed-button">Proceed to Payment</a>
    </div>
    
    <!-- Bottom Navigation -->
    <div class="bottom-nav">
        <a href="index.html" class="bottom-nav-item">
            <div class="bottom-nav-icon"><i class="fas fa-home"></i></div>
            <span>Home</span>
        </a>
        <a href="#" class="bottom-nav-item">
            <div class="bottom-nav-icon"><i class="fas fa-search"></i></div>
            <span>Search</span>
        </a>
        <a href="cart.html" class="bottom-nav-item active">
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

    const quantity = params.get("quantity");
    const price = params.get("price");
    const name = params.get("name");
    const restaurant = params.get("restaurant");
    const description = params.get("desc");
    const extraRice = params.get("extraRice");
    const extraSauce = params.get("extraSauce");
    const harga = params.get("harga");


    document.getElementById("item-quantity").textContent = quantity + "x";
    document.getElementById("item-price").textContent = price;
    // document.getElementById("item-name").textContent = name + " (" + restaurant + ")" + " + ";

    if (extraRice == "true" || extraSauce == "true") {
        document.getElementById("item-name").textContent = name + " ( Rp" + harga + ")" + " + ";
        if (extraRice == "true") {
            document.getElementById("item-name").textContent += " Extra Rice (Rp 5.000) ";
        }
        if (extraSauce == "true") {
            document.getElementById("item-name").textContent += " Extra Sauce (Rp 3.000) ";
        }
    } else {
        document.getElementById("item-name").textContent = name + " ( Rp" + harga + ")";
    }

    const subtotal = parseInt(price.replace("Rp ", "").replace(".", ""));
    const tax = subtotal * 0.1;
    const grandTotal = subtotal + tax;

    document.getElementById("subtotal").textContent = "Rp " + subtotal;
    document.getElementById("tax").textContent = "Rp " + tax;
    document.getElementById("grand-total").textContent = "Rp " + grandTotal;



// Get the proceed button element
const proceedButton = document.querySelector('.proceed-button');

// Add event listener to the proceed button
proceedButton.addEventListener('click', function(event) {
    // Prevent the default action
    event.preventDefault();
    
    // Get values from the cart page
    const tableNumber = document.getElementById("table-id").textContent;
    const subtotal = document.getElementById("subtotal").textContent;
    const tax = document.getElementById("tax").textContent;
    const grandTotal = document.getElementById("grand-total").textContent;
    const additionalNotes = document.getElementById("additional-notes").value;
    
    // Get item details
    const itemName = document.getElementById("item-name").textContent;
    const itemQuantity = document.getElementById("item-quantity").textContent;
    const itemPrice = document.getElementById("item-price").textContent;
    
    // Build the URL with query parameters
    let url = `checkout.html?subtotal=${encodeURIComponent(subtotal)}&tax=${encodeURIComponent(tax)}&grandTotal=${encodeURIComponent(grandTotal)}&notes=${encodeURIComponent(additionalNotes)}&itemName=${encodeURIComponent(itemName)}&itemQuantity=${encodeURIComponent(itemQuantity)}&itemPrice=${encodeURIComponent(itemPrice)}`;
    
    // Add table number if it exists
    if (tableNumber) {
        url += `&table=${encodeURIComponent(tableNumber)}`;
    }
    
    // Redirect to checkout page
    window.location.href = url;
});

    
    </script>
</body>
</html>

