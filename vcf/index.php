<?php
header("Content-Type:text/plain");
echo phpversion() . "\n";

$date = date("c");

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

echo $vcard;
?>
