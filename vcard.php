<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Autofill2Vcard</title>
<style>
body { font-size: 2em; }
</style>
<head>
<body>
<?php

$date = date("c");

if (! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
	die($_POST["email"] . " is an invalid email address.");
}

if (empty($_POST["organization"])) {
	die("Missing organisation.");
}

$uid = date("Y-m-d") . '/' . $_SERVER["REMOTE_ADDR"];
mkdir($uid, 0777, true);

$vcard = <<<"EOT"
BEGIN:VCARD
VERSION:3.0
REV:${date}
FN;CHARSET=UTF-8:${_POST[name]}
EMAIL;INTERNET:${_POST[email]}
TEL;WORK:${_POST[tel]}
ADR;WORK;POSTAL:;;${_POST["street-address"]};${_POST["address-level2"]};${_POST["postal-code"]};${_POST["country-name"]}
ORG:${_POST[organization]}
URL:${_POST[url]}
END:VCARD
EOT;

$fn = $uid . "/" . $_POST["organization"] . ".vcard";
file_put_contents($fn, $vcard);

echo "<pre>" . htmlspecialchars($vcard) . "</pre>";

echo "<p><a href=\"http://" . $_SERVER["HTTP_HOST"] . "/" . $fn . "\">Vcard download</a></p>";
?>
</body>
</html>
