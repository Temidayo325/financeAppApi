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

		public function file_upload($file, $max_file_size=3000, $file_type = 'jpg', $dir)
		{
			extract($file);
			if ($error == 0) {
				# code...
				if ($size <= $max_file_size) {
					# code...
					// $upload_type = explode('.', $name);
						if (is_dir($dir)) {
							# code...
							$pathInfo = pathinfo($file);
							$name = generator(60).'.jpg';
							if(move_uploaded_file($tmp_name, $dir.'/'.$name))
							{
								$path = $dir.'/'.$name;
								return $path;
							}else{
								return false;
							}
						}else{
							mkdir($dir);
							if(move_uploaded_file($tmp_name, $dir.'/'.$name))
							{
								$path = $dir.'/'.$name;
								return $path;
							}else{
								return false;
							}
						}
				}else{
					return "File size too big";
				}
			}else{
				return $error;
			}
		}
}