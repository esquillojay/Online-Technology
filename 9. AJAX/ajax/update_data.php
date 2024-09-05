<?php 

include('../include/connection.php');
include('../include/functions.php');

// Ensure all required POST data is set
if (isset($_POST['employeeid'], $_POST['firstname'], $_POST['lastname'], $_POST['sex'], $_POST['departmentid'], $_POST['programid'])) {
    // Assign POST data to variables
    $employeeid = $_POST['employeeid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $sex = $_POST['sex'];
    $departmentid = $_POST['departmentid'];
    $programid = $_POST['programid'];
    
    // Prepare SQL statement
    $sql =  "UPDATE tblemployees SET firstname = :firstname, lastname = :lastname, ";
    $sql .= "sex = :sex, departmentid = :departmentid, programid = :programid ";
    $sql .= "WHERE employeeid = :employeeid";

    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(":employeeid", $employeeid, PDO::PARAM_INT);
    $stmt->bindParam(":firstname", $firstname, PDO::PARAM_STR);
    $stmt->bindParam(":lastname", $lastname, PDO::PARAM_STR);
    $stmt->bindParam(":sex", $sex, PDO::PARAM_STR);
    $stmt->bindParam(":departmentid", $departmentid, PDO::PARAM_INT); // Corrected to PDO::PARAM_INT
    $stmt->bindParam(":programid", $programid, PDO::PARAM_INT); // Corrected to PDO::PARAM_INT

    // Execute the statement
    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record";
    }
} else {
    echo "Required fields are missing";
}

?>
