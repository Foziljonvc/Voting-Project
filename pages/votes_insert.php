<?php

$surveys = new Surveys();

$editId = $_GET['editId'] ?? false;

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id"])) {
        $posts = $surveys->getSurveyInsert((int)$_GET['id']);
        $surveyName = $surveys->getSurveyName((int)$_GET['id']);
        $_SESSION['id'] = (int)$_GET['id'];
    }
}

?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Votes Insert</title>
    <?php
    require "pages/partials/link.php";
    ?>
</head>

<body>
    <?php
    require 'pages/partials/navbar.php';
    ?>
    <div class="container mt-4">
        <h1><?= $surveyName['name']; ?></h1>
    </div>

    <div class="container mt-4">
        <form action="/insert" method="post">
            <table class="table mt-5">
                <thead>
                <tr>
                    <th><h5>Name</h5></th>
                    <th style="color: blue"><h5>Edit</h5></th>
                    <th style="color: red"><h5>Delete</h5></th>
                </tr>
                </thead>
                <tbody>
                <?php if (!empty($posts)): ?>
                    <?php foreach ($posts as $post) : ?>
                        <tr>
                            <td>
                                <?php if ($editId == $post['id']): ?>
                                    <input type="hidden" name="editId" value="<?= $post['id']; ?>">
                                    <b>Name</b>
                                    <input type="text" name="editName" value="<?= $post['name']; ?>" style="margin-bottom: 0.5rem;" required>
                                    <br>
                                    <button type="submit" class="btn btn-success"><b>Save</b></button>
                                    <a href="/insert?id=<?= $_SESSION['id']; ?>" class="btn btn-secondary"><b>Cancel</b></a>
                                <?php else: ?>
                                    <b><?= $post['name']; ?></b>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="/insert?id=<?= $_SESSION['id']; ?>&editId=<?= $post['id']; ?>" class="btn btn-primary" style="margin-bottom: 0.5rem;">
                                    <i class="bi bi-pencil-square"></i> <b>Edit</b>
                                </a>
                            </td>
                            <td>
                                <a href="/votes&delete?id=<?= $post['id']; ?>" class="btn btn-danger">
                                    <i class="bi bi-trash3-fill"></i> <b>Delete</b>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </form>

        <form action="/add&votes" method="post">
            <div class="container mt-4">
                <div class="mb-3">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter the name" name="survey_insert"
                               aria-label="Survey" <?php if (!$editId): ?> required <?php endif; ?> >
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-success" type="submit"><b>Add</b></button>
                    </div>
                </div>
            </div>
            <div class="container mt-4">
                <a href="/votes" class="btn btn-success">
                    <i class="bi bi-arrow-left"></i><b>Back</b>
                </a>
            </div>
        </form>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
