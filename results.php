<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styles.css">  
<meta charset="utf-8">
<title>Soaring Drones - Results</title>

</head>
<body>

<h1>Soaring Drones - Results</h1>

<?php

// Check that the form has been submitted
if ($_POST) {

        $form_manufacturer_name = $_POST['manufacturer_name'];

if (isset($_POST['obstacle_detection'])) {
        $form_obstacle_detection = $_POST['obstacle_detection'];
    }
else {
    $form_obstacle_detection = "";
    }

// Check if the camera resolution data exists
if (isset($_POST['camera_resolution'])) {
    $form_camera_resolution = $_POST['camera_resolution'];
    }
    else {
    $form_camera_resolution = "";
    }

// Check if the maximum flight time data exists
if (isset($_POST['max_flight_time'])) {
    $form_max_flight_time = $_POST['max_flight_time'];
    }
    else {
    $form_max_flight_time = "";
    }

    // Check if the lowest price data exists
    if (isset($_POST['lowest_price'])) {
        $form_lowest_price = $_POST['lowest_price'];
        }
        else {
        $form_lowest_price = "";
        }

    // Check if the highest price data exists
    if (isset($_POST['highest_price'])) {
        $form_highest_price = $_POST['highest_price'];
        }
        else {
        $form_highest_price = "";
        }

// Trim any trailing and leading spaces from the form data
$form_camera_resolution = trim($form_camera_resolution);
$form_max_flight_time = trim($form_max_flight_time);
$form_lowest_price = trim($form_lowest_price);
$form_highest_price = trim($form_highest_price);
$form_obstacle_detection = trim($form_obstacle_detection);

// Open a connection to the database
$link = mysqli_connect('localhost', 'student', 'mmst12009', 'assignment3');

    // Define a query that retrieves the list of drones
    $query= "
    SELECT
    drones.drone_id,
    drones.drone_name,
    manufacturers.manufacturer_name,
    manufacturers.manufacturer_id,
    drones.manufacturer_id,
    drones.drone_mp,
    drones.drone_mins,
    drones.drone_od,
    drones.drone_price
    FROM drones, manufacturers
    WHERE drones.manufacturer_id = manufacturers.manufacturer_id
    ";

// Restrict the SQL query with an AND clause if obstacle_detection is answered 'Yes'
if ($form_obstacle_detection > 0) {
    $query .= "AND drones.drone_od = 'Yes' ";
  }

// Restrict the SQL query with an AND clause if obstacle_detection is answered 'No'
if ($form_obstacle_detection < 0) {
    $query .= "AND drones.drone_od = 'No' ";
}

// Restrict the SQL query with an AND clause if a manufacturer name has been supplied
if ($form_manufacturer_name != 0) {
    $query .= "AND drones.manufacturer_id = $form_manufacturer_name ";
}

// Restrict the SQL query with an AND clause if a camera resolution has been supplied
if ($form_camera_resolution != 0) {
    $query .= "AND drones.drone_mp = $form_camera_resolution ";
}

// Restrict the SQL query with an AND clause if a maximum flight time has been supplied
if ($form_max_flight_time != 0) {
    $query .= "AND drones.drone_mins <= $form_max_flight_time ";
}

// Restrict the SQL query with an AND clause if a price range has been supplied
    // Lowest (greater than or equal to)
    if ($form_lowest_price != 0) {  
    $query .= "AND drones.drone_price >= $form_lowest_price ";
    }
    // Highest (less than or equal to)
    if ($form_highest_price != 0) {
        $query .= "AND drones.drone_price <= $form_highest_price ";
    }

// Run the query and store the result
 $result = mysqli_query($link, $query);
 // Get the number of rows in the result set
 $number_of_rows = mysqli_num_rows($result);
 // Close the connection to the database
 mysqli_close($link);
// Exit from the script if no records have been retrieved
if ($number_of_rows < 1) {
    echo <<<END
    <h2>There are no matching records in the database. Use the
   Back button on your web browser to return to the previous
   page and try again.</h2>
   END;
    }
    else {

    // Display the table's column headings
echo <<<END
<h2>Search results are presented below.</h2>
<table border="1">
    <tr>
        <th>ID number</th>
        <th>Drone name</th>
        <th>Manufacturer</th>
        <th>Camera resolution (megapixels)</th>
        <th>Maximum flight time (minutes)</th>
        <th>Object Detection</th>
        <th>Price</th>
    </tr>
END;

// Assign each record in the result to an array
while($row=mysqli_fetch_array($result)) {

// Assign each array element to a variable
$drone_id=$row['drone_id'];
$drone_name=$row['drone_name'];
$manufacturer_name=$row['manufacturer_name'];
$drone_mp=$row['drone_mp'];
$drone_mins=$row['drone_mins'];
$drone_od=$row['drone_od'];
$drone_price=number_format($row['drone_price'],2);

// Display a table row for each record
echo <<<END
<tr>
<td>$drone_id</td>
<td>$drone_name</td>
<td>$manufacturer_name</td>
<td>$drone_mp</td>
<td>$drone_mins</td>
<td>$drone_od</td>
<td>$$drone_price</td>
</tr>
END;

}
echo "</table>";
}
}
?>


</body>
</html>