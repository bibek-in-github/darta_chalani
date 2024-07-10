<?php
session_start();
include 'config.php';

if (isset($_POST['submit'])) {

    $fiscalYear = mysqli_real_escape_string($conn, $_POST['fiscalYear']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $dispatchOffice = mysqli_real_escape_string($conn, $_POST['dispatchOffice']);
    $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);

    // File upload handling
    if(isset($_FILES['fileUpload'])) {
        $target_dir = "uploads/";
        $file = $_FILES["fileUpload"];
        echo "<pre>";
        print_r($file);
        echo "</pre>";
        $fileName = $_FILES["fileUpload"]["name"];
        $fileTmpName = $_FILES["fileUpload"]["tmp_name"];
        $fileSize = $_FILES["fileUpload"]["size"];
        $fileError = $_FILES["fileUpload"]["error"];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 5000000) {
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = $target_dir . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);

                    date_default_timezone_set("Asia/Kathmandu");
                    $date = date("Y-m-d H:i:s");

                    // Insert data into database
                    $sql = "INSERT INTO darta VALUES (default, '$subject', '$dispatchOffice', '$date', '$remarks', '$fileNameNew', '$fiscalYear')";
                    if (mysqli_query($conn, $sql)) {
                        $_SESSION['success'] = "Darta inserted successfully!";
                        header("Location: ./add-darta.php");
                        exit();
                    } else {
                        $_SESSION['error'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
                        header("Location: ./add-darta.php");
                    }
                } else {
                    echo "Your file is too big! Maximum file size is 5MB.";
                }
            } else {
                echo "There was an error uploading your file!";
            }
        } else {
            echo "You cannot upload files of this type!";
        }
    } else {
        echo "No file uploaded!";
    }

} else {
    header("Location: ./add-darta.php");
    exit();
}
