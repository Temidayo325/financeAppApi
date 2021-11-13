<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

use App\Models\Bank;

/**
 *
 */
class Paystack
{

   public static function InitializePayment(object $data):object
   {
      $response = Http::retry(3, 1000)->withHeaders([
          'Authorization' => 'Bearer '.config('paystack.paystack.public_key'),
          'Content-Type' => 'application/json'
      ])
      // ->asForm()
      ->post(config('paystack.paystack.initialize_transaction'), [
          'email' => $data->email,
          'amount' => $data->amount
      ]);
      return (object) json_decode($response->body());
   }

   //returns the details of an initialized transaction
   public static function VerifyPayment(string $reference):object
   {
      $url = config('paystack.paystack.verify_transaction').$reference;
      $response = Http::retry(3, 1000)->withHeaders([
          'Authorization' => 'Bearer '.config('paystack.paystack.secret_key')
      ])->asForm()->get($url);
      return (object) json_decode($response->body());
   }

   // The method accept account number and bank_code as an array
   public static function VerifyAccountNumber(array $array):object
   {
      $url = config('paystack.paystack.verify_account_number').http_build_query($array);
      $response = Http::retry(3, 1000)->withHeaders([
          'Authorization' => 'Bearer '.config('paystack.paystack.secret_key')
      ])->asForm()->get($url);
      return (object) json_decode($response->body());
   }

   //charge a user with authorization_code
   public function ChargeUser()
   {

   }

   public static function GetListOfBanks():object
   {
      $response = Http::retry(3, 1000)->withHeaders([
          'Authorization' => 'Bearer '.config('paystack.paystack.secret_key')
      ])->asForm()->get(config('paystack.paystack.bank_list'));

      return (object) json_decode($response->body());

   }
}
