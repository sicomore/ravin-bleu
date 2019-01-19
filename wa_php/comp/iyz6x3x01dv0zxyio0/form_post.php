<?php
include('../../../wa_php/waCommon.php');
$reply_to="";
$mail_content="";
$res=true;
$success_message="";
$message_error="";
$form_values_array = array();
$form_values_map = array();
$form_mail_reply_to = '';
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
$form_values_map['field_0'] = waRetrievePostParameter('field_0');
array_push($form_values_array, waRetrievePostParameter('firstname_field_1'));
$form_values_map['firstname_field_1'] = waRetrievePostParameter('firstname_field_1');
array_push($form_values_array, waRetrievePostParameter('field_2'));
$form_values_map['field_2'] = waRetrievePostParameter('field_2');
array_push($form_values_array, waRetrievePostParameter('field_3'));
$form_values_map['field_3'] = waRetrievePostParameter('field_3');
array_push($form_values_array, waRetrievePostParameter('field_4'));
$form_values_map['field_4'] = waRetrievePostParameter('field_4');
array_push($form_values_array, waRetrievePostParameter('field_5'));
$form_values_map['field_5'] = waRetrievePostParameter('field_5');
array_push($form_values_array, waRetrievePostParameter('field_6'));
$form_values_map['field_6'] = waRetrievePostParameter('field_6');
?>
<?php
$item_label = '';
if ($lng == "fr")
$item_label = "BULLETIN DINSCRIPTION"."\n";
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
$item_label = "E-mail"."\n";
$mail_content .= $item_label;
$mail_content .= $form_values_array[3]."\n";
$mail_content .= "\n";
$item_label = '';
if ($lng == "fr")
$item_label = "Massage"."\n";
$mail_content .= $item_label;
$mail_content .= $form_values_array[4]."\n";
$mail_content .= "\n";
$item_label = '';
if ($lng == "fr")
$item_label = "Arrivée"."\n";
$mail_content .= $item_label;
$mail_content .= $form_values_array[5]."\n";
$mail_content .= "\n";
$item_label = '';
if ($lng == "fr")
$item_label = "Remarques "."\n";
$mail_content .= $item_label;
$mail_content .= $form_values_array[6]."\n";
$mail_content .= "\n";
$destinataire="culturessingulieres@ravinbleu.org";
if ($lng == "fr")
$success_message="Formulaire envoyé !";
$res = waSendMail($destinataire,"INSCRIPTION STAGE 22 AVRIL",$mail_content,$reply_to);
$message_error=waGetError();
?>
<?php
if (($res==true) && ($waErrorPhpMailReporting==1)) $message_error="";
echo waFormatResultForm($res,$message_error,$success_message);
?>
