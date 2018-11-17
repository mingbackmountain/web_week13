<!-- Thanakorn Pasangthien 6088109 -->
<html>
    <head>
        <title>Student List</title>
    </head>
    <body>
        <h1>Student List</h1>
        <table border="2">
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Birthdate</th>
                    <th>Mobilephone</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody>
          <?php 
            $sum = 0;
            $connect = mysqli_connect('localhost','root','','student');
            $sql = "SELECT *, YEAR(CURDATE()) - YEAR(Birthdate) as Age FROM personal_info;";
            $result = $connect->query($sql);
         if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
                echo "<tr><th>" . $row["Firstname"]. "</th>";
                echo "<th>".$row["Lastname"]."</th>"; 
                 echo "<th>".$row["Birthdate"]."</th>"; 
                 echo "<th>".$row["Mobilephone"]."</th>"; 
                 echo "<th>".$row["Age"]."</th>"; 
                 echo "</tr>";
                 $sum += $row["Age"];
             }
         } else {
            echo "0 results";
         }
         $connect->close();
            ?>
            </tbody>
        </table>
        <?php
            echo 'Total value of age of all student is '.$sum;
        ?>
    </body>
</html>