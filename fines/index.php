<?php
require_once "process.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Assign Fine</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php include './../shared/navbar.php'; ?>

<div class="container-lg mt-4">
    <?php include './../shared/alert.php'; ?>

    <div class="mb-3 d-flex justify-content-between">
        <h1 class="fs-2">Fines</h1>
        <a href="/fines/create.php" type="button" class="btn btn-primary d-inline-flex align-self-start align-items-center justify-content-between gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="20" height="20">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Assign Fine
        </a>
    </div>

    <?php
    $sql = "
    SELECT fine.fine_id, fine.member_id, member.first_name, member.last_name, book.book_name, fine.fine_amount, fine.fine_date_modified
    FROM fine 
    JOIN member ON fine.member_id = member.member_id
    JOIN book ON fine.book_id = book.book_id
    ";

    $result = $database->query($sql) or die($database->error);
    ?>

    <table class="table">
        <thead class="table-light">
            <tr>
                <th>Fine ID</th>
                <th>Member ID</th>
                <th>Member Name</th>
                <th>Book Name</th>
                <th>Fine Amount</th>
                <th>Date Modified</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($result->num_rows > 0) { ?>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['fine_id'] ?></td>
                    <td><?= $row['member_id'] ?></td>
                    <td><?= $row['first_name']." ".$row['last_name'] ?></td>
                    <td><?= $row['book_name'] ?></td>
                    <td>Rs.<?= number_format($row['fine_amount']) ?></td>
                    <td><?= $row['fine_date_modified'] ?></td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="6" class="text-center text-secondary">No records are available!</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>