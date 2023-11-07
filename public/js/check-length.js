function checkLength(id) {
  const element = document.getElementById(id);
  let errorSpan = document.querySelector(`.invalid-feedback.${id}`);
  if (element.value < 1) {
      if (!errorSpan) {
          errorSpan = document.createElement("span");
          errorSpan.classList.add("invalid-feedback", `${id}`);
          const textStrong = document.createElement("strong");
          errorSpan.style.display = "block";
          textStrong.textContent = "Il valore non deve essere inferiore ad 1";
          element.insertAdjacentElement('afterend', errorSpan);
          errorSpan.append(textStrong);
          textStrong.classList.add("error-apartment-form");
      }
  } else {
      if (errorSpan) {
          errorSpan.remove();
      }
  }
}