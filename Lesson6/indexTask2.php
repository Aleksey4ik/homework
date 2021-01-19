<?php

function parseFile(string $fileName): array
{
	$file = fopen("$fileName", "r");

	$result = [];

	$i = 1;
	while (true) {
		$row = fgetcsv($file);

		if (is_null($row)) {			// я не понял для чего этот if?
			break;
		}

		if (isset($row[0], $row[1]) === false) {
			try {
				throw new InvalidArgumentException("name or price not set in string # ");
			} catch (InvalidArgumentException $e) {
				echo $e->getMessage() . "$i" . "\n";
				error_log(date("F j, Y, g:i a").' - Error: '.$e->getMessage() . "$i" . "\n", 3, 'c:\xampp\log\errors_php.log');
				break;			
			}
		}

		$result[] = ['name' => $row[0], 'price' => $row[1]];

		$i++;
	}

	fclose($file);
	return $result;
}

$myFile = 'file.txt';
$arr = parseFile($myFile);
var_dump($arr);
