<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="/adminPanel">Admin panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/home">So'rov qo'shish</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/votes">Ma'lumot qo'shish (so'rov)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/channels">Kanallar</a>
                </li>
                <li>
                    <a class="nav-link" href="/reklama">Reklama</a>
                </li>
            </ul>
            <h5> <?php echo $_SESSION['username'] ?> </h5>
        </div>
    </div>
</nav>