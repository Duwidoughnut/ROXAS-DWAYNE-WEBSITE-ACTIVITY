$(function () {
  // already logged in -> straight to the landing page
  if (FP.session()) { location.replace('landing.php'); return; }

  var $msg = $('#loginMessage');

  $('#loginForm').validate({
    rules: {
      username: { required: true },
      password: { required: true }
    },
    messages: {
      username: { required: 'Please enter your username' },
      password: { required: 'Please enter your password' }
    },
    submitHandler: function () {
      $msg.removeClass('d-none alert-success alert-danger');
      if (FP.login($('#username').val(), $('#password').val())) {
        $msg.addClass('alert-success').text('Login successful! Redirecting…');
        setTimeout(function () { location.href = 'landing.php'; }, 600);
      } else {
        $msg.addClass('alert-danger').text('Invalid username or password.');
      }
    }
  });
});
