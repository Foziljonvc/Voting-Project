<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5 col-xl-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Login</h2>
                        <div class="divider d-flex align-items-center my-4">
                            <hr class="flex-grow-1">
                            <p class="text-center fw-bold mx-3 mb-0">Or</p>
                            <hr class="flex-grow-1">
                        </div>
                        <form action="/login" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Username</label>
                                <input type="text" class="form-control" id="name" name="username" placeholder="Enter username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                            </div>
                            <div class="divider d-flex align-items-center my-4">
                                <hr class="flex-grow-1">
                                <p class="text-center fw-bold mx-3 mb-0">Or</p>
                                <hr class="flex-grow-1">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary mx-3">Sign up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+VkVGr1pvlYdU+9J8mkY53+Agkp6a"
        crossorigin="anonymous"></script>
</body>
</html>

<?php

//session_destroy($_SESSION);