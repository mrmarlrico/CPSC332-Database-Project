<html>
    <body>
        <?php
        
        $link = mysqli_connect('mariadb', 'cs332s30','iDl06Vq9','cs332s30');
        if (!$link) {
            die('Could not connect: ' . mysql_error());
        }
                
        $CNUM = $_POST["cnum"];

        $query = "SELECT s.Course_num, s.Section_num, Classroom, Meet_day, Beg_time, End_time, COUNT(er.CWID)
                  FROM Section as s, Enrollment_rec as er
                  WHERE s.Course_num = er.Course_num and er.Section_num = s.Section_num and s.Course_num ='".$CNUM."' 
                  GROUP BY Section_num;";

        $result = $link->query($query);

        if ($result->num_rows > 0) {
            // output data of each row
            echo "Course Number: " .$CNUM. "<br>";
            while($row = $result->fetch_assoc()) {
                echo "Section number: " .$row["Section_num"]. " - Classroom: " . $row["Classroom"].  " - Start: " .$row["Beg_time"]. 
                     "- End: " .$row["End_time"]. " - Enrolled: " .$row["COUNT(er.CWID)"]. "<br>";
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