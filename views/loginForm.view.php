<?php    require  'partials/head.php'?>

    <?php if(!isset($_SESSION['email'])) : ?> 

            <div class="background">
        <div id="top"></div>
        <div class="login-container">
            <div class="thumbnail">
                <img src="../Assets/images/login_image.png" alt="Login image">
            </div>
            <div class="login">
                <h1>Member login</h1>
        
                    <form class="login-form" id="login-form" action="/login" method="POST" novalidate>
                    
                        <div class="error" id="username-error"></div>
                        <input type="text" id="username" name="email" placeholder="Username or Email">
                        <?php if (isset($error)){
                        echo $error;
                        }?>

                        <div  class="error" id="password-error"></div> 
                        <input type="password" id="password" name="password" placeholder="Password">
                        <?php if (isset($loginError)) : ?>
                        <h2><?php echo $loginError ?></h2>
                          <?php endif; ?>
                
            
                        <button class="login-button" type="submit">Log In</button>

                        <div class="login-misc">
                            <a href="/register"  style="font-weight: bold;">Register</a>
                            <a href="#">Forgot passowrd</a>
                        </div>
                    </form>
            
                    
            
                
            </div>

        </div>
        <div id="bottom"></div>
        </div>
    <?php endif; ?>
</body>
</html>