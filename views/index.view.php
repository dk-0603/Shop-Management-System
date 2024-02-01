<?php    require  'partials/head.php'?>
<?php    require  'partials/header.php'?>



    <?php if(!isset($_SESSION['email'])) : ?> 
            
        <div class="cta-container">
        <h1>Please log in or register to continue.</h1>
       
        <a href="/loginForm">Log In</a>
        <a href="/register">Register</a>
         </div>
        <?php endif; ?>


        <?php if(isset($_SESSION['email'])) : ?> 
    <div class="main-container">
        <?php    require  'partials/sidebar.php'?>   
        <div class="container">
            <!-- <div class="control-buttons">

            </div> -->
            <div class="carousel">
                <img class="carousel-button" id="backBtn" src="/Assets/images/back.png" alt="back">
                <div class="content">

                <?php foreach ($images as $image) : ?>
                    <div class="card">
                        <img src='../<?php echo $image->image_path ?>'>
                        <h2>Alexa beige</h2>
                    </div>
    


            <?php endforeach; ?> 
         
    
                </div>
                <img class="carousel-button" id="nextBtn" src="../Assets/images/next.png" alt="next">
            </div>
           

        </div>
    </div>

    <footer></footer>
    <?php endif; ?>
</body>
</html>

