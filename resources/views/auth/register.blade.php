@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Register') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4 row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                  value="{{ old('name') }}" autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="mb-4 row">
              <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname')
                }}</label>

              <div class="col-md-6">
                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror"
                  name="surname" value="{{ old('surname') }}" autocomplete="surname" autofocus>

                @error('surname')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="mb-4 row">
              <label for="birth_date" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth')
                }}</label>

              <div class="col-md-6">
                <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror"
                  name="birth_date" value="{{ old('birth_date') }}" autocomplete="birth_date" autofocus>

                @error('birth_date')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="mb-4 row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address')
                }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="mb-4 row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password')
                }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" required autocomplete="new-password" oninput="checkError();">
              </div>
            </div>

            <div class="mb-4 row">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm
                Password') }}</label>

              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                  autocomplete="new-password" oninput="checkError();">
              </div>
            </div>

            {{--Client-side Validation - controlla se le due password inserite sono uguali --}}
            <script>
              function checkError(){
                // Seleziono i campi password e converma password
                const pswd1 = document.getElementById("password");
                const pswd2 = document.getElementById("password-confirm");

                let errorSpan = document.getElementById("password-error");
                let textStrong = document.getElementById("text-strong");

                if(!errorSpan){
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
                } else if(pswd1.value.length < 8 || pswd2.value.length < 8){
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
              }
            </script>

            {{-- ---------------------------------------------------------------------------------- --}}

            <div class="mb-4 row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Register') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection