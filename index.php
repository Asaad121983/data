
 <?php
    // Connect to the database
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "orders";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // Retrieve data from the form
    $product = validate_input($_POST['product']);
    $quantity = validate_input($_POST['quantity']);
    $customer_name = validate_input($_POST['customer_name']);
    $customer_email = validate_input($_POST['customer_email']);
    
    // Validate inputs
    if (empty($product) || empty($quantity) || empty($customer_name) || empty($customer_email)) {
        die("Error: Please fill out all fields");
    }
    
    if (!filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
        die("Error: Invalid email format");
    }
    
    // Prepare SQL statement and bind parameters
    $stmt = $conn->prepare("INSERT INTO orders (product, quantity, customer_name, customer_email) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $product, $quantity, $customer_name, $customer_email);
    
    // Execute statement
    if ($stmt->execute() === TRUE) {
        echo "Order placed successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close connection
    $stmt->close();
    $conn->close();
    
    // Function to validate user input
    function validate_input($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }
    ?>

    
    <!DOCTYPE html>
    <html>
    
<head>
	<title>Order11111 Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">


</head>
<body>
	<h1>Order Form</h1>
	<form method="POST" action="process_order.php" onsubmit="return validateForm()">
		<label for="product">Product:</label>
		<input type="text" name="product" id="product">
		<label for="quantity">Quantity:</label>
		<input type="number" name="quantity" id="quantity">
		<label for="customer_name">Name:</label>
		<input type="text" name="customer_name" id="customer_name">
		<label for="customer_email">Email:</label>
		<input type="email" name="customer_email" id="customer_email">
		<input type="submit" value="Place Order">
	</form>
	<script src="script.js"></script>
</body>
</html>

