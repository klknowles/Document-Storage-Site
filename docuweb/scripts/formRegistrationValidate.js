function validatePasswords()
{
  var password1 = document.getElementById("password");
  var password2 = document.getElementById("password2");

  if (password1.value != password2.value)
  {
    document.getElementById("submit").disabled = true;
    password2.setCustomValidity("Passwords do not match.");
  }
  else
  {
    document.getElementById("submit").disabled = false;
    password2.setCustomValidity("");
  }
}