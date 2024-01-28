<?php    require  'partials/head.php'?>

    <header>
        <img src="../Assets/images/logo.png" alt="Login image">
    </header>
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
                        <img src='../<?php echo $image->url ?>'>
                        <h2>Alexa beige</h2>
                    </div>
    


            <?php endforeach; ?> 
         
    
                </div>
                <img class="carousel-button" id="nextBtn" src="../Assets/images/next.png" alt="next">
            </div>
           

        </div>
    </div>
    <footer></footer>
</body>
</html>

