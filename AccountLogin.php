<?php
require_once('lib/PageTemplate.php');
 
if (!isset($TPL)) {
    $TPL = new PageTemplate();
    $TPL->PageTitle = "Login";
    $TPL->ContentBody = __FILE__;
    include "layout.php";
    exit;
}
?>
<p>
<div class="row">
 
    <div class="row">
        <div class="col-md-12">
            <div class="newsletter">
                <p>User<strong>&nbsp;LOGIN</strong></p>
                <form method="POST" action="login.inc.php">
                    <input class="input" type="email" name="email" placeholder="Enter Your Email" required>
                    <br/><br/>
                    <input class="input" type="password" name="password" placeholder="Enter Your Password" required>
                    <br/><br/>
                    <button class="newsletter-btn" type="submit"><i class="fa fa-envelope"></i> Login</button>
                </form>
                <a href="">Lost password?</a>
            </div>
        </div>
    </div>
 
</div>
</p>
 