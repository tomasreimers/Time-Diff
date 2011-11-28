<?php
/******************************************
* timeDiff.php
* turns the difference between two timestamps
* into a human readble string
*******************************************/


function timeBetween($start_date, $end_date = -1, $precision = 2, $shortForm = false){  
	// turn endate into current date if no endate provided
	if ($end_date == -1){
		$end_date = time();
	}
	// define some human readble text
	$timeUnits = array(
		"year" => 1 * 60 * 60 * 24 * 365,
		"day" => 1 * 60 * 60 * 24,
		"hour" => 1 * 60 * 60,
		"minute" => 1 * 60,
		"second" => 1
	);
	
	$timeSpent = array(
		"year" => 0,
		"day" => 0,
		"hour" => 0,
		"minute" => 0,
		"second" => 0
	);
	
	// find difference
	$diff = $end_date-$start_date;  
	// validate everything
	if ($start_date < 0 || $end_date < 0 || $diff < 0){
		return false;
	}
	
	// turn into numbers
	foreach ($timeUnits as $unit => $amount){
		// set amount
		$timeSpent[$unit] = floor($diff/$amount);
		// remove from difference
		$diff -= $timeSpent[$unit] * $amount;		
	}
	
	// enumerate my units
	$keys = array_keys($timeSpent);
	// prep string with return value
	$returnStr = "";
	// establish that our string has not started yet
	$begun = false;
	// go thru units and print $precision units
	for ($i = 0; $i < count($timeSpent) && $precision > 0; $i++){
		// identify if am going to add unit to final str
		if (($timeSpent[$keys[$i]] != 0) || ($i == count($timeSpent)-1) || ($begun)){
			// append str with number
			$returnStr .= $timeSpent[$keys[$i]]; 
			// append with appropriate identifier (based on shortForm)
			if ($shortForm){
				$returnStr .= substr($keys[$i], 0 , 1);
			}
			else{
				$returnStr .= " ";
				$returnStr .= $keys[$i];
				if ($timeSpent[$keys[$i]] != 1){
					$returnStr .= "s";
				}
				$returnStr .= " ";
			}
			// it has begin cascade and note one less level of precision
			$begun = true;
			$precision --;
		}
	}
	return $returnStr;
} 
?>