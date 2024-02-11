
    <nav class="navbar text-white top-nav navbar-expand-lg">
        <div class="container-fluid d-flex flex-row justify-content-between">
            <a class="navbar-brand text-white" href="/">Child Immunization </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav list-unstyled">
                <li><a href="/">Home</a></li>
                <li><a href="/about_us.php">About Us</a></li>
                <?php

                if(isset($_SESSION['user_id'])){
                   if(isset($_SESSION['admin'])){
                       echo '<li><a href="/Admin/index.php">Dashboard</a></li>';
                   }
                   else{
                       echo '<li><a href="/Parent/index.php">Dashboard</a></li>';
                   }
               echo '<li><a href="/profile.php">Profile</a></li>';
               echo '<li><a href="/logout.php">Logout</a></li>';
                }
                else {
                    echo '<li><a href="/login.php">Login</a></li>';
                    echo '<li><a href="/register.php">Register</a></li>';

                }
                ?>

            </ul>
        </div>
    </div>
</nav>
    <style>
        nav{
            font-size: 20px;
            background:blueviolet;
            color: white;
        }

        ul li a{
            padding: 10px 10px 10px 10px;
            color: white;
            text-decoration: none;
        }
        ul a:hover{
            background: blue;
        }

    </style>
