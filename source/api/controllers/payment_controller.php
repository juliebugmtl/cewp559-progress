<?php

$stripe = array(
  "secret_key"      => "sk_test_lkKbAaqfGFPurx2eJJ7BMsJU",
  "publishable_key" => "pk_test_CHVcfMnYLGNOf93388c1JSEG"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);

class PaymentController {
    
    public function collect($payload) {

      $token  = $payload->stripeToken;
      $customer = \Stripe\Customer::create(array(
          'email' => $payload->email,
          'source'  => $token
      ));

      $charge = \Stripe\Charge::create(array(
          'customer' => $customer->id,
          'amount'   => $payload->amount,
          'currency' => 'cad'
      ));

    }

}