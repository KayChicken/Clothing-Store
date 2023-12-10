<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Information</title>
    <link rel="stylesheet" href="checkout.css">
   
</head>
<body>

<div class="delivery-form">
    <h2>Delivery Information</h2>
    <form class='dilivery-form'>
        <div class="input-block">
            <label for="fullName">Full Name:</label>
            <input type="text" id="fullName" name="fullName" required>
            <small class='input-error'></small>
        </div>

        <div class="input-block">
            <label for="city">City:</label>
            <input type="text" id="city" name="city" required>
            <small class='input-error'></small>
        </div>

        <div class="input-block">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>
            <small class='input-error'></small>
        </div>

        <div class="input-block">
            <label for="phoneNumber">Phone Number:</label>
            <input type="tel" id="phoneNumber" name="phoneNumber" required>
            <small class='input-error'></small>
        </div>

        <button type="submit">Submit</button>
    </form>
</div>
<script src='checkout.js'></script>
</body>
</html>
