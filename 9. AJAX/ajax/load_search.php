<?php

    // LOAD SEARCH
    include_once('../include/connection.php');
    include_once('../include/functions.php');

    $search = '%' . $_POST['search'] . '%';

    $sql =  "SELECT * FROM tblemployees ";
    $sql .= "INNER JOIN tbldepartment ON ";
    $sql .= "tblemployees.departmentid = tbldepartment.departmentid ";
    $sql .= "INNER JOIN tblprogram ON ";
    $sql .= "tblemployees.programid = tblprogram.programid ";
    $sql .= "WHERE CONCAT_WS (' ', lastname, firstname, department, program, sex) LIKE :search ";
    $sql .= "ORDER BY lastname, firstname, department, program, sex ";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":search", $search, PDO::PARAM_STR);
    $stmt->execute();

    $count = $stmt->rowCount();

    if ($count > 0 ) {

        echo "<table>";
            echo "<tr>";
                echo "<th> Last Name </th>";
                echo "<th> First Name </th>";
                echo "<th> Sex </th>";
                echo "<th> Department </th>";
                echo "<th> Program </th>";
                echo "<th colspan='3'> Action </th>";
            echo "</tr>";

        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $photo = $result['photo'] ?: 'no photo.jpg';

            echo "<tr>";
                echo "<td class='hover-name' data-photo='{$photo}'>" . $result['lastname'] . "</td>";
                echo "<td class='hover-name' data-photo='{$photo}'>" . $result['firstname'] . "</td>";
                echo "<td>" . $result['sex'] . "</td>";
                echo "<td>" . $result['department'] . "</td>";
                echo "<td>" . $result['program'] . "</td>";
                echo "<td><button id='update-form' data-employeeid='{$result['employeeid']}' data-departmentid='{$result['departmentid']}'>UPDATE</button></td>";
                echo "<td><button id='upload-photo' data-employeeid='{$result['employeeid']}'>UPLOAD PHOTO</button></td>";
                echo "<td><button id='delete' data-employeeid='{$result['employeeid']}' data-photo='{$result['photo']}'>DELETE</button></td>";
            echo "</tr>";
        }

        echo "</table>";

    } else {

        echo "<h4 style='color: red;'> No Records Found! </h4>";

    }
?>
