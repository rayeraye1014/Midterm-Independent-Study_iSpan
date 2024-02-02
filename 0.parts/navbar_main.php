<?php
if (!isset($pageName)) {
    $pageName = '';
}
?>

<style>
    .navbar-nav .nav-link {
        padding-left: 5px;
    }

    .navbar-nav .nav-link.active {
        background-color: lightskyblue;
        color: darkblue;
        border-radius: 5px;
        font-weight: 800;
        padding-left: 5px;
    }
</style>

<div class="px-0 mx-0 shadow">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index_main.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if (isset($_SESSION['admin'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#">ADMIN MODE</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#">USER MODE</a>
                        </li>
                    <?php endif; ?>
                </ul>

                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link "><?= $_SESSION[isset($_SESSION['admin']) ? 'admin' : 'user']['nickname'] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">登出</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>