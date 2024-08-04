<?php

$surveys = new Surveys();

$posts = $surveys->getSurveys();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Regestir</title>
    <?php
        require "pages/partials/link.php";
    ?>
</head>
<body>
<?php
require "pages/partials/navbar.php";
?>
<div class="container">
    <h1>Ma'lumotlar</h1>
</div>

<div class="container mt-4">
    <form action="router.php" method="post">
        <table class="table mt-5">
            <thead>
            <tr>
                <th><h5>Name</h5></th>
                <th><h5>Checked</h5></th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($posts)): ?>
                <?php foreach ($posts as $post) : ?>
                    <tr>
                        <td>
                            <b><?php echo $post['name'] ?></b>
                        </td>
                        <td>
                            <a href="/insert?id=<?php echo $post['id']; ?>" class="btn btn-danger"
                                title="Shu qatordagi ma'lumotlarni ichiga yo'nalish qo'shadi"><i class="bi bi-pencil-fill"></i>
                                <b>Insert</b></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
        <div class="container mt-4">
            <div class="mb-3">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Enter the name" name="votes"
                           aria-label="Survey" required>
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
</html

<?php

//<!--CREATE TABLE admin (-->
//<!--    id INT AUTO_INCREMENT PRIMARY KEY,-->
//<!--    username VARCHAR(255),-->
//<!--    password VARCHAR(255)-->
//<!--);-->


//INSERT INTO survey_variants (survey_id, name) VALUES (1, 'TATU');
//INSERT INTO survey_variants (survey_id, name) VALUES (1, 'TDTU');
//INSERT INTO survey_variants (survey_id, name) VALUES (2, '226');
//INSERT INTO survey_variants (survey_id, name) VALUES (2, '110');

?>