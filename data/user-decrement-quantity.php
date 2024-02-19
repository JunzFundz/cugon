<?php
$conn = new mysqli("localhost", "root", "fundador142", "cugondb");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_id = $_POST['itemID']; 
    
    $sql = "UPDATE cart SET item_quantity=item_quantity-1 WHERE item_id='$item_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Quantity decremented successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
