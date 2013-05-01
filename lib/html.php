<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Panel de Control RPi</title>
	<? foreach($GLOBALS['JAVASCRIPT'] as $javascript):?>
      <script src="<?=$javascript?>"></script>
    <? endforeach?>
    <? foreach($GLOBALS['STYLE'] as $css):?>
      <link href="<?=$css?>" rel="stylesheet" type="text/css">
    <? endforeach?>

</head>
<body>
	<div id="wrap">
		<div id="header">
			<div id="logo"><a href="/home">ChronosRPi</a></div>
			<div id="user"></div>
		</div>
		<div id="menu">
			<nav>
            <? foreach(array_unique($menu) as $l):?>
            	<? if($l != @$menu[$sel] || $sel == "home"):?>
            		<li class="parent"><span><?=$l?></span>
            	<? else:?>
					<li class="parent block"><span><?=$l?></span>
            	<? endif?>
				<ul>
				<? foreach($modname as $a => $s):?>
					<? if($menu[$a] == $l):?>
						<? if($a != $sel):?>
							<li class='sub'><a href='<?=$a?>'><?=$modname[$a]?></a></li>
						<? else:?>
							<li class='sub'><a class="sel" href='<?=$a?>'><?=$modname[$a]?></a></li>
						<? endif?>
					<? endif?>
				<? endforeach?>
				</ul></li>
			<? endforeach?>
			</nav>
		</div>
		<div id="content"><?=$content?></div>
	</div>
</body>
</html>
