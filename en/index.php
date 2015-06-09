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
<p>We want to establish a non-profit association which buys apartments and rents them to students the following way:</p>
<ul>
	<li>We will take the regular rent for a apartment until we have collected enough money to buy two new apartments.</li>
	<li>As soon as one apartment has finanzed two others the rent for the first apartment will be lowered to just meet the maintenance costs.</li>
	<li>This rent lowering will be offset against all other rents so that every rent payer will pay equally less.</li>
	<li>If a student wants to rent one of our apartments he has to participate in our lottery which guarantees every student the same chances.</li>
</ul>
<p>In the long run more and more students will get apartments which over time get cheaper and cheaper.</p>

<p><a href="informationen.php">Further information, Impressum.</a></p>

<h2>When will students profit of this idea?</h2>

<p>Due to the high aparment prices it will take quite a while for this idea to actually change something for the regular student. Investing into this idea thus means to invest into the future of the educational situation.</p>

<p>But one should not forget that this idea will gain more and more influence even if no one donates anymore. Once started it will grow and influence the situation of future students positively.</p>

<p>In order to illustrate the growth of this idea we programmed a litte script which can be seen at the end of the page.</p>



<h2>Financing</h2>
<ul>
	<li><i>This projects speed of success depends on <a href="spenden.php">your donations</a>!</i></li>
	<li>If only 10% of all german students donate 5 Euros every year and we start out with two apartments encompassing 3 students each we will get a growth as shown below.</li>
</ul>



<h2>Recommend</h2>
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
			<h2>Calculator</h2>
			<p>Every bar represents a apartment encompassing three students. The bars with green background represent the apartments which mathematically just take the minimum rent.
			We start out from the assumption that a new appartment (encompassing 3 students) costs 200 000 Euros and the running charges are 50 Euros per apartment per month.</p>
			<ul>
				<li><b>Apartments in the beginning:</b><br />
				<input type="text" size="2" name="h" value="<?= isset($_GET['h']) ? $_GET['h'] : 2 ?>" /> <small><i>(max. 10)</i></small></li>
				
				<li><b>Proportion of students who donate:</b><br />
				1. <input type="text" size="2" value="<?= isset($_GET['aa']) ? $_GET['aa'] : 10 ?>" name="aa" />% for <input type="text" size="2" name="ab" value="<?= isset($_GET['ab']) ? $_GET['ab'] : '60' ?>" /> years<br />
				2. <input type="text" size="2" value="<?= isset($_GET['ba']) ? $_GET['ba'] : '' ?>" name="ba" />% for <input type="text" size="2" name="bb" value="<?= isset($_GET['bb']) ? $_GET['bb'] : '' ?>" /> years<br />
				3. <input type="text" size="2" value="<?= isset($_GET['ca']) ? $_GET['ca'] : '' ?>" name="ca" />% for <input type="text" size="2" name="cb" value="<?= isset($_GET['cb']) ? $_GET['cb'] : '' ?>" /> years<br />
				</li>
				
				<li><b>Amount of donation per student per year:</b><br />
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