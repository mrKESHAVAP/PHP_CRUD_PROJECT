<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Details</title>
</head>
<body>
    <h2>View Details</h2>

    <!-- Display Records -->
    <table border="1">
        <tr>
            <th>Name</th>
            <th>USN</th>
            <th>Phone Number</th>

        </tr>

        <?php
        /*if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $usn = $_POST['usn'];
            $phone = $_POST['phone'];*/

        $conn = new mysqli('localhost', 'root', '', 'wshop');// Add the relevant code here to connect to the database
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $search_query = "";
        if (isset($_GET['query'])) {
            $search_query = $_GET['query'];
        }

        $sort_by = "name";
        if (isset($_GET['sort'])) {
            $sort_by = $_GET['sort'];
        }

        $sql = "SELECT name,usn, phone FROM students";
        $result = $conn->query($sql);
   
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>

                        <td>" . $row["name"] . "</td>
                        <td>" . $row["usn"] . "</td>
                        <td>" . $row["phone"] . "</td>
                        
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No records found</td></tr>";
        }
    
        $conn->close();
        
        ?>
          
    </table>
</body>
</html>
