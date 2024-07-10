<?php
session_start();
include 'config.php';

if (isset($_POST['delete'])) {

    $id = mysqli_real_escape_string($conn, $_POST['d_id']);
    $is_darta = $_POST['darta_chalani'] == 'darta' ? true : false;

    $file = $is_darta ? "SELECT document FROM darta WHERE d_id = $id" : "SELECT document FROM chalani WHERE c_id = $id";

    $folder = 'uploads/';
    unlink($folder . mysqli_fetch_assoc(mysqli_query($conn, $file))['document']);

    $sql = $is_darta ? "DELETE FROM darta WHERE d_id = $id" : "DELETE FROM chalani WHERE c_id = $id";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Document deleted successfully!";
        if ($is_darta) {
            header("Location: ./darta.php");
        } else {
            header("Location: ./chalani.php");
        }
        exit();
    } else {
        $_SESSION['error'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
        if ($is_darta) {
            header("Location: ./darta.php");
        } else {
            header("Location: ./chalani.php");
        }
    }

} else {
    header("Location: ./index.php");
}