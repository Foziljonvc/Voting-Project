<?php

$surveys = new Surveys();

$posts = $surveys->getSurveys();

$editId = $_GET['editId'] ?? NULL;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    require "pages/partials/link.php";
    ?>
</head>
<body>
    <?php
        require "pages/partials/navbar.php";
    ?>
    <div class="container">
        <h1>So'rov qo'shish</h1>
    </div>
    <div class="container mt-4">
        <form action="/home" method="post">
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th><h5>Name</h5></th>
                        <th style="text-align: center"><h5>Description</h5></th>
                        <th><h5>Checked</h5></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($posts)): ?>
                        <?php foreach ($posts as $post): ?>
                            <tr>
                                <td>
                                    <?php if ($editId == $post['id']): ?>
                                        <input type="hidden" name="editId" value="<?= $post['id']; ?>">
                                        <b>Name:</b> <input type="text" name="editName" value="<?= $post['name']; ?>" style="margin-bottom: 0.5rem;" required>
                                        <button type="submit" class="btn btn-success"><b>Save</b></button>
                                        <a href="/home" class="btn btn-secondary"><b>Cancel</b></a>
                                    <?php else: ?>
                                        <b><?= $post['name']; ?></b>
                                    <?php endif; ?>
                                </td>
                                <td><?= $post['description']; ?></td>
                                <td>
                                    <a href="/home?editId=<?= $post['id']; ?>" class="btn btn-primary btn-spacing" style="margin-bottom: 0.5rem;">
                                        <i class="bi bi-pencil-square"></i> <b>Edit</b>
                                    </a>
                                    <a href="/home&delete?id=<?= $post['id']; ?>" class="btn btn-danger">
                                        <i class="bi bi-trash3-fill"></i> <b>Delete</b>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>

        </form>

        <form method="post" action="/add">
            <div class="container mt-4">
                <div class="mb-3">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter the name" name="surveys"
                               <?php if (!$editId): ?>required <?php endif; ?>>
                    </div>
                    <div class="input-group mb-3">
                            <textarea class="form-control" placeholder="Enter the description" name="desc"
                                      <?php if (!$editId): ?>required <?php endif; ?>></textarea>
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-success" type="submit"><b>Add</b></button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



<?php
//CREATE TABLE surveys (
//    id INT AUTO_INCREMENT PRIMARY KEY,
//    name VARCHAR(255),
//    description TEXT
//);
//
//
//INSERT INTO surveys (name, description) VALUES ('Eng yaxshi university', 'You’ve probably heard of Lorem Ipsum before – it’s the most-used dummy text excerpt out there. People use it because it has a fairly normal distribution of letters and words (making it look like normal English), but it’s also Latin, which means your average reader won’t get distracted by trying to read it. It’s perfect for showcasing design work as it should look when fleshed out with text, because it allows viewers to focus on the design work itself, instead of the text. It’s also a great way to showcase the functionality of programs like word processors, font types, and more.');


//CREATE TABLE survey_variants (
//        id INT AUTO_INCREMENT PRIMARY KEY,
//        survey_id INT,
//        name VARCHAR(255)
//);
?>