<?php
if(isset($_GET))
{
	foreach($_GET as $key => $value)
	{
		$_GET[$key] = strip_tags($value);
	}
}
?>
<html>
<head>
	<title>Walking Mansion Projekt</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
</head>
<body>
	<div style="position: absolute; left: 450px; top: 10px;">
		<a href="/walkingmansion/en/">English</a>
		<a href="/walkingmansion/">Deutsch</a>
	</div>
	<div id="head">
		<div align="center"><h1>Walking Mansion</h1></div>
	</div>

	<div id="content">
<p>Wir wollen einen gemeinnützigen Verein gründen, der nach folgendem Prinzip Häuser/Wohnungen kauft und an Studenten und Studentinnen vermietet:</p>
<ul>
	<li>In jeder Wohnung wird so lange die örtlich übliche Miete verlangt, 
bis so viel Geld angespart wurde, dass zwei weitere Wohnungen gekauft 
werden können.</li>
	<li>Sobald eine Wohnung zwei weitere finanziert hat, wird rechnerisch die 
Miete dieser Wohnung auf das Minimum, das zur Instandhaltung notwendig 
ist gesenkt.</li>
	<li>Diese rechnerische Mietsenkung wird mit den Mieten aller anderen Wohnungen
verrechnet, sodass die Miete für alle fällt.</li>
	<li>Die Räume werden per Los unter den sich bewerbenden Studenten verteilt. Die glücklichen 
	Studenten und Studentinnen dürfen dann bis zum Ende der Regelstudienzeit ihrer jeweiligen 
	Wohnung bleiben.</li>
</ul>
<p>Somit werden nach und nach immer mehr Studenten und Studentinnen eine immer 
günstiger werdende Wohngelegenheit erhalten - das ist das eigentliche Ziel des Walking Mansion Projekts.</p>

<p><a href="informationen.php">Weitere Informationen + Impressum/Datenschutz.</a></p>

<h2>Wann können Studenten und Studentinnen davon profitieren?</h2>

<p>Durch die hohen Wohnungspreise muss leider auf einen sehr langen Zeitraum geplant werden.
Es handelt sich somit um ein Projekt, bei dem du, sofern du es für unterstützenswert
hälst, in die Zukunft der akademischen Bildung in Deutschland investierst.</p>

<p>Man sollte aber bedenken, dass dieses Projekt selbst dann weiter wächst, wenn kein
Student mehr spendet. Also einmal in Gang, kommt dieses Projekt allen zukünftigen 
Studenten zugute - auch wenn es eine Weile dauert.</p>

<p>Zur Veranschaulichung des Wachstums dient ein kleines Skript am Ende Webseite.</p>



<h2>Finanzierung</h2>
<ul>
	<li><i>Dieses Projekt ist auf <a href="spenden.php">deine Spende</a> angewiesen!</i></li>
	<li>Wenn nur 10% der Studenten jedes Jahr, über ihr Studium hinweg, 5 Euro spenden 
	und wir mit 2 Wohnungen à 3 Studenten starten, dann erhalten wir ein Wachstum, wie du es gerade unten siehst.</li>
</ul>



<h2>Weiterempfehlen</h2>
<p>
<ul>
	<li><!-- AddThis Button BEGIN -->
<script type="text/javascript">var addthis_pub="pguth";</script>
<a href="http://www.addthis.com/bookmark.php?v=20" onmouseover="return addthis_open(this, '', '[URL]', '[TITLE]')" onmouseout="addthis_close()" onclick="return addthis_sendto()"><img src="http://s7.addthis.com/static/btn/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a><script type="text/javascript" src="http://s7.addthis.com/js/200/addthis_widget.js"></script><!-- AddThis Button END --></li>
</ul>

</p>
<!-- 
<p><i>Noch nicht funktionsfähig.</i></p>
<p>
<ul>
	<li><b>Empfänger:</b><br />
	1. <input type="text" /> 2. <input type="text" /><br />
	3. <input type="text" /> 4. <input type="text" /></li>
	<li><b>Text:</b><br />
	<textarea>Standard Text</textarea></li>
	<li><input type="submit" value="Abschicken!" /></li>
</ul>
</p> -->


	</div>
	<div id="calculator">
		<div id="input_field" align="center">
		<form method="GET" action="index.php#calc">
			<h2>Kalkulator</h2>
			<p>Jeder Strich steht für eine Wohnung mit 3 Studenten. Die grün
			hinterlegten Striche stehen für Wohungen, die rechnerisch nur noch die Mindestmiete zahlen. Es wird davon ausgegangen, dass der Kauf einer neuen 3 Personenwohnung 200.000 Euro kostet und die laufenden Kosten sich auf 50 Euro pro Wohnung pro Monat belaufen.</p>
			<ul>
				<li><b>Wohnungen am Anfang:</b><br />
				<input type="text" size="2" name="h" value="<?= isset($_GET['h']) ? $_GET['h'] : 2 ?>" /> <small><i>(max. 10)</i></small></li>
				
				<li><b>Anteil der Studenten, die spenden:</b><br />
				1. <input type="text" size="2" value="<?= isset($_GET['aa']) ? $_GET['aa'] : 10 ?>" name="aa" />% f&uuml;r <input type="text" size="2" name="ab" value="<?= isset($_GET['ab']) ? $_GET['ab'] : '60' ?>" /> Jahre<br />
				2. <input type="text" size="2" value="<?= isset($_GET['ba']) ? $_GET['ba'] : '' ?>" name="ba" />% f&uuml;r <input type="text" size="2" name="bb" value="<?= isset($_GET['bb']) ? $_GET['bb'] : '' ?>" /> Jahre<br />
				3. <input type="text" size="2" value="<?= isset($_GET['ca']) ? $_GET['ca'] : '' ?>" name="ca" />% f&uuml;r <input type="text" size="2" name="cb" value="<?= isset($_GET['cb']) ? $_GET['cb'] : '' ?>" /> Jahre<br />
				</li>
				
				<li><b>Spendensumme pro Student pro Jahr:</b><br />
				<input type="text" size="2" value="<?= isset($_GET['pk']) ? $_GET['pk'] : 5 ?>" name="pk" /> &euro; <small><i>(max. 50)</i></small></li>
				
				<li><input type="submit" value="Darstellen!" /></li>
			</ul>
		</form>
		</div>
		<br />
		<a name="calc"></a>
		<pre><?php
		include("calculator.php");
		?></pre>
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