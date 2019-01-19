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
array_push($form_values_array, waRetrievePostParameter('mail_field_0'));
$form_values_map['mail_field_0'] = waRetrievePostParameter('mail_field_0');
$form_mail_reply_to=waRetrievePostParameter('mail_field_0');
array_push($form_values_array, waRetrievePostParameter('lastname_field_1'));
$form_values_map['lastname_field_1'] = waRetrievePostParameter('lastname_field_1');
array_push($form_values_array, waRetrievePostParameter('field_2'));
$form_values_map['field_2'] = waRetrievePostParameter('field_2');
array_push($form_values_array, waRetrievePostParameter('field_3'));
$form_values_map['field_3'] = waRetrievePostParameter('field_3');
array_push($form_values_array, waRetrievePostParameter('field_4'));
$form_values_map['field_4'] = waRetrievePostParameter('field_4');
?>
<?php
if ($lng == "fr")
$mail_content .= "E-mail"."\n";
$mail_content .= $form_values_array[0]."\n";
$mail_content .= "\n";
$reply_to=$form_values_array[0];
if ($lng == "fr")
$mail_content .= "Nom"."\n";
$mail_content .= $form_values_array[1]."\n";
$mail_content .= "\n";
if ($lng == "fr")
$mail_content .= "Mes choix"."\n";
$mail_content .= $form_values_array[2]."\n";
$mail_content .= "\n";
$mail_content .= $form_values_array[3]."\n";
$mail_content .= "\n";
$mail_content .= $form_values_array[4]."\n";
$mail_content .= "\n";
$lng=waRetrievePostParameter('lng');
$destinataire="";
if ($lng == "fr")
$success_message="";
$res = waSendMail($destinataire,"Mail sent by WARC",$mail_content,$reply_to);
$message_error=waGetError();
?>
<?php
if (($res==true) && ($waErrorPhpMailReporting==1)) $message_error="";
echo waFormatResultForm($res,$message_error,$success_message);
?>
