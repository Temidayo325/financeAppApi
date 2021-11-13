<?php

namespace App\Services;

use App\Models\Vendor;
use Illuminate\Support\Facades\Http;

/**This Service contains anything that has to do with vendors
 *
 */
class ThirdParty
{

   public static function AddNewVendor(object $data)
   {
      $vendor = Vendor::create([
         'account_number' => $data->account_number,
         'account_name' => $data->account_name,
         'bank' => $data->bank,
         'recipient_code' => $data->recipient_code
      ]);
      return ($vendor) ? true : false;
   }

   public static function registerNewVendor(object $data):bool
   {
      $response = Http::retry(3, 1000)->withHeaders([
          'Authorization' => 'Bearer '.config('paystack.paystack.secret_key'),
          'Content-Type' => 'application/json'
      ])
      // ->asForm()
      ->post(config('paystack.recepient.create_recipient'), [
          'type' => 'nuban',
          'name' => $data->name,
          'account_number' => $data->account_number,
          'bank_code' => $data->bank_code
      ]);
      $newResponse = (object) json_decode($response->body());
      // return $newResponse;

      $vendor = Vendor::create([
         'account_number' => $newResponse->data->details->account_number,
         'name' => $newResponse->data->name,
         'bank' => $newResponse->data->details->bank_name,
         'recipient_code' => $newResponse->data->recipient_code
      ]);
      return ($vendor) ? true : false;
   }

   public static function IfVendorExists(int $account_number):bool
   {
      return (Vendor::where('account_number', $account_number)->first()) ? true : false;
   }
}
