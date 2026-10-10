// The landing page is only for logged-in users: no session -> back to login.
var fpSession = FP.requireLogin();

$(function () {
  if (!fpSession) return;
  $('#welcomeMsg').html('Welcome, <span>' + FP.esc(fpSession.username) + '</span>!');
});
