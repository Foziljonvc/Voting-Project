<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Channels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
</head>
<body>
<?php
    require "pages/partials/navbar.php";
?>
<div class="container">
    <h1>Kanallar</h1>

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5 col-xl-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="text1" class="form-label">Enter text</label>
                        <input type="text" class="form-control" id="text1" name="text1" placeholder="Enter text" required>
                    </div>
                    <div class="mb-3">
                        <label for="text2" class="form-label">Hello</label>
                        <input type="text" class="form-control" id="text2" name="text2" placeholder="Enter text" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>