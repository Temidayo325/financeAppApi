<?php

return [

   'paystack' => [
      'secret_key' => env('PAYSTACK_SECRET_KEY'),
      'public_key' => env('PAYSTACK_PUBLIC_KEY'),
      'initialize_transaction' => env('PAYSTACK_INITIALIZE_TRANSACTION_URL'),
      'verify_transaction' => env('PAYSTACK_VERIFY_TRANSACTION_URL'),
      'charge_authorization' => env('PAYSTACK_CHARGE_AUTHORIZATION'),
      'bank_list' => env('PAYSTACK_BANK_LIST'),
      'verify_account_number' => env('PAYSTACK_VERIFY_ACCOUNT_NUMBER')
   ],

   'transfer' => [
      'initiate_transfer' => env('PAYSTACK_INITIATE_BULK_TRANSFER'),
      'finalize_transfer' => env('PAYSTACK_FINALIZE_TRANSFER')
   ],

   'otp' => [
      'disable_otp' => env('PAYSTACK_INITIALIZE_DISABLE_OTP'),
      'complete_disable' => env('PATSTACK_COMPLETE_OTP_DISABLE')
   ],

   'recepient' => [
      'create_recipient' => env('PAYMENT_CREATE_RECIPIENT'),
   ]
];
