<?php

?>
<!--=======================================
                LOGIN FORM
==========================================-->

<div class="login-form login-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="login-wrap">
                    <div class="log-title">Login form</div>
                    <form action="" method="post" class="login-form">
                        <p><label for="email">Email</label></p>
                        <p><input type="text" name="email" placeholder="Type your email..." class="login-field"></p>

                        <p><label for="password">Password</label></p>
                        <p><input type="password" name="password" placeholder="Your password..." class="login-field"></p>
                        <a href="?p=reset" class="forget-btn">Forget your password?</a>

                        <p><label for="type">Type</label></p>
                        <select name="type">
                            <option value="0">Select</option>
                            <option value="1">User</option>
                            <option value="2">Admin</option>
                        </select>

                        <p><input type="submit" name="btnLogin" value="Login"></p>

                        <div>Not a member?<a href="?p=registration" class="sign-up-btn">Sign up now</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
