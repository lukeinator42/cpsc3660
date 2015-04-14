

      <form class="form-signin" action = "scripts/php/login.php" method = "post">
          <?php
            if(isset($_GET['error'])) {
            echo '<div class="alert alert-danger" role="alert">Invalid Login</div>';
            }
          ?>
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" id="inputUsername" name = "inputUsername" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name = "inputPassword"class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" >Sign in</button>
      </form>