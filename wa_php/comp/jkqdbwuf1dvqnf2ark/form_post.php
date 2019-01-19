<?php
include('../../../wa_php/waCommon.php');
$reply_to="";
$mail_content="";
$res=true;
$success_message="";
$message_error="";
$form_values_array = array();
$reply_to = '';
$lng = waRetrievePostParameter('lng');
$message_error_recaptcha = waRetrievePostParameter('message_error_recaptcha');
if (PHP_VERSION_ID < 50207) 
{
{
    $message_error='Error -> Minimal PHP version is 5.2.7 ! , your version is '.phpversion();
    echo waFormatResultForm(false,$message_error,'');
    exit;
}
}
array_push($form_values_array, waRetrievePostParameter('field_0'));
array_push($form_values_array, waRetrievePostParameter('firstname_field_1'));
array_push($form_values_array, waRetrievePostParameter('lastname_field_2'));
array_push($form_values_array, waRetrievePostParameter('phone_field_3'));
array_push($form_values_array, waRetrievePostParameter('mail_field_4'));
array_push($form_values_array, waRetrievePostParameter('field_5'));
array_push($form_values_array, waRetrievePostParameter('field_6'));
?>
<?php
$item_label = '';
if ($lng == "fr")
$item_label = ""."\n";
$mail_content .= $item_label;
$mail_content .= "\n";
$item_label = '';
if ($lng == "fr")
$item_label = "Prénom"."\n";
$mail_content .= $item_label;
$mail_content .= $form_values_array[1]."\n";
$mail_content .= "\n";
$item_label = '';
if ($lng == "fr")
$item_label = "Nom"."\n";
$mail_content .= $item_label;
$mail_content .= $form_values_array[2]."\n";
$mail_content .= "\n";
$item_label = '';
if ($lng == "fr")
$item_label = "Téléphone"."\n";
$mail_content .= $item_label;
$mail_content .= $form_values_array[3]."\n";
$mail_content .= "\n";
$item_label = '';
if ($lng == "fr")
$item_label = "E-mail de contact"."\n";
$mail_content .= $item_label;
$mail_content .= $form_values_array[4]."\n";
$mail_content .= "\n";
$reply_to=$form_values_array[4];
$item_label = '';
if ($lng == "fr")
$item_label = "Mode de paiement"."\n";
$mail_content .= $item_label;
$mail_content .= $form_values_array[5]."\n";
$mail_content .= "\n";
$item_label = '';
if ($lng == "fr")
$item_label = "Atelier choisi"."\n";
$mail_content .= $item_label;
$mail_content .= $form_values_array[6]."\n";
$mail_content .= "\n";
$destinataire="versailles@ravinbleu.org";
$res = waSendMail($destinataire,"Le Ravin Bleu Versailles",$mail_content,$reply_to);
$message_error=waGetError();
?>
<?php
if (($res==true) && ($waErrorPhpMailReporting==1)) $message_error="";
echo waFormatResultForm($res,$message_error,'');
?>
