<?php	require "../functions/functions.php"; ?>

<?php include "formheader.php"; ?>
    <div class="container-fluid mb-4 pt-2 mt-5">

            <div class="row header">
                <div class="col-lg-4 col-sm-3 col-0 "></div>
                    <div class="col-lg-4 col-sm-6 col-12 commoncontainer text-center">
                        <div>
                            <?php
                            if(!empty($_SESSION['errors'])){
                                echo "<div class='errors mt-3 text-center'>
                                ";
                                foreach($_SESSION['errors'] as $error){
                                    printf($error);
                                    echo"<br>";
                                }
                                echo"
                                </div>
                                ";
                                unset($_SESSION['errors']);
                            }

                            if(!empty($_SESSION['confirm'])){
                                echo "<div class='errors mt-3 text-center'>
                                ";
                                foreach($_SESSION['confirm'] as $confirm){
                                    printf($confirm);
                                    echo"<br>";
                                }
                                echo"
                                </div>
                                ";
                                unset($_SESSION['confirm']);
                            }
                            ?>
                            <h2 class="mt-4 text-center">Password Recover</h2>
                            <form method="POST" action="../functions/sendPasswordRecover.php" class="mt-3 form-group"> 
                                <input type="email" name="email" class="form-control-md text-center formsbtns mt-4 px-5 py-1" placeholder="Email" required="required"><br>
                                <input type="submit" class="form-control-md text-center mt-3 mb-5 formsbtns px-4 py-1" value="Send recover Email"> 
                            </form>

                            <p>
                                If you are signed up to Utrack, we will send you an email to recover your password
                            </p>
                        </div>

                    </div>
                    <div class="col-lg-4 col-sm-3 col-0"></div>
            </div>
    </div> 
</body> 
</html>