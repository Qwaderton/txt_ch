<?php
include "settings.php";?>

<head>
<?php
	echo "<title>".$blogo."</title>";?>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<table><tr>
	<td>
<?php
		echo '<h1><a href=".." class="logo">'.$blogo.'</a></h1>';
		echo '<h2 class="bname">'.$bname.'</h2>';
		echo '<p class="bdesc">'.$bdesc.'</p>'; ?>
  <a href="add.php">Добавить пост</a>
		<hr>
	
<?php
$fh = fopen("index.txt", "r");
$rf = fread($fh, filesize("index.txt"));
echo $rf;
fclose($fh);
?>
</td></tr></table>

