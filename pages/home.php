<?php

$surveys = new Surveys();

$posts = $surveys->getSurveys();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
</head>
<body>
    <?php
        require "pages/partials/navbar.php";
    ?>
    <div class="container">
        <h1>So'rov qo'shish</h1>
    </div>
    <div class="container mt-4">
        <form action="router.php" method="post">
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($posts)): ?>
                        <?php foreach ($posts as $post) : ?>
                        <tr>
                            <td>
                                <?php echo $post['name'] ?>
                            </td>
                            <td>
                                <?php echo $post['description'] ?>
                            </td>
                            <td>
                                <a href="/delete=<?php echo $post['id']; ?>" class="btn btn-danger" title="Shu qatordagi barcha ma'lumotlarni o'chirib yuboradi!"><i class="bi bi-trash3-fill"></i>  Delete</a>
                            </td>
                            <td>
                                <a href="/edit=<?php echo $post['id']; ?>" class="btn btn-danger" title="Shu qatordagi ma'lumotlarni o'zgartirish imkonini beradi"><i class="bi bi-pencil-fill"></i>  Edit</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <div class="container mt-4">
                <div class="mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter the surveys" name="surveys" aria-label="Survey" required>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="input-group">
                        <textarea class="form-control" placeholder="Enter your description" name="desc" rows="3" aria-label="Description" required></textarea>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Add Description</button>
            </div>
        </form>
    </div>
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


//CREATE TABLE survey_veriants (
//        id INT AUTO_INCREMENT PRIMARY KEY,
//        survey_id INT,
//        name VARCHAR(255)
//);
?>