<?php

namespace App\Services;
use App\Models\Transaction;
use Carbon\Carbon;


/**
 *
 */
class Sale
{
   public static function initializeTransaction(object $data)
   {
      $transaction = Transaction::create([
         'origin' => $data->origin,
         'destination' => $data->destination,
         'reference' => $data->reference,
         'amount' => $data->amount,
         'status' => false
      ]);
      return ( $transaction ) ? True : False ;
   }

   public static function UpdateSale(string $reference)
   {
      $transaction = Transaction::where('reference', $reference)->first();
      $transaction->updated_at = Carbon::now();
      $transaction->save();
   }

   public static function getAmount(string $reference)
   {
      return Transaction::where('reference', $reference)->first()->amount;
   }
}
