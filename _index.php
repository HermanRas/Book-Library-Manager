<header id="auth-header" class="auth-header">
    <img src="IMG/Landing-book-worm.png" style="height: 200px; position: fixed; bottom: 150px; left: 10%; ">
    <h1>
        <span class="fa fa-book-open fa-lg"></span> BookWorm <span class="sr-only">Sign
            In</span>
    </h1>
</header><!-- form -->
<form class="auth-form" action="main.php">
    <!-- .form-group -->
    <div class="form-group">
        <div class="form-label-group">
            <input type="text" id="inputUser" class="form-control placeholder-shown" placeholder="Username"
                autofocus="">
            <label for="inputUser">Username</label>
        </div>
    </div><!-- /.form-group -->
    <!-- .form-group -->
    <div class="form-group">
        <div class="form-label-group">
            <input type="password" id="inputPassword" class="form-control placeholder-shown" placeholder="Password">
            <label for="inputPassword">Password</label>
        </div>
    </div><!-- /.form-group -->
    <!-- .form-group -->
    <div class="form-group">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
    </div><!-- /.form-group -->
    <!-- .form-group -->
    <div class="form-group text-center">
        <div class="custom-control custom-control-inline custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="remember-me"> <label class="custom-control-label"
                for="remember-me">Keep me sign in</label>
        </div>
    </div><!-- /.form-group -->
    <!-- recovery links -->
    <div class="text-center pt-3">
        <a href="#" class="link">Forgot Username?</a> <span class="mx-2">·
        </span> <a href="#" class="link">Forgot
            Password?</a>
    </div><!-- /recovery links -->
</form><!-- /.auth-form -->