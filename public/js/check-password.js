function checkError() {
  // Seleziono i campi password e converma password
  const pswd1 = document.getElementById("password");
  const pswd2 = document.getElementById("password-confirm") ?? document.getElementById("password_confirmation");

  let errorSpan = document.getElementById("password-error");
  let textStrong = document.getElementById("text-strong");

  if (!errorSpan) {
    errorSpan = document.createElement("span")
    errorSpan.classList.add("invalid-feedback")
    errorSpan.setAttribute("id", "password-error")
    textStrong = document.createElement("strong")
    textStrong.setAttribute("id", "text-strong")
    errorSpan.style.display = "block";
  }

  //controllo se le password sono diverse
  if (pswd1.value !== pswd2.value) {
    //rendo visibile il messaggio e lo personalizzo 
    textStrong.textContent = "The password field confirmation does not match."
    pswd1.insertAdjacentElement('afterend', errorSpan);
    errorSpan.append(textStrong);
    // altrimenti se la lunghezza è minore di 8
  } else if (pswd1.value.length < 8 || pswd2.value.length < 8) {
    //rendo visibile il messaggio e lo personalizzo 
    textStrong.textContent = "The password field must be at least 8 characters."
    pswd1.insertAdjacentElement('afterend', errorSpan);
    errorSpan.append(textStrong);
  }
  else { // Altrimenti lo rendo invisibile
    if (errorSpan) {
      errorSpan.remove();
    }
  }

  textStrong.classList.add("error-user-form");
}