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
    <table class="table">
        <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Member ID</th>
            <th>Member Name</th>
            <th>Book Name</th>
            <th>Fine Amount</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>34</td>
            <td>5</td>
            <td>Dasun Tharanga</td>
            <td>Harry Potter 1</td>
            <td>Rs.<?= number_format(1000) ?></td>
            <td>2024-01-01 20:10:02</td>
        </tr>
        </tbody>
    </table>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>