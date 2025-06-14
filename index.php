<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodie - Welcome</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://unpkg.com/html5-qrcode"></script>

</head>
<body>
    <div class="qr-scanner-page">
        <div class="qr-container">
            <div class="logo-container">
                <img class="logo" src="./assets/logo/LogoFoodie.png" alt="" srcset="">
            </div>
            
            <div class="scanner-box">
                <div class="scanner-header">
                    <h2>Scan QR Code</h2>
                    <p>Scan the QR code on your table to start ordering</p>
                </div>
                
                <div id="qr-reader"></div>
                
                <div class="scanner-footer">
                    <p>Having trouble scanning? Try the demo tables below.</p>
                </div>
            </div>
            
            <div class="demo-buttons">
                <p>Demo Tables:</p>
                <div class="table-buttons">
                    <button onclick="window.location.href='customer/index.html?table=A1'" data-table="A1">Table A1</button>
                    <button onclick="window.location.href='customer/index.html?table=A2'" data-table="A2">Table A2</button>
                    <button onclick="window.location.href='customer/index.html?table=B1'" data-table="B1">Table B1</button>
                    <button onclick="window.location.href='customer/index.html?table=B2'" data-table="B2">Table B2</button>
                </div>
            </div>
            
            <div class="login-link">
                <p>Login as <a href="login_cashier.html">Cashier</a> or  <a href="login_restaurant.html">Restaurant</a></p>
            </div>
        </div>
    </div>
</body>
</html>