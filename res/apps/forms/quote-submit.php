<?php
$sd = new TempFile("{$phppath}apps/forms/contacts.php"); 
extract($GLOBALS,EXTR_REFS);
include_once("$libpath/widgets/mail/SMTPMail.php");
if(!getCheckErr()){
$mail = new SMTPMail();
$mail->setFrom("IT Kruze", $mailUser);
$msgn = "Dont Reply This Email! This Mailbox does not Check. <br>";
$msgn .= "Name:- ".$qname->getValue()."<br>";
$msgn .= "Email:- ".$qemail->getValue()."<br>";
$msgn .= "Phone:- ".$qphone->getValue()."<br>";
$msgn .= "Address:- ".$qadd->getValue()."<br>";
$msgn .= "Comments:- ".$qcomments->getValue()."<br>";
$mail->sendMail('Query',$cmpemail, 'itkruze.com', $msgn);
?>
<div class="heading">Query Communication Result</div>
<div class="content">
<br />
<p class="msg">
"Thank you for your interest in contacting <?php print $cmpname; ?>. We will reach you as soon as possible."
<br/><br />
</p></div>
<?php
}else{
$sd->run();    
$sd->render();    
}
?>
