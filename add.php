<head>
<?php
	include "settings.php";
	echo "<title>Добавить пост: ".$bname." - ".$blogo."</title>";?>
<link rel="stylesheet" type="text/css" href="style.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<table><tr><td>

<?php
		echo '<h1><a href=".." class="logo">'.$blogo.'</a></h1>';
		echo "<h3>Добавить к: ".$bname."</h3>"; ?>

<a href="index.php">Вернутся назад</a><br><br>

<form action="add.php" method="POST">
	<p>Заголовок:</p>
	<input class="form-outset" type="text" placeholder="" name="title" <?php echo 'minlength="'.$bposttmin.'" maxlength="'.$bposttmax.'"'; ?> required><br><br>
	<p>Сообщение:</p>
	<button class="form-outset" id="bbc_b" type="button">Жирный</button>
	<button class="form-outset" id="bbc_i" type="button">Наклон</button>
	<button class="form-outset" id="bbc_u" type="button">Подчеркивание</button>
	<button class="form-outset" id="bbc_s" type="button">Зачеркивание</button>
	<button class="form-outset" id="bbc_url" type="button">Ссылка</button>
	<button class="form-outset" id="bbc_img" type="button">Картинка</button><br>
	<textarea class="form-outset" placeholder="" name="message" <?php echo 'minlength="'.$bpostmmin.'" maxlength="'.$bpostmmax.'"'; ?> required autocomplete="off" id="txtrea"></textarea><br>
	<input class="form-outset" type="submit" name="send">
</form>
</td></tr></table>

<script>
	var textarea = document.getElementById("txtrea");
	var bbc_b = document.getElementById("bbc_b");
	var bbc_i = document.getElementById("bbc_i");
	var bbc_u = document.getElementById("bbc_u");
	var bbc_s = document.getElementById("bbc_s");
	var bbc_url = document.getElementById("bbc_url");
	var bbc_img = document.getElementById("bbc_img");
	
	bbc_b.addEventListener("click", function() {
		textarea.value = textarea.value + "[b][/b]";
	});
	bbc_i.addEventListener("click", function() {
		textarea.value = textarea.value + "[i][/i]";
	});
	bbc_u.addEventListener("click", function() {
		textarea.value = textarea.value + "[u][/u]";
	});
	bbc_s.addEventListener("click", function() {
		textarea.value = textarea.value + "[s][/s]";
	});
	bbc_url .addEventListener("click", function() {
		textarea.value = textarea.value + "[url][/url]";
	});
	bbc_img.addEventListener("click", function() {
		textarea.value = textarea.value + "[img][/img]";
	});
</script>

<?php
require_once("BBCode.php");
$bbcode = new BBCode;
if (isset($_POST["send"])) {
	$message = $bbcode->toHTML(htmlentities($_POST["message"]));
	$text = "<b class=\"msg_title\">" . htmlentities($_POST["title"]) . "</b> Аноним " . date("d/m/y D H:i:s") . ":<br><p class=\"message_text\">" . $message . "</p><br>";
	$text .= file_get_contents("index.txt");
	file_put_contents("index.txt", "\xEF\xBB\xBF".  $text );
	header("Location: index.php");
} else {
	exit;
}
?>
