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
    <div class="mb-3 d-flex justify-content-between">
        <h1 class="fs-2">Fines</h1>
        <button type="button" class="btn btn-primary d-inline-flex align-items-center justify-content-between gap-2" data-bs-toggle="modal" data-bs-target="#assignFineModal">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="20">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
            </svg>
            Assign Fine
        </button>
    </div>
    <table class="table">
        <thead class="table-light">
        <tr>
            <th>Fine ID</th>
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

<!-- Assign Fine Modal -->
<div class="modal fade" id="assignFineModal" tabindex="-1" aria-labelledby="assignFineModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="assignFineModalLabel">Assign Fine</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="fineId" class="form-label">Fine ID</label>
                    <input id="fineId" name="fine_id" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="memberId" class="form-label">Member ID</label>
                    <input id="memberId" name="member_id" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="bookId" class="form-label">Book ID</label>
                    <input id="bookId" name="book_id" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Fine Amount (Rs)</label>
                    <input id="amount" name="amount" type="number" min="2" max="500" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input id="date" name="date" type="datetime-local" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>