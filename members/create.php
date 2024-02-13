<?php
require_once "process.php";

// Check user session exists
if (! isset($_SESSION['username'])) {
    header('Location: /auth/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Member</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php include './../shared/navbar.php'; ?>

<div class="container-lg mt-4">
    <?php include './../shared/alert.php'; ?>

    <nav class="d-flex align-items-center justify-content-between" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/members">Member</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Member</li>
        </ol>

        <a href="/members" class="btn btn-primary d-inline-flex align-self-start align-items-center justify-content-between gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="20" height="20">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
            </svg>
            Go Back
        </a>
    </nav>

    <div class="mb-3">
        <h1 class="fs-2">Add Member</h1>
    </div>

    <?php
    $sql = "SELECT * FROM member";

    $result = $database->query($sql) or die($database->error);
    ?>

    <form action="process.php?create=true" method="post">
        <div class="row">
            <div class="col-lg-5 mb-3">
                <label for="memberID" class="form-label">Member ID</label>
                <input id="memberID" name="member_id" type="text" class="form-control" pattern="M\d{3}" required>
            </div>
            <div class="col-lg-5 mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input id="firstName" name="first_name" type="text" class="form-control" required>
            </div>
            <div class="col-lg-5 mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input id="lastName" name="last_name" type="text" class="form-control" required>
            </div>
            <div class="col-lg-5 mb-3">
                <label for="bday" class="form-label">Birthday</label>
                <input id="bday" name="birthday" type="date" class="form-control" required>
            </div>
            <div class="col-lg-5 mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email" type="email" class="form-control" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>

</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>