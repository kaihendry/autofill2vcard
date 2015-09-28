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
FN:${_POST["given-name"]} ${_POST["family-name"]}
N:${_POST["family-name"]};${_POST["given-name"]};;;
EMAIL;INTERNET:${_POST[email]}
TEL;WORK:${_POST[tel]}
ADR;WORK;POSTAL:;;${_POST["street-address"]};${_POST["address-level2"]};${_POST["postal-code"]};${_POST["country-name"]}
ORG:${_POST[organization]}
URL:${_POST[url]}
END:VCARD
EOT;

$fn = $uid . "/" . basename($_POST["organization"]) . ".vcard";
file_put_contents($fn, $vcard);

header("Location: http://" . $_SERVER["HTTP_HOST"] . "/" . urlencode($fn));
