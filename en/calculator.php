<?php

// Walking Mansion Calculator
// By Per Guth, 2009
// http://perguth.de
// GPL

		// g = Guthaben
		$g = 0;
		
		// s = Spender unter den Studenten (Prozentual)
		if($_GET['ab'] > 60)
			$_GET['ab'] = 60;
		if($_GET['bb'] > 60)
			$_GET['bb'] = 60;
		if($_GET['cb'] > 60)
			$_GET['cb'] = 60;
		if($_GET['aa'] > 100)
			$_GET['aa'] = 100;
		if($_GET['ba'] > 100)
			$_GET['ba'] = 100;
		if($_GET['ca'] > 100)
			$_GET['ca'] = 100;
		$sp = array();
		isset($_GET['aa']) ? $sp[0] = $_GET['aa']/100 : $sp[0] = 0.1;
		if(isset($_GET['ab']))
		{
			$i = $_GET['ab'];
			while($i > 1)
			{
				$sp[] = $_GET['aa']/100;
				$i --;
			}
		} else
		{
			$i = 60;
			while($i > 1)
			{
				$sp[] = 0.1;
				$i --;
			}
		}
		isset($_GET['ba']) ? $sp[] = $_GET['ba']/100 : true;
		if(isset($_GET['bb']) AND isset($_GET['ba']))
		{
			$i = $_GET['bb'];
			while($i > 1)
			{
				$sp[] = $_GET['ba']/100;
				$i --;
			}
		}
		isset($_GET['ca']) ? $sp[] = $_GET['ca']/100 : true;
		if(isset($_GET['cb']) AND isset($_GET['ca']))
		{
			$i = $_GET['cb'];
			while($i > 1)
			{
				$sp[] = $_GET['ca']/100;
				$i --;
			}
		}
		$sp[] = 0;
		
		// pk = Pro Kopf Spende
		if($_GET['pk'] > 50)
			$_GET['pk'] = 50;
		isset($_GET['pk']) ? $pk = $_GET['pk'] : $pk = 5;
		
		// Gesamtzahl der Studenten
		$st = 1974932;
		
		// j = Aktuelles Jahr
		$j = 1;
		
		// k = Kaufpreis
		$k = 200000;
		
		// m = Mieter pro Haus
		$m = 3;
		
		// mp = Mietpreis pro Jahr
		$mp = 12 * 250;
		
		// kp = Instanthaltungskosten pro Kopf pro Monat
		$kp = 10;
		
		// h = Haeuser
		if($_GET['h'] > 10)
			$_GET['h'] = 10;
		isset($_GET['h']) ? $h = $_GET['h'] : $h = 2;
		
		// hm = Haeuser "Mietfrei"
		$hm = 0;
		
		// j = Simulationsdauer in Jahren
		$sd = 60;
		
		// w = Anzahl der Haeuser die ein einzelnes Haus finanzieren soll,
		//     bis es aus der Rechnung genommen wird ("Wachstumsfaktor")
		$w = 2;
		// a = Alterierend: jedes zweite Jahr $w+1
		$a = 0;
		
		// hz = (Temporaerer) Hauskaufzaehler
		$hz = 0;
		// max_ascii = Wieviele Strichlein in der ASCII-Darstellung
		$max_ascii = 10000;
		$max_ascii_2 = 1000;


function kaufe_haus() {
	global $g, $sp, $pk, $st, $k, $j, $k, $m, $mp, $kp, $h, $hm, $sd, $w, $a, $hz, $max_ascii, $max_ascii_2;	
	
	// Kaufe eine Haus
	$h ++;
	$g = $g - $k;
	$hz ++;

	// Sobald X neue Haeuser dazu gekommen sind
	// nimm eines aus der Rechnung (kein Mietgewinn mehr)
	if($a) {
		if($hz >= $w + $j%2) {
			$h --;
			$hm ++;
			
			$hz= 0;
		}
	} else {
		if($hz >= $w) {
			$h --;
			$hm ++;
			
			$hz= 0;
		}
	}
	// Reicht das Geld fuer einen weiteren Kauf?
	// Wenn ja kaufe ein weiteres.
	if($g >= $k) {
		kaufe_haus();
	}
}

function simuliere() {
	global $g, $sp, $pk, $st, $k, $j, $k, $m, $mp, $kp, $h, $hm, $sd, $w, $a, $hz, $max_ascii, $max_ascii_2;
	
	// Simuliere schrittweise die einzelnen Jahre
	for($j = 1; $j <= $sd; $j ++) {
		
		// Nehme Spenden ein
		if($j > count($sp)) 
			$s = $sp[count($sp)-1] * $st * $pk;
		else
			$s = $sp[$j-1] * $st * $pk;
		echo leading_zeros($s, 8) . "&euro;: ";
		
		// 1. Pruefe ob das Geld fuer das Kaufen von Haeusern reicht
		// 2. Sobald ein Haus X weitere finanziert hat entferne
		//    es aus der Rechnung
		if($g >= $k) {
			kaufe_haus();
		}
	
		// Kalkuliere den Gewinn fuer das Jahr
		// Gewinn = Mieter * Jahresmietpreis * Haeuser + Spende - laufende Kosten
		$g = $g + ($m * $mp * $h) + $s - ($h * 50 * 12);
		
		// Ausgabe: "Jahrnummer: 'Ein Strich pro Haus'."
		if($j%10 == 0) {
			echo '<span style="background-color: orange;">';
		} else {
			echo '<span style="background-color: white;">';
		}
			echo leading_zeros($j, 2) . ": ";
			for($i1 = 0; $i1 < $h; $i1 ++) {
				echo "|";
				if($i1 >= $max_ascii) {
					echo "[...]";
					break;
				}
			}
			echo '<span style="background-color: green;">';
				for($i1 = 0; $i1 < $hm; $i1 ++) {
					echo "|";
					if($i1 >= $max_ascii_2) {
						echo "[...]";
						break;
					}
				}
			echo '</span>';
			echo " (" . ($h+$hm) . ": " . ($h+$hm) * $m . ": " . (floor((($h*$m*$mp)/($m*($h+$hm)))/12)+$kp) . ")";
			if($j+1 <= $sd) {
				echo  "<br />";
			}
		echo '</span>';
	}
}

function leading_zeros($value, $places){
// Function written by Marcus L. Griswold (vujsa)
// Can be found at http://www.handyphp.com
// Do not remove this header!
	$leading = '';

    if(is_numeric($value)){
        for($x = 1; $x <= $places; $x++){
            $ceiling = pow(10, $x);
            if($value < $ceiling){
                $zeros = $places - $x;
                for($y = 1; $y <= $zeros; $y++){
                    $leading .= "0";
                }
            $x = $places + 1;
            }
        }
        $output = $leading . $value;
    }
    else{
        $output = $value;
    }
    return $output;
}

echo 'Donations: Year ... (Apartments: lodgers: rent per student)<br /><br /><a name="calculator"></a>';
simuliere();

?>