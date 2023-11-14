@extends('layouts.app')

@section('content')
<form id="formPayment" action="{{ route('payment.success') }}" method="post">
  @csrf
  <input type="hidden" name="apartment_id" value="{{ $apartment->id }}">
  <input type="hidden" name="token" value="{{ $random }}">

  <div class="container mt-5">


    <div class="row row-cols-1 row-cols-lg-3 g-4">
      <label for="sponsorship_id" class="text-dark text-center w-100 display-2">Seleziona il pacchetto:</label>
      <div class="col">
        {{-- Payment card 2.99 --}}
        <div class="card payment-card">
          <div class="d-flex">
            <h2 class="card-title ms-auto text-md-start pt-3 px-3 fw-bold">Promo Casa Accogliente</h2>
            <div class="promo-img">
              <img src="/promo_logo_bronze.png" alt="">
            </div>
          </div>

          <span class="fs-1 mt-5 p-3" style="color: #e55812"><span class="opacity-25 text-decoration-line-through px-2"
              style="color: black">5,99 EUR</span>/
            2,99 EUR</span>

          <div class="card-body">
            <p class="card-text">Vivere comodamente è più accessibile che mai! Sponsorizza il tuo
              appartamento con il nostro pacchetto promozionale Casa Accogliente a soli 2,99€! Ottieni
              visibilità premium per <span class="fw-bold" style="color: #e55812">24h</span> su
              piattaforme selezionate e massima
              esposizione per
              attirare inquilini desiderabili.</p>
          </div>

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary btn-package" data-bs-toggle="modal"
            data-bs-target="#exampleModal" value="1">
            Procedi all'acquisto!
          </button>

        </div>
      </div>
      <div class="col">
        {{-- Payment card 5.99 --}}
        <div class="card payment-card">
          <div class="d-flex">
            <h2 class="card-title ms-auto text-md-start fw-bold px-3 pt-3">Promo Eleganza Urbana</h2>
            <div class="promo-img">
              <img src="/promo_logo_silver.png" alt="">
            </div>
          </div>
          <span class="fs-1 mt-5 p-3" style="color: #e55812"><span class="opacity-25 text-decoration-line-through px-2"
              style="color: black">9,99
              EUR</span>/
            5,99 EUR</span>

          <div class="card-body">
            <p class="card-text">Dai un tocco di classe al tuo annuncio! Scegli il pacchetto
              promozionale
              Eleganza Urbana a soli 5,99€! Garantisci visibilità premium per <span class="fw-bold"
                style="color: #e55812">72h</span>, con spazi pubblicitari mirati su piattaforme
              immobiliari
              di
              alto livello. Massimizza la tua esposizione e attira inquilini che cercano stile e
              comodità.
            </p>
          </div>

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary btn-package" data-bs-toggle="modal"
            data-bs-target="#exampleModal" value="2">
            Procedi all'acquisto!
          </button>
        </div>
      </div>
      <div class="col">
        {{-- Payment card 9.99 --}}
        <div class="card payment-card">
          <div class="d-flex">
            <h2 class="card-title ms-auto text-start fw-bold px-3 pt-3">Promo Lusso Residenziale</h2>
            <div class="promo-img">
              <img src="/promo_logo_gold.png" alt="">
            </div>
          </div>
          <span class="fs-1 mt-5 p-3" style="color: #e55812"><span class="opacity-25 text-decoration-line-through px-2"
              style="color: black">12,99 EUR</span>/
            9,99 EUR</span>

          <div class="card-body">
            <p class="card-text">Per un'esperienza di sponsorizzazione senza rivali, opta per il pacchetto
              promozionale Lusso Residenziale a soli 9,99€! Assicurati visibilità premium per <span class="fw-bold"
                style="color: #e55812">144h</span> su piattaforme esclusive,
              posizionandoti davanti a una vasta
              platea di acquirenti interessati a residenze di alta classe. La tua offerta di lusso merita
              l'attenzione che merita.</p>
          </div>

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary btn-package" data-bs-toggle="modal"
            data-bs-target="#exampleModal" value="3">
            Procedi all'acquisto!
          </button>

        </div>
      </div>
    </div>

    {{-- <div>
      <label for="sponsorship_id" class="text-dark text-center w-100">Seleziona il pacchetto:</label>
      <select name="sponsorship_id" id="sponsorship_id" class="form-select">
        <option value="1">2,99 € per 24 ore di sponsorizzazione</option>
        <option value="2">5.99 € per 72 ore di sponsorizzazione</option>
        <option value="3">9.99 € per 144 ore di sponsorizzazione</option>
      </select>
    </div> --}}



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Aggiungi una carta</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="d-flex">
              <div>
                <!-- Aggiungi il tuo elemento fornito da Braintree qui -->
                <script src="https://js.braintreegateway.com/web/dropin/1.40.2/js/dropin.js"></script>
                <div id="dropin-container"></div>


              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button id="submit-button" class="btn btn-primary">Acquista!</button>

          </div>
        </div>
      </div>
    </div>

    {{-- Braintree --}}

    {{-- <div class="d-flex">
      <div>
        <!-- Aggiungi il tuo elemento fornito da Braintree qui -->
        <script src="https://js.braintreegateway.com/web/dropin/1.40.2/js/dropin.js"></script>
        <div id="dropin-container"></div>

        <button id="submit-button" class="btn btn-success">Purchase</button>

      </div>
    </div> --}}

</form>

<!-- Aggiungi il tuo script JavaScript per Braintree qui -->
<script>
  let button = document.querySelector('#submit-button');
        let packageButton = document.querySelectorAll('.btn-package')
        //let packageSelect = document.querySelector('#sponsorship_id');
        let apartmentId = document.querySelector('input[name="apartment_id"]');
        let selectedPackage;

        braintree.dropin.create({
            authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
            selector: '#dropin-container'
        }, function(err, instance) {

            for (let i = 0; i < packageButton.length; i++) {
                packageButton[i].addEventListener('click', function() {
                    selectedPackage = this.value
                    console.log('hai selezionato' + selectedPackage)
                })
            }

            button.addEventListener('click', function() {

                event.preventDefault();

                instance.requestPaymentMethod(function(err, payload) {
                    if (err || payload === null) {

                    } else {
                    let nonce = payload.nonce;
                    document.getElementById('formPayment').submit();

                    // Invia i dati al server tramite AJAX o una semplice richiesta HTTP
                    fetch('{{ route('payment.success') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            apartment_id: apartmentId.value,
                            sponsorship_id: selectedPackage,
                            nonce: nonce
                        })
                    }).then(function(response) {
                        // Gestisci la risposta del server, ad esempio, reindirizzando l'utente a una pagina di conferma
                    });
                    }
                });

            })
        });
</script>
@endsection