<?php
    // OneFuck.php
    // Implement of OneFuck esoteric language(http://esolangs.org/wiki/OneFuck)
	// Copyrigth SLNETAIGA
	$source = file_get_contents($argv[1]);
    $source = preg_replace("/\#.+?\n/","",$source,-1);
	$source = str_split($source);
	
	
	$cell = 0;
	$brackets = 0;
	for($i=0; $i<count($source); ++$i) {
		switch($source[$i]) {
			case "":break;
			case " ":break;
			case "\t":break;
			case "\n":break;
			case "+" :
				$cell++;
				break;
			case "-" :
				$cell--;
				break;
			case "." :
				print chr($cell);
				break;
			case "`" :
				print $cell;
				break;
			case "!" :
				$cell = 0;
				break;
			case "," :
				$cell = ord(fgetc(STDIN));
				break;
			case "[" :
				if(!$cell) {
					$brackets = 1;
					while($brackets) {
						$i++;
						if($source[$i] == "[") {
							$brackets++;
						} else if($source[$i] == "]") {
							$brackets--;
						}
					}
				}
				break;
			case "]" :
				if($cell) {
					$brackets = 1;
					while($brackets) {
						$i--;
						if($source[$i] == "]") {
							$brackets++;
						} else if($source[$i] == "[") {
							$brackets--;
						}
					}
				}
				break;
		}
	}