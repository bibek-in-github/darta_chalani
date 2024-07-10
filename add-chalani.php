<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Management System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <a href="./index.php">PDS</a>

        </div>
        <ul>
            <li>Dashboard</li>
            <li>Document Search</li>
            <li>
                <a href="darta.php">Darta</a>
            </li>
            <li class="active">
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
            <h2>Chalani</h2>
            <div class="form-container">
                <h3>Thapnuhosh Chalani</h3>
                <form method="post" action="insert_chalani.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="fiscalYear">आर्थिक बर्ष *</label>
                        <select id="fiscalYear" name="fiscalYear">
                            <option value="79/80">79/80</option>
                            <option value="80/81">80/81</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subject">विषय *</label>
                        <input type="text" id="subject" name="subject" value=" ">
                    </div>
                    <div class="form-group">
                        <label for="sendingOffice">पत्र बुझ्ने कार्यालय नाम *</label>
                        <input type="text" id="sendingOffice" name="sendingOffice">
                    </div>
                    <div class="form-group">
                        <label for="remarks">कैफियत *</label>
                        <textarea id="remarks" name="remarks"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="fileUpload">कागजातको अपलोड *</label>
                        <input type="file" id="fileUpload" name="fileUpload">
                    </div>
                    <button type="submit" name="submit">Send</button>
                </form>

                <?php
                if (isset($_SESSION['error-chalani'])) {
                    echo "<div class='error'>" . $_SESSION['error-chalani'] . "</div>";
                    unset($_SESSION['error-chalani']);
                }
                if (isset($_SESSION['success-chalani'])) {
                    echo "<div class='success'>" . $_SESSION['success-chalani'] . "</div>";
                    unset($_SESSION['success-chalani']);
                }
                ?>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>