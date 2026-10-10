/* FitPulse shared logic (demo only: data is kept in the browser's localStorage).
   Login: admin / 12345  or  member / member123, plus any account made on the Register page. */
(function () {
  var USERS_KEY = 'fitpulse_users', SESSION_KEY = 'fitpulse_session';
  var FP = {};

  /* ---- saved accounts ---- */
  function getUsers() {
    try { var raw = localStorage.getItem(USERS_KEY); if (raw) return JSON.parse(raw); } catch (e) { }
    return [{ name: 'Marco Reyes', username: 'member', password: 'member123' }];   // demo member
  }
  function saveUsers(list) {
    try { localStorage.setItem(USERS_KEY, JSON.stringify(list)); } catch (e) { }
  }

  FP.usernameTaken = function (username) {
    var u = (username || '').trim().toLowerCase();
    return u === 'admin' || getUsers().some(function (x) { return x.username.toLowerCase() === u; });
  };

  FP.register = function (f) {
    if (FP.usernameTaken(f.username)) return { error: 'That username is already taken.' };
    var users = getUsers();
    users.push(f);
    saveUsers(users);
    return { ok: true };
  };

  /* ---- login session ---- */
  FP.login = function (username, password) {
    var u = username.trim().toLowerCase(), name = null;
    if (u === 'admin' && password === '12345') name = 'Staff Admin';        // static credentials
    else {
      var m = getUsers().filter(function (x) { return x.username.toLowerCase() === u && x.password === password; })[0];
      if (m) name = m.name;
    }
    if (!name) return false;
    sessionStorage.setItem(SESSION_KEY, JSON.stringify({ username: u, name: name }));
    return true;
  };

  FP.session = function () {
    try { return JSON.parse(sessionStorage.getItem(SESSION_KEY)); } catch (e) { return null; }
  };

  FP.requireLogin = function () {          
    var s = FP.session();
    if (!s) { location.replace('login.php'); return null; }
    return s;
  };

  FP.logout = function () {
    sessionStorage.removeItem(SESSION_KEY);
    location.href = 'login.php';
  };

  FP.esc = function (s) {
    return String(s).replace(/[&<>"']/g, function (c) { return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]; });
  };

  document.addEventListener('click', function (e) {
    if (e.target.closest('[data-logout]')) { e.preventDefault(); FP.logout(); }
  });

  window.FP = FP;
})();
