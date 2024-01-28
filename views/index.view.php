<?php    require  'partials/head.php'?>
    <header>
        <img src="../Assets/images/logo.png" alt="Login image">
        <?php if(isset($_SESSION['email'])) : ?> 
            <a id='logout' href="logout">Logout</a>
        <?php endif; ?>
    </header>
    <div class="main-container">
<?php    require  'partials/sidebar.php'?>   
        <div class="container">
            <div class="control-buttons">
                
            </div>
            <div class="content">
                
            </div>

        </div>
    </div>
    <footer></footer>
</body>
</html>

