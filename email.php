<?php
$dateipfad = "email_list_416.txt";

				$tmp = fopen($dateipfad,"r");
				
				if( ! $tmp )
				{
					$unlesbar = true;
				}
				else
				{
					$data = unserialize(fread($tmp,filesize($dateipfad)));
					if(strlen($_POST["email"]) < 60)
						$data[] = strip_tags($_POST["email"]);
					fclose($tmp);
					
					$tmp = fopen($dateipfad,"w");
					if( $tmp )
					{
						fwrite($tmp,serialize($data));
						fclose($tmp);
					}
				}
				


?><html>
<head>
	<title>Walking Mansion Projekt - Email</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
</head>
<body>
	<div id="head">
		<div align="center"><h1>Walking Mansion - Spenden</h1></div>
	</div>

	<div id="content">
<p><i>Danke! Du wirst informiert, sobald Spendenmöglichkeit besteht.</i></p>
<p><a href="index.php">Zurück zur Hauptseite</a></p>

	</div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-2423817-6");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>