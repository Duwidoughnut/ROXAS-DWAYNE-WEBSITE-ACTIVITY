$(function () {
  $.validator.addMethod('usernameFree', function (v) { return !FP.usernameTaken(v); }, 'That username is already taken');
  $.validator.addMethod('lettersOnly', function (v) { return /^[A-Za-z][A-Za-z .,'-]*$/.test(v); }, 'Name may only contain letters and spaces');

  var $msg = $('#regMessage');

  $('#registerForm').validate({
    rules: {
      name: { required: true, minlength: 2, lettersOnly: true },
      email: { required: true, email: true },
      phone: { minlength: 7 },
      username: { required: true, minlength: 3, usernameFree: true },
      password: { required: true, minlength: 6 },
      confirm_password: { required: true, equalTo: '#password' }
    },
    messages: {
      name: { required: 'Please enter your full name', minlength: 'Name must be at least 2 characters' },
      email: { required: 'Please enter your email address', email: 'Enter a valid email like name@example.com' },
      phone: { minlength: 'Phone number looks too short' },
      username: { required: 'Please choose a username', minlength: 'Username must be at least 3 characters' },
      password: { required: 'Please enter a password', minlength: 'Password must be at least 6 characters' },
      confirm_password: { required: 'Please confirm your password', equalTo: 'Passwords do not match' }
    },
    submitHandler: function () {
      var res = FP.register({
        name: $('#name').val().trim(),
        email: $('#email').val().trim(),
        phone: $('#phone').val().trim(),
        username: $('#username').val().trim(),
        password: $('#password').val(),
        plan: $('[name=plan]:checked').val()
      });
      $msg.removeClass('d-none alert-success alert-danger');
      if (res.error) { $msg.addClass('alert-danger').text(res.error); return; }
      $msg.addClass('alert-success').text('Registration successful! Redirecting to log in…');
      $('#regSubmit').prop('disabled', true);
      setTimeout(function () { location.href = 'login.php'; }, 1300);
    }
  });
});
