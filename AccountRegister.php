<?php
require_once('lib/PageTemplate.php');
# trick to execute 1st time, but not 2nd so you don't have an inf loop
if (!isset($TPL)) {
    $TPL = new PageTemplate();
    $TPL->PageTitle = "Regsier";
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
                        <p>User<strong>&nbsp;REGISTER</strong></p>
                        <form action="/register.inc.php" method="post" id="register" onsubmit="return validateForm()">
    <input class="input" type="email" name="email" placeholder="Enter Your Email" required>
    <br/><br/>
    <input class="input" type="password" name="password" placeholder="Enter Your Password" required>
    <br/><br/>
    <input class="input" type="password" name="password_confirmation" placeholder="Repeat Password" required>
    <br/><br/>
    <input class="input" type="text" name="name" placeholder="Name" required>
    <br/><br/>
    <input class="input" type="text" name="streetAddress" placeholder="Street address" required>
    <br/><br/>
    <input class="input" type="text" name="postalCode" placeholder="Postal code" required>
    <br/><br/>
    <input class="input" type="text" name="city" placeholder="City" required>
    <br/><br/>
    <button class="newsletter-btn"><i class="fa fa-envelope"></i> Register</button>
</form>
 
                    </div>
                </div>
            </div>
 
 
</div>
    
 
</p>