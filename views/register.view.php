<?php    require  'partials/head.php'?>

    <?php if(!isset($_SESSION['email'])) : ?> 

            <div class="background">
        <div id="top"></div>
        <div class="login-container">
            <div class="thumbnail">
                <img src="../Assets/images/login_image.png" alt="Login image">
            </div>
            <div class="login">
                <h1>Create an Account</h1>
                    <form class='form' method='POST' action='/users' id='register' novalidate>
                

                        <div class="name-surname">
                            <input  type="text" id="firstname" name="firstname" placeholder="Name" required>
                            <input   type="text" id="lastname" name="lastname" placeholder="Surname" required>
                        </div>
                        
                        <input type="email" id="email" name="email" placeholder="Email" required>
                        <?php if (isset($error)){
                        echo $error;
                        }?>

                
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        <?php if (isset($loginError)) : ?>
                        <h2><?php echo $loginError ?></h2>
                        <?php endif; ?>
            
                        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
            
                        <button class="login-button" type="submit">Submit</button>
                        <div class="login-misc">
                            <a href="#">Already have an account?</a>
                            <a href="/login" style="font-weight: bold;">Login</a> 
                        </div>
                
                    </form>
            
                    
            
                
            </div>

        </div>
        <div id="bottom"></div>
        </div>
    <?php endif; ?>
</body>
</html>