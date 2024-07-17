<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM nama_tabel WHERE ItemID = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $itemName = $_POST['itemName'];
    $categoryID = $_POST['categoryID'];
    $locationID = $_POST['locationID'];
    $quantity = $_POST['quantity'];
    $purchaseDate = $_POST['purchaseDate'];
    $price = $_POST['price'];

    $sql = "UPDATE nama_tabel SET ItemName='$itemName', CategoryID='$categoryID', LocationID='$locationID', Quantity='$quantity', PurchaseDate='$purchaseDate', Price='$price' WHERE ItemID=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Item</title>
</head>
<body>
    <h2>Edit Item</h2>
    <form method="post" action="edit.php">
        <input type="hidden" name="id" value="<?= $row['ItemID']; ?>">
        Item Name: <input type="text" name="itemName" value="<?= $row['ItemName']; ?>"><br>
        Category ID: <input type="text" name="categoryID" value="<?= $row['CategoryID']; ?>"><br>
        Location ID: <input type="text" name="locationID" value="<?= $row['LocationID']; ?>"><br>
        Quantity: <input type="text" name="quantity" value="<?= $row['Quantity']; ?>"><br>
        Purchase Date: <input type="text" name="purchaseDate" value="<?= $row['PurchaseDate']; ?>"><br>
        Price: <input type="text" name="price" value="<?= $row['Price']; ?>"><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
