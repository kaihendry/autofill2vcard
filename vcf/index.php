<?php

header("Content-Type:text/plain");

print_r($_POST);

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__ . '/vendor/jeroendesloovere/vcard/src/VCard.php';
use JeroenDesloovere\VCard\VCard;

// define vcard
$vcard = new VCard();

$vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);

$vcard->addCompany($_POST['organization']);
$vcard->addEmail($_POST['email']);
$vcard->addPhoneNumber($_POST['tel'], 'WORK');
$vcard->addAddress(null, null, $_POST['address-line1'], $_POST['address-line2'], null, $_POST['postal-code'], $_POST['country-name']);
$vcard->addURL($_POST['url']);

// return vcard as a download
$vcf = $vcard->getOutput();
echo $vcf;
echo file_put_contents("foo.vcf", $vcf);

?>
