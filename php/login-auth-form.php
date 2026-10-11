<section class="auth-form">
  <div class="auth-card">
    <span class="eyebrow">FitPulse account</span>
    <h2 class="display-5 mt-2 mb-1">Welcome back</h2>
    <p class="text-muted mb-4">Log in to continue to FitPulse.</p>
    <?php if ($loginErr != '') { ?>
    <div class="alert alert-danger" role="alert"><?php echo $loginErr; ?></div>
    <?php } ?>
    <form method="post" action="" novalidate>
      <div class="mb-3">
        <label class="form-label" for="username">Username</label>
        <input type="text" class="form-control <?php if ($usernameErr != '') echo 'is-invalid'; ?>" id="username" name="username" autocomplete="username" placeholder="Enter your username" value="<?php echo htmlspecialchars($username); ?>">
        <div class="invalid-feedback"><?php echo $usernameErr; ?></div>
      </div>
      
      <div class="mb-4">

        <label class="form-label" for="password">Password</label>
          <input type="password" class="form-control <?php if ($passwordErr != '') echo 'is-invalid'; ?>" id="password" name="password" autocomplete="current-password" placeholder="Enter your password">
          <div class="invalid-feedback"><?php echo $passwordErr; ?></div>
      </div>

      
      <button type="submit" name="submit" class="btn btn-volt btn-lg w-100">Log in</button>
    </form>

    <p class="text-muted mt-4 mb-0">New to FitPulse? <a href="register.php">Create an account</a></p>
  </div>
</section>