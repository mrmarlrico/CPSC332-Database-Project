<html>
    <body>
        <?php
        
        $link = mysqli_connect('mariadb', 'cs332s30','iDl06Vq9','cs332s30');
        if (!$link) {
            die('Could not connect: ' . mysql_error());
        }
                
        $CWID = $_POST["cwid"];
        
        $query = "SELECT CWID, ec.Course_num, Title, Grade FROM Enrollment_rec as ec, Course as cr 
                  WHERE ec.Course_num = cr.Course_num and ec.CWID = " .$CWID;

        $result = $link->query($query);

        if ($result->num_rows > 0) {
            // output data of each row
            echo "CWID - " .$CWID. "<br>";
            while($row = $result->fetch_assoc()) {
                echo "Course number: " . $row["Course_num"]. " - Title: " .$row["Title"]. " - Grade: " . $row["Grade"].  "<br>";
            }
        }
        else {
            echo "0 results";
        }
        
        $result->free_result();
        $link->close();
        
        ?>
    </body>
</html>