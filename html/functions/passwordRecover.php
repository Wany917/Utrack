<?php	
require "functions.php";
include "../LR_SESSIONS/formheader.php";

?>
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

                            
                            echo'
                            <h2 class="mt-4 text-center">Password Recover</h2>
                            <form method="POST" action="changePassword.php?mail='.$_GET['mail'].'" class="mt-3 form-group"> 
                                <input type="password" name="pwd" class="form-control-md text-center formsbtns mt-4 px-5 py-1" placeholder="Your new password" required="required"><br>
                                <input type="password" name="confirmpwd" class="form-control-md text-center formsbtns mt-4 px-5 py-1" placeholder="Confirm your password" required="required"><br>
                                <input type="submit" class="form-control-md text-center mt-4 mb-5 formsbtns px-4 py-1" value="Change password"> 
                            </form>
                            ';
                            ?>
                        </div>

                    </div>
                    <div class="col-lg-4 col-sm-3 col-0"></div>
            </div>
    </div> 
</body> 
</html>