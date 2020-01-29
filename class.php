<?php

class Apartment
{
	public $members = array(
		"Foreigns",
		"Mrs. Susan",
		"Mr. Donald",
		"John",
		"Mrs. Maria",
		"Steve",
		"Elon"
	);

	# $this->members[0];

	public function readFile($filename) 
	{
		$file = file_get_contents($filename);
		return $file;
	}

	public function paymentDone()
	{
		$filevalue = $this->readFile("turn.txt");
		file_put_contents("turn.txt", $filevalue+=1);
		header("Refresh:0");
	}

	public function controlDate() {
		$date = strtotime(date("d.m.y"));
		$filevalue = strtotime($this->readFile("date.txt"));
		$difference = $date - $filevalue;
		$yil = floor($difference / (365*60*60*24));
$ay = floor(($difference - $yil * 365*60*60*24) / (30*60*60*24)); 
		if ($ay >= 1) {
			$access = true;
		} else {
			$access = false;
		}
		return $access;
	}

	public function setDate() {
		file_put_contents("date.txt", date("d.m.y"));
	}
	
}

?>