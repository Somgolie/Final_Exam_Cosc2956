<?php 

define('SITE_ROOT', __DIR__);
include SITE_ROOT."\header.php";

require_once $_SERVER['DOCUMENT_ROOT'] . '\conn.php';

$sql = "SELECT * FROM string_info WHERE 1";

$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0)
    if($result){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo $row["string_id"] . " ";

                echo $row["message"] . "<br> ";
              
            }
        }
        else{
            echo "No records found";
        }
    }
    else{                           
        echo "Error executing query: " . mysqli_error($conn);
    } 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['primaryKey'])) {
    $primaryKey = intval($_POST['primaryKey']);
    
    $deleteSql = "DELETE FROM string_info WHERE string_id = ?";
    $stmt = mysqli_prepare($conn, $deleteSql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $primaryKey);
        if (mysqli_stmt_execute($stmt)) {
            echo "Record with ID $primaryKey deleted successfully.<br>";
        } else {
            echo "Error deleting record: " . mysqli_error($conn) . "<br>";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($conn) . "<br>";
    }
}
?>
 

<form id="" method="POST">
                <!-- Primary Key Input -->
                <input type="text" name="primaryKey" 
                       class="form-control bg-success text-white mb-2"
                       style="flex: 0 0 30%; height: 100%;"
                       placeholder="Primary Key" required />

                <!-- Delete Button -->
                <button type="submit" 
                        class="btn btn-danger"
                        style="flex: 1; margin-left: 10px; margin-top: 0; height: 100%;">
                    delete a record
                </button>
            </form>




