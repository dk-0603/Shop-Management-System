

<header>
    <img id="logo" src="../Assets/images/logo.png" alt="Login image">
    <?php if(isset($_SESSION['email'])) : ?> 
        <div class="user-info">
            <span class="welcome-text">Welcome, <?php echo $_SESSION['email']; ?></span>
            <a id='logout' class="logout-btn" href="logout">Logout</a>
        </div>
    <?php endif; ?>
</header>