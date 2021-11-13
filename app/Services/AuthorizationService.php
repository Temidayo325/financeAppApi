<?php

namespace App\Services;
use App\Models\Authorization;
use App\Models\User;

/**
 *
 */
class AuthorizationService
{
   public static function create(object $parameters)
   {
      Authorization::create([
         'user_token' => User::where('user_token', $parameters->user_id)->first()->user_token,
         'code' => $parameters->code,
         'last4' => $parameters->last4,
         'card_type' => $parameters->card_type
      ]);
   }

   public static function Charge(object $parameters):object
   {
      $response = Http::retry(3, 1000)->withHeaders([
          'Authorization' => 'Bearer '.config('paystack.paystack.charge_authorization'),
          'Content-Type' => 'application/json'
      ])
      // ->asForm()
      ->post(config('paystack.paystack.initialize_transaction'), [
          'email' => $parameters->email,
          'amount' => $parameters->amount,
          'authorization_code' => $parameters->code
      ]);
      return (object) json_decode($response->body());
   }

   public static function GetChargeDetails(string $user_id):object
   {
      return Authorization::where('user_token', $user_id)->first();
   }
   
   public static function Update(object $parameters)
   {
      $current = Authorization::where('code', $parameters->old)->first();
      $current->code = $parameters->new;
      $current->save();
   }
}
