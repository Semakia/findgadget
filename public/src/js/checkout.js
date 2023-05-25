Stripe.setPublishableKey('pk_test_51MzSfCJ2LM8AStyJnHOXATb5cNFgciJMnQ7y8IVRxCj3TUM6UM9QgSEZq38IBDDleB1jZrtB5S0NceS06zKvgG9100vq07DEp4');

var $form = $('#checkout-form');

$form.submit(function(event){
    event.preventDefault();
    $form.find('button').prop('disabled', true);

    Stripe.card.createToken({
        number: $('#card-number').val(),
        cvc: $('#card-cvc').val(),
        exp_month: $('#card-expiry-month').val(),
        exp_year: $('#card-expiry-year').val(),
        name: $('#card-name').val()
    }, function(status, response) {
        if (response.error) {
            $('#charge-error').text(response.error.message);
            $('#charge-error').removeClass('hidden');
            $form.find('button').prop('disabled', false);
        } else {
            var token = response.id;
            $form.append($('<input type="hidden" name="stripeToken"/>').val(token));
            $form.get(0).submit();
        }
    });
});







