@extends('layouts.app')

@section('content')

<form action="{{ route('payment.success') }}" method="post">
  @csrf
  <input type="hidden" name="apartment_id" value="{{ $apartment->id }}">

  <div class="container mt-5">
    <div class="row">
      <div class="col">
        <div>
          <label for="sponsorship_id" class="text-dark text-center w-100">Seleziona il pacchetto:</label>
          <select name="sponsorship_id" id="sponsorship_id" class="form-select">
            <option value="1">2,99 € per 24 ore di sponsorizzazione</option>
            <option value="2">5.99 € per 72 ore di sponsorizzazione</option>
            <option value="3">9.99 € per 144 ore di sponsorizzazione</option>
          </select>
        </div>
      
        <div>
          <!-- Aggiungi il tuo elemento fornito da Braintree qui -->
          <script src="https://js.braintreegateway.com/web/dropin/1.40.2/js/dropin.js"></script>
          <div id="dropin-container"></div>
        </div>
      
        <button id="submit-button" class="btn btn-success">Purchase</button>
      </div>
    </div>
  </div>

</form>

<!-- Aggiungi il tuo script JavaScript per Braintree qui -->
<script>
  var button = document.querySelector('#submit-button');
  var packageSelect = document.querySelector('#sponsorship_id');
  var apartmentId = document.querySelector('input[name="apartment_id"]');

  braintree.dropin.create({
      authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
      selector: '#dropin-container'
  }, function (err, instance) {
      button.addEventListener('click', function () {
          instance.requestPaymentMethod(function (err, payload) {
              // Invia il pacchetto e lo slug alla rotta /payment/success
              var selectedPackage = packageSelect.options[packageSelect.selectedIndex].value;
              var nonce = payload.nonce;

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
              }).then(function (response) {
                  // Gestisci la risposta del server, ad esempio, reindirizzando l'utente a una pagina di conferma
              });
          });
      });
  });
</script>

@endsection