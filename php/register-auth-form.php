<section class="auth-form">
  <div class="auth-card" style="max-width:520px">
    <a href="login.php" class="text-muted text-decoration-none small">← Back to log in</a>
    <span class="eyebrow d-block mt-3">Create an account</span>
    <h2 class="display-5 mt-1 mb-4">Join FitPulse</h2>
    <?php if ($success != '') { ?>
    <div class="alert alert-success" role="alert"><?php echo $success; ?></div>
    <?php } ?>
    
    <form method="post" action="" novalidate>
      <div class="row g-3">
        <div class="col-12">
          <label class="form-label" for="name">Full name</label>
          <input class="form-control <?php if ($nameErr != '') echo 'is-invalid'; ?>" id="name" name="name" autocomplete="name" placeholder="Enter name" value="<?php echo htmlspecialchars($name); ?>">
          <div class="invalid-feedback"><?php echo $nameErr; ?></div>
        </div>
        
        <div class="col-12">
          <label class="form-label" for="email">Email</label>
          <input class="form-control <?php if ($emailErr != '') echo 'is-invalid'; ?>" id="email" name="email" type="email" autocomplete="email"
          placeholder="name@example.com" value="<?php echo htmlspecialchars($email); ?>">
        <div class="invalid-feedback"><?php echo $emailErr; ?></div>
      </div>

      <div class="col-md-6">
        <label class="form-label" for="phone">Phone 
          <span class="text-muted fw-normal">(optional)</span>
        </label>

        <input class="form-control <?php if ($phoneErr != '') echo 'is-invalid'; ?>" id="phone" name="phone" type="tel" placeholder="(63+)" value="<?php echo htmlspecialchars($phone); ?>">

        <div class="invalid-feedback"><?php echo $phoneErr; ?></div>
      </div>

      <div class="col-md-6">
        <label class="form-label" for="username">Username</label>
        <input class="form-control <?php if ($usernameErr != '') echo 'is-invalid'; ?>" id="username" name="username" autocomplete="username"
          value="<?php echo htmlspecialchars($username); ?>">
        <div class="invalid-feedback"><?php echo $usernameErr; ?></div>
      </div>

      <div class="col-md-6">
        <label class="form-label" for="password">Password</label>
        <input class="form-control <?php if ($passwordErr != '') echo 'is-invalid'; ?>" id="password" name="password" type="password"
          autocomplete="new-password" placeholder="Enter password">
        <div class="invalid-feedback"><?php echo $passwordErr; ?></div>
      </div>

      <div class="col-md-6">
        <label class="form-label" for="confirm_password">Confirm password</label>
        <input class="form-control <?php if ($confirmErr != '') echo 'is-invalid'; ?>" id="confirm_password" name="confirm_password"
          type="password" autocomplete="new-password" placeholder="Re-enter password">
        <div class="invalid-feedback"><?php echo $confirmErr; ?></div>
      </div>

      <div class="col-12">
        <label class="form-label">Subscription plan</label>
        <div class="row g-2">
          <div class="col-6"><input type="radio" class="btn-check" name="plan" id="planWeekly" value="weekly"
          autocomplete="off" <?php if ($plan == 'weekly') echo 'checked'; ?>>
          
          <label class="btn btn-outline-light w-100 text-start p-3" for="planWeekly">
            <strong class="display-font fs-5">Weekly</strong><br><span class="text-muted">₱350 · 7 days</span>
          </label>

        </div>

        <div class="col-6">
          <input type="radio" class="btn-check" name="plan" id="planMonthly" value="monthly"
        autocomplete="off" <?php if ($plan != 'weekly') echo 'checked'; ?>>
        
        <label class="btn btn-outline-light w-100 text-start p-3" for="planMonthly">
          <strong class="display-font fs-5">Monthly</strong><br><span class="text-muted">₱1,200 · 30 days</span>
        </label>
      </div>
    </div>
    <div class="invalid-feedback d-block"><?php echo $planErr; ?></div>
  </div>
</div>
<button class="btn btn-volt btn-lg w-100 mt-4" type="submit" name="submit">Create account</button>
</form>
</div>
</section>