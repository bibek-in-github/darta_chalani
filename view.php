<?php
if (isset($_POST['view'])) {
    include 'config.php';

    $is_darta = $_POST['darta_chalani'] == 'darta' ? true : false;
    $id = mysqli_real_escape_string($conn, $_POST['d_id']);

} else {
    header("Location: ./index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Management System</title>
    <link rel="stylesheet" href="./style.css">
    <script src="app.js" defer></script>
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-header"> <a href="./index.php">PDS</a></div>
        <ul>
            <li>Dashboard</li>
            <li>Document Search</li>
            <li class="active">
                <a href="darta.php">Darta</a>
            </li>
            <li>
                <a href="chalani.php">Chalani</a>
            </li>
            <li>All Documents</li>
            <li>DMS</li>
            <li>DMS Archive</li>
            <li>Document Type</li>
            <li>Fiscal Year</li>
            <li>Branch</li>
            <li>Office</li>
        </ul>
    </div>
    <div class="main-content">
        <div class="topnav">
            <div class="logout">Logout</div>
            <div class="notifications">Notifications (0)</div>
        </div>
        <div class="content">
            <div class="flex">
                <button class="back-btn">
                    Back
                </button>
                <h2>
                    <?php echo $is_darta ? 'दर्ता' : 'चलानी'; ?>
                </h2>
            </div>
            <div class="document-details">
                <div class="details-left">
                    <h3>कागजात विवरण सूची</h3>

                    <?php
                    if ($is_darta) {
                        $sql = "SELECT * FROM darta WHERE d_id = $id";
                    } else {
                        $sql = "SELECT * FROM chalani WHERE c_id = $id";
                    }

                    $result = mysqli_query($conn, $sql) or die("Query Failed");
                    $data = mysqli_fetch_assoc($result);
                    ?>

                    <ul>
                        <li>आर्थिक बर्ष: <?php echo $data['fiscalYear']; ?></li>
                        <li>Added मिति: <?php echo $data['date']; ?></li>
                        <li>कागजात बर्ग: <?php echo $is_darta ? 'दर्ता' : 'चलानी'; ?></li>
                        <li><?php echo $is_darta ? 'पठाउने' : 'पाउने'; ?> कार्यालय: <?php echo $is_darta ? $data['sending_office'] : $data['receiving_office'] ?></li>
                        <li><?php echo $is_darta ? 'दर्ता' : 'चलानी'; ?> नम्बर: <?php echo $is_darta ? $data['d_id'] : $data['c_id']; ?></li>
                        <li>विषय: <?php echo $data['subject']; ?></li>
                        <li>कागजात अपलोड:
                            <a href="uploads/<?php echo $data['document']; ?>" class="download-btn" download>
                                Download Document
                            </a>
                        </li>
                </div>
                <!-- <div class="details-right">
                    <h3>Comments</h3>
                    <form>
                        <div class="form-group">
                            <label for="comments">टिप्पणी थुप्रहोस</label>
                            <textarea id="comments" name="comments"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="fileUpload">फाइल</label>
                            <input type="file" id="fileUpload" name="fileUpload">
                        </div>
                        <button type="submit">अपलोड गर्नुहोस</button>
                         <button type="submit">Send</button> -->
                <!-- </form> -->
                <!-- </div> -->
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>