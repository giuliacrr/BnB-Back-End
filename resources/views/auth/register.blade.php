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
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

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
                                <input id="surname" type="text"
                                    class="form-control @error('surname') is-invalid @enderror" name="surname"
                                    value="{{ old('surname') }}" autocomplete="surname" autofocus>

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
                                <input id="birth_date" type="date"
                                    class="form-control @error('birth_date') is-invalid @enderror" name="birth_date"
                                    value="{{ old('birth_date') }}" autocomplete="birth_date" autofocus>

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                <span id="password-error" class="invalid-feedback" role="alert">
                                    <strong>Try again</strong>
                                </span>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm
                                Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        {{--Client-side Validation - controlla se le due password inserite sono uguali --}}
                        <script>
                            
                            // Seleziono i campi password e converma password
                            const pswd1 = document.getElementById("password");
                            const pswd2 = document.getElementById("password-confirm");

                            // Seleziono il messaggio di errore e il suo testo
                            const pswdError = document.getElementById("password-error");
                            const errorText = pswdError.querySelector("strong");

                            // Creo la funzione per il controllo delle password
                            function checkError(){
                                // Ottengo il value delle due password inserite
                                let firstPswd = pswd1.value;
                                let secondPswd = pswd2.value;

                                //controllo se le password sono diverse
                                if (firstPswd !== secondPswd) {
                                    //rendo visibile il messaggio e lo personalizzo 
                                    pswdError.style.display = "block";
                                    errorText.textContent = "The password field confirmation does not match."
                                // altrimenti se la lunghezza è minore di 8
                                } else if(firstPswd.length < 8){
                                    //rendo visibile il messaggio e lo personalizzo 
                                    pswdError.style.display = "block";
                                    errorText.textContent = "The password field must be at least 8 characters."
                                }
                                 else { // Altrimenti lo rendo invisibile
                                    pswdError.style.display = "none";
                                }
                            }
                            // Aggiungo un event listner per ciascun campo di password per richiamare la funzione che controlla le password
                            pswd1.addEventListener("input", checkError);
                            pswd2.addEventListener("input", checkError);
                            
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