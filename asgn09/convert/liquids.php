<?php

function convert_to_gallons($value, $fromUnit) {
  switch($fromUnit) {
    case 'buckets':
      return $value * 4;
      break;
    case 'butts':
      return $value * 108;
      break;
    case 'firkins':
      return $value * 9;
      break;
    case 'hogsheads':
      return $value * 54;
      break;
    case 'pints':
      return $value * 0.125;
      break;
    default:
      return "Unsupported unit.";
  }
}
  
function convert_from_gallons($value, $toUnit) {
  switch($toUnit) {
    case 'buckets':
      return $value / 4;
      break;
    case 'butts':
      return $value / 108;
      break;
    case 'firkins':
      return $value / 9;
      break;
    case 'hogsheads':
      return $value / 54;
      break;
    case 'pints':
      return $value / 0.125;
      break;
    default:
      return "Unsupported unit.";
  }
}

function convert_unit($value, $fromUnit, $toUnit) {
  $gallonValue = convert_to_gallons($value, $fromUnit);
  $newValue = convert_from_gallons($gallonValue, $toUnit);
  return $newValue;
}

$fromValue = '';
$fromUnit = '';
$toUnit = '';
$toValue = '';

if($_POST['submit']) {
  $fromValue = $_POST['fromValue'];
  $fromUnit = $_POST['fromUnit'];
  $toUnit = $_POST['toUnit'];
  
  $toValue = convert_unit($fromValue, $fromUnit, $toUnit);
}

?>

<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>Convert Liquids</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
  </head>
  
  <body>
    <div id="main-content">
      <h1>Volumizer</h1>
      <form action="" method="post">
        <div class="entry">
          <label>From:</label>&nbsp;
          <input type="text" name="fromValue" value="<?php echo $fromValue; ?>">&nbsp;
          
          <select name="fromUnit">
            <option value="buckets"<?php if($fromUnit == 'buckets') { echo " selected"; } ?>>Buckets</option>
            <option value="butts"<?php if($fromUnit == 'butts') { echo " selected"; } ?>>Butts</option>
            <option value="firkins"<?php if($fromUnit == 'firkins') { echo " selected"; } ?>>Firkins</option>
            <option value="hogsheads"<?php if($fromUnit == 'hogsheads') { echo " selected"; } ?>>Hogs Heads</option>
            <option value="impGallons"<?php if($fromUnit == 'impGallons') { echo " selected"; } ?>>Imperial Gallons</option>
            <option value="pints"<?php if($fromUnit == 'pints') { echo " selected"; } ?>>Pints</option>
          </select>
        </div>
        
        <div class="entry">
          <label>To:</label>&nbsp;
          <input type="text" name="toValue" value="<?php echo $toValue; ?>">&nbsp;
          <select name="toUnit">
            <option value="buckets"<?php if($toUnit == 'buckets') { echo " selected"; } ?>>Buckets</option>
            <option value="butts"<?php if($toUnit == 'butts') { echo " selected"; } ?>>Butts</option>
            <option value="firkins"<?php if($toUnit == 'firkins') { echo " selected"; } ?>>Firkins</option>
            <option value="hogsheads"<?php if($toUnit == 'hogsheads') { echo " selected"; } ?>>Hogs Heads</option>
            <option value="impGallons"<?php if($toUnit == 'impGallons') { echo " selected"; } ?>>Imperial Gallons</option>
            <option value="pints"<?php if($toUnit == 'pints') { echo " selected"; } ?>>Pints</option>
          </select>
        </div>
        <input type="submit" name="submit" value="Submit">
      </form>
      <br>
      <a href="index.php">Return to Menu</a>
    </div>
  </body>
  
</html>
