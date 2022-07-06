<html>
    <body>
        <?php
        // username and password need to be replaced by your username and password
        $link = mysqli_connect('mariadb', 'cs332s30', 'iDl06Vq9','cs332s30');
        if (!$link) {
            die('Could not connect: ' . mysql_error());
        }

        $CNO = $_POST['cno'];
        $SECNO = $_POST['secno'];

        $query = "SELECT Grade, COUNT(Grade) 
                  FROM Enrollment_rec as ec 
                  WHERE ec.Course_num = '".$CNO."' and ec.Section_num = '".$SECNO."'
                  GROUP BY Grade 
                  ORDER BY Grade ASC;";

        $result = $link->query($query);

        if ($result->num_rows > 0) {
            // output data of each row
            echo "Course Number: " .$CNO. " Section Number: " .$SECNO.  "<br>";
            while($row = $result->fetch_assoc()) {
                echo "Grade: " . $row["Grade"]. " - No. of students: " .$row["COUNT(Grade)"]. "<br>";
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