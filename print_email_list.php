<?php
$dateipfad = "email.txt";

				$tmp = fopen($dateipfad,"r");
					$data = unserialize(fread($tmp,filesize($dateipfad)));
				fclose($tmp);
				print_r($data);

?>