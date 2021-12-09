<?php

namespace App\Services;

use Illuminate\Support\Facades\Schema;
/**
 *
 */
class Utility
{

		public static function generator($length = 20)
		{
			$char = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
			$random = '';

			for ($i=0; $i < $length; $i++) {
				# code...
				$index = rand(0, strlen($char) - 1);
				$random .=$char[$index];
			}
			return $random;
		}

		public static function generateInteger($length = 6)
		{
			$char = '0123456789';
			$random = '';

			for ($i=0; $i < $length; $i++) {
				# code...
				$index = rand(0, strlen($char) - 1);
				$random .=$char[$index];
			}
			return $random;
		}
		public function download_file($filepath)
			{
				if(file_exists($filepath)) {

			            header('Content-Description: File Transfer');
			            header('Content-Type: application/octet-stream');
			            header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
			            header('Expires: 0');
			            header('Cache-Control: must-revalidate');
			            header('Pragma: public');
			            header('Content-Length: ' . filesize($filepath));
			            flush();
			            readfile($filepath);
			            die();
			        } else {
			            http_response_code(404);
				        die();
			        }
			}
		/*
			param {format} => the format to display the difference which can be in days(%D), months
		*/
		public function calcDateDifference($first, $second, $format)
		{
			$first_date = date_create($first);

			$second_date = date_create($second);

			$difference = date_diff($first_date, $second_date);

			return intval($difference->format($format));
		}

		public function AddYearToCurrentYear($year_in_strings)
		{
			$date = date_create(date('Y'));
			date_add($date, date_interval_create_from_date_string($year_in_strings));
			return date_format($date, 'Y');
		}

	
}
