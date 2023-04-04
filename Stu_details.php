<?php
include_once 'classes/db1.php';
$result = mysqli_query($conn, "SELECT p.*, events.event_title FROM events 
                                JOIN registered r ON events.event_id = r.event_id 
                                JOIN participant p ON p.id = r.participant_id 
                                ORDER BY event_title");

?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Techtonix2k23 2k20</title>
    <title></title>
    <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
</head>

<body>
    <?php include 'utils/adminHeader.php'?>
    <div class="content">
        <div class="container">
            <h1>Participant details</h1>
            <?php
            if (mysqli_num_rows($result) > 0) {
            ?>
            <table class="table table-hover">
                <tr>
                    <th>Roll_number</th>
                    <th>Name</th>
                    <th>Branch</th>
                    <th>Sem</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>College</th>
                    <th>Event</th>
                </tr>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo $row["Roll_number"]; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["branch"]; ?></td>
                    <td><?php echo $row["sem"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["phone"]; ?></td>
                    <td><?php echo $row["college"]; ?></td>
                    <td><?php echo $row["event_title"]; ?></td>
                </tr>
                <?php
                $i++;
                }
                ?>
            </table>
            <?php
            } else {
                echo "No result found";
            }
            ?>
        </div>
    </div>
    <?php include 'utils/footer.php'?>;
</body>
</html>
