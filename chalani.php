<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Management System</title>
    <link rel="stylesheet" href="style.css">
    <script src="app.js" defer></script>
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
            <div class="flex between">
                <h2>Chalani</h2>
                <a href="./add-chalani.php" class="btn">Add Chalani</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Fiscal Year</th>
                        <th>Darta No</th>
                        <th>Subject</th>
                        <th>Dispatch Office</th>
                        <th>Dispatch Date</th>
                        <th>Remarks</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <?php
                include 'config.php';

                $sql = "SELECT * FROM chalani";
                $result = mysqli_query($conn, $sql) or die("Query Failed");

                if (mysqli_num_rows($result) > 0) {
                    $index = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                        <tr>
                            <td>
                                <?php echo $index++; ?>
                            </td>
                            <td>
                                <?php echo $row['fiscalYear']; ?>
                            </td>
                            <td>
                                <?php echo $row['c_id']; ?>
                            </td>
                            <td>
                                <?php echo $row['subject']; ?>
                            </td>
                            <td>
                                <?php echo $row['receiving_office']; ?>
                            </td>
                            <td>
                                <?php echo $row['date']; ?>
                            </td>
                            <td>
                                <?php echo $row['remarks']; ?>
                            </td>
                            <td class="flex">

                                <form action="view.php" method="post">
                                    <input type="hidden" name="d_id" value="<?php echo $row['c_id']; ?>">
                                    <input type="hidden" name="darta_chalani" value="chalani">
                                    <button class="view-btn" name="view">View</button>
                                </form>

                                <form class="deleteForm" action="delete.php" method="post">
                                    <input type="hidden" name="d_id" value="<?php echo $row['c_id']; ?>">
                                    <input type="hidden" name="darta_chalani" value="chalani">
                                    <button class="delete-btn" name="delete">Delete</button>
                                </form>
                            </td>
                        </tr>

                    <?php }
                } ?>

                </tbody>
            </table>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>