$.validator.setDefaults({
  errorElement: 'div',
  errorClass: 'is-invalid',
  validClass: 'is-valid',
  errorPlacement: function (error, element) { error.addClass('invalid-feedback'); error.insertAfter(element); },
  highlight: function (el, errorClass, validClass) { $(el).addClass(errorClass).removeClass(validClass); },
  unhighlight: function (el, errorClass, validClass) { $(el).removeClass(errorClass).addClass(validClass); }
});
