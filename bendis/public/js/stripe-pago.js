document.addEventListener('DOMContentLoaded', function() {
    // Todo tu código aquí, por ejemplo:

    let stripe = null;
    let cardElement = null;

    const metodoPagoSelect = document.querySelector('select[name="metodo_pago"]');
    const datosTarjetaDiv = document.getElementById('datos-tarjeta');
    const cardErrors = document.getElementById('card-errors');
    const form = document.getElementById('payment-form');

    function inicializarStripe() {
        if (!stripe) {

           stripe = Stripe('pk_test_51RPwXODw6hC26bNw8GvDTIDnDjuH5EwMBChmQBDtxtcu1QjAhYdTrooNgHEwkLvXvSwmiPvSUM8iHe1DwZYccGGg00HjCWr4kC');

            const elements = stripe.elements();
            cardElement = elements.create('card');
            cardElement.mount('#card-element');

            cardElement.on('change', function(event) {
                if(event.error) {
                    cardErrors.textContent = event.error.message;
                } else {
                    cardErrors.textContent = '';
                }
            });
        }
    }

    metodoPagoSelect.addEventListener('change', function() {
        if (this.value === 'stripe') {
            datosTarjetaDiv.style.display = 'block';
            inicializarStripe();
        } else {
            datosTarjetaDiv.style.display = 'none';
            cardErrors.textContent = '';
        }
    });

    form.addEventListener('submit', async function(e) {
        if(metodoPagoSelect.value === 'stripe') {
            e.preventDefault();

            const { token, error } = await stripe.createToken(cardElement);

            if(error) {
                cardErrors.textContent = error.message;
            } else {
                const hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                form.submit();
            }
        }
    });
});
