<?php 

if (isset($_SESSION['vorname'])){ ?>
    <nav id="menu">
    <h2>Menu</h2>       
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="profil.php">Profil</a></li>   
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
<?php } else { ?>
        <nav id="menu">
        <ul >
            <li><a href="index.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
<?php }
?>