<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styles.css">
<meta charset="utf-8">
<title>Soaring Drones - Search</title>
</head>
<body>

<h1>Soaring Drones - Search</h1>
<h2>Search our database of drones by supplying the following details.</h2>

<form action="results.php" method="POST">
    <!-- Manufacturer name drop-down menu (Dynamically populated) -->
    <p><label for="manufacturer_name">Manufacturer name:</label><br>
    <select name="manufacturer_name">
        <option value="0">Any</option></p>

        <?php
        // Open a connection to the database
        $link=mysqli_connect('localhost','student','mmst12009','assignment3');
        // Define a query that retrieves the list of manufacturer names
        $query="SELECT manufacturers.manufacturer_id, manufacturers.manufacturer_name
        FROM manufacturers";
        // Run the query and store the result
        $result=mysqli_query($link,$query);
        // Assign each record in the result to an array
        while($row=mysqli_fetch_array($result))
        {
        // Assign each array element to a variable
        $manufacturer_id=$row['manufacturer_id'];
        $manufacturer_name=$row['manufacturer_name'];

        // Dynamically populate the selection list with the manufacturer names
        echo <<<END
        <option value="$manufacturer_id">$manufacturer_name</option>
        END;
        }
        ?>
        </select><br>
        
    <!-- Camera Resolution input box -->
    <p><label for="camera_resolution">Camera resolution (megapixels):</label><br>
    <input type="number" id="camera_resolution" name="camera_resolution"><br></p>
    
    <!-- Maximum flight time input box -->
    <p><label for="max_flight_time">Maximum flight time (minutes):</label><br>
    <input type="number" id="max_flight_time" name="max_flight_time"><br></p>

    <!-- Obstacle detection yes/no radio buttons -->
    <p><label for="obstacle_detection">Obstacle detection:</label><br>
    <div class="radiobuttons"></p>
    <p>
    <input type="radio" id="yes" name="obstacle_detection" value=1><label for="yes">Yes</label><br>
    <input type="radio" id="no" name="obstacle_detection" value=-1><label for="no">No</label><br>
    </div>
    </p>

    <!-- Lowest price input box -->
    <p><label for="lowest_price">Lowest price:</label><br>
    $<input type="number" id="lowest_price" name="lowest_price"><br></p>

    <!-- Highest price input box -->
    <p><label for="highest_price">Highest price:</label><br>
    $<input type="number" id="highest_price" name="highest_price"><br></p>
    
    <br>

    <!-- Submit button -->
    <input type="submit" value="Submit Query">

    <!-- Reset Button -->
    <input type="reset" value="Reset">

</form>

</body>
</html>