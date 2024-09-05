<?php
include('../include/connection.php');
include('../include/functions.php');

$employeeid = $_POST['employeeid'];

$sql = "SELECT * FROM tblemployees WHERE employeeid = :employeeid";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":employeeid", $employeeid, PDO::PARAM_INT);
$stmt->execute();    
$result = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<fieldset>
    <legend>Upload Photo for <?php echo $result['lastname'] . ', ' . $result['firstname']; ?></legend>
    <div style="display: none;">
        <label for="employeeid">EmployeeID</label>
        <input type="text" name="employeeid" id="employeeid" required value="<?php echo $result['employeeid']; ?>">
    </div>
    <div style="display: none;">
        <label for="oldphoto">Old Photo</label>
        <input type="text" name="oldphoto" id="oldphoto" required value="<?php echo $result['photo']; ?>">
    </div>
    <div>
        <label for="photo">Upload Photo</label>
        <input type="file" name="photo" id="photo" accept="image/jpg, image/jpeg, image/png">
    </div>
    <div class="buttons">
        <label for="">&nbsp;</label>
        <input type="submit" value="UPLOAD" name="upload" id="upload">
    </div>
</fieldset>
