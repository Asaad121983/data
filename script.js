function validateForm() {
    var product = document.forms["orderForm"]["product"].value;
    var quantity = document.forms["orderForm"]["quantity"].value;
    var customer_name = document.forms["orderForm"]["customer_name"].value;
    var customer_email = document.forms["orderForm"]["customer_email"].value;
  
    if (product == "") {
      alert("Product name must be filled out");
      return false;
    }
  
    if (quantity == "") {
      alert("Quantity must be filled out");
      return false;
    }
  
    if (customer_name == "") {
      alert("Name must be filled out");
      return false;
    }
  
    if (customer_email == "") {
      alert("Email must be filled out");
      return false;
    }
  }
  