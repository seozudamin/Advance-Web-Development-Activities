<?php
// Initialize variables
$selectedItems = array();
$totalAmount = 0;
$quantity = 1;
$errorMessage = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if at least one product is selected
    if (isset($_POST['products']) && !empty($_POST['products'])) {
        foreach ($_POST['products'] as $product) {
            $selectedItems[] = $product;
            $price = (int) filter_var($product, FILTER_SANITIZE_NUMBER_INT);
            $totalAmount += $price;
        }
    } else {
        $errorMessage .= "No product selected. Please select at least one product.<br>";
    }

    // Check if a size is selected
    if (isset($_POST['size'])) {
        $sizeAdjustment = 0;
        switch ($_POST['size']) {
            case 'Medium (+5)':
                $sizeAdjustment = 5;
                break;
            case 'Large (+10)':
                $sizeAdjustment = 10;
                break;
            default:
                $sizeAdjustment = 0;
                break;
        }
    } else {
        $errorMessage .= "No size selected. Please select a size option.<br>";
    }

    // Check if quantity is valid
    if (isset($_POST['quantity']) && $_POST['quantity'] > 0) {
        $quantity = (int) $_POST['quantity'];
        $totalAmount = ($totalAmount + $sizeAdjustment) * $quantity;
    } else {
        $errorMessage .= "Please enter a valid quantity greater than 0.<br>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Vendo Machine</title>
    <style>
        .bordered {
            border: 2px solid #000;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .product-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <h1>Vendo Machine</h1>
    <form method="post">
        <div class="bordered">
            <h2>Products:</h2>
            <div>
                <div class="product-item">
                    <label>
                        <input type="checkbox" name="products[]" value="Coke  P 15" <?php echo (isset($_POST['products']) && in_array("Coke  P 15", $_POST['products'])) ? 'checked' : ''; ?>> Coke - P 15
                    </label>
                </div>
                <div class="product-item">
                    <label>
                        <input type="checkbox" name="products[]" value="Sprite  P 20" <?php echo (isset($_POST['products']) && in_array("Sprite  P 20", $_POST['products'])) ? 'checked' : ''; ?>> Sprite - P 20
                    </label>
                </div>
                <div class="product-item">
                    <label>
                        <input type="checkbox" name="products[]" value="Royal  P 20" <?php echo (isset($_POST['products']) && in_array("Royal  P 20", $_POST['products'])) ? 'checked' : ''; ?>> Royal - P 20
                    </label>
                </div>
                <div class="product-item">
                    <label>
                        <input type="checkbox" name="products[]" value="Pepsi  P 15" <?php echo (isset($_POST['products']) && in_array("Pepsi  P 15", $_POST['products'])) ? 'checked' : ''; ?>> Pepsi - P 15
                    </label>
                </div>
                <div class="product-item">
                    <label>
                        <input type="checkbox" name="products[]" value="Mountain Dew  P 20" <?php echo (isset($_POST['products']) && in_array("Mountain Dew  P 20", $_POST['products'])) ? 'checked' : ''; ?>> Mountain Dew - P 20
                    </label>
                </div>
            </div>
        </div>
        <div class="bordered">
            <h2>Size Options:</h2>
            <div>
                <div class="size-options">
                    <label>
                        <input type="radio" name="size" value="Regular (+0 )" <?php echo (isset($_POST['size']) && $_POST['size'] == "Regular (+0 )") ? 'checked' : ''; ?>> Regular
                    </label>
                    <label>
                        <input type="radio" name="size" value="Medium (+5)" <?php echo (isset($_POST['size']) && $_POST['size'] == "Medium (+5)") ? 'checked' : ''; ?>> Medium (+5)
                    </label>
                    <label>
                        <input type="radio" name="size" value="Large (+10)" <?php echo (isset($_POST['size']) && $_POST['size'] == "Large (+10)") ? 'checked' : ''; ?>> Large (+10)
                    </label>
                </div>
            </div>
        </div>
        <div class="bordered">
            <h2>Quantity:</h2>
            <input type="number" name="quantity"
                value="<?php echo (isset($_POST['quantity'])) ? $_POST['quantity'] : '1'; ?>" min="1"><br>
            <br>
            <input type="submit" value="Check out">
        </div>

        <hr>

        <?php
        if (!empty($errorMessage)) {
            echo "<p class='error'>$errorMessage</p>";
        }

        // Display the summary
        if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errorMessage)) {
            echo "<h2>Purchase Summary:</h2>";
            foreach ($selectedItems as $item) {
                // Extract the item name without the price
                $itemName = preg_replace('/\sP\s\d+/', '', $item);
                $basePrice = (int) filter_var($item, FILTER_SANITIZE_NUMBER_INT);
                $sizeText = "";
                $adjustedPrice = $basePrice;

                // Determine the size text and adjust the price accordingly
                if (isset($_POST['size'])) {
                    switch ($_POST['size']) {
                        case 'Medium (+5)':
                            $sizeText = "Medium";
                            $adjustedPrice += 5;
                            break;
                        case 'Large (+10)':
                            $sizeText = "Large";
                            $adjustedPrice += 10;
                            break;
                        default:
                            $sizeText = "Regular";
                            break;
                    }
                }
                // Determine the correct quantity text
                $quantityText = ($quantity == 1) ? "piece" : "pieces";

                // Display each item and its details
                echo "<ul>";
                echo "<li>{$quantity} {$quantityText} of {$sizeText} {$itemName} amounting to P {$adjustedPrice} each</li>";
                echo "</ul>";
            }
            // Display total items and amount
            echo "Total number of Items: $quantity<br>";
            echo "Total Amount: P " . $totalAmount . "<br>";
        }
        ?>
    </form>
</body>

</html>