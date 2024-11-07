<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peys App</title>
    <style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 100vh;
        background-color: #f8f9fa;
    }
    form {
        border: 2px solid #000000; 
        border-radius: 8px; 
        box-shadow: 0 4px 8px  #585858FF; 
        padding: 20px; 
        background-color:  #EBEBEBFF; 
    }
    .image-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }
</style>
</head>
<body>

<?php
// Set default values
$size = isset($_POST['size']) && is_numeric($_POST['size']) ? intval($_POST['size']) : 60; 
$borderColor = isset($_POST['borderColor']) ? $_POST['borderColor'] : '#000000';  

$canvasWidth = $size;
$canvasHeight = $size;
?>

<form id="settingsForm" method="post">
    <h1>Peys App</h1>
    <label for="size">Select Photo Size:</label>
    <input type="range" id="sizeSlider" name="size" min="40" max="500" value="<?php echo htmlspecialchars($size); ?>" step="10"
        oninput="this.nextElementSibling.value = this.value">
    <output><?php echo htmlspecialchars($size); ?></output>
    
    <br><br>

    <label for="borderColor">Select Border Color:</label>
    <input type="color" id="borderColor" name="borderColor" value="<?php echo htmlspecialchars($borderColor); ?>">
    <br><br>

    <button type="submit" name="submit">Process</button>
    <br><br>

    <div class="image-container" style="border:3px solid <?php echo htmlspecialchars($borderColor); ?>; width: <?php echo $canvasWidth; ?>px; height: <?php echo $canvasHeight; ?>px; overflow:hidden;">
        <img src="/assets/images/profile2.jpg" alt="Image for Canvas" width="<?php echo $canvasWidth; ?>" height="<?php echo $canvasHeight; ?>">
    </div>

</form>

</body>
</html>