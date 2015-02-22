<?php
/**
 * Description of SMTPMail
 *
 * @author SARTAJ
 */

/**
 * SMTPMail class
 *
 * This class provide SMTP E-Mail Solution.
 * @author     Sartaj Singh
 * @copyright  2007
 * @version    4.0.0
 */
class SMTPMail {
/** @var String */
public $StartText='Dear Sir/Madam,';
/**
 * Class Constructor
 * @global type $mailServer
 * @global type $mailUser
 * @global type $mailPass
 * @global type $mailPort 
 * @return SMTPMail
 */
public function SMTPMail(){}
/**
 * Set Mail From Address
 * @param String $fromName
 * @param String $fromEmail 
 */
public function setFrom($fromName,$fromEmail){  }
/**
 * Set Welcome Text of mail
 * @param String $val 
 */
public function setWelcomeText($val){ }
/**
 * Send Mail Function
 * @param String $subject
 * @param String $toEmail
 * @param String $toName
 * @param String $Msg
 * @return boolean 
 */
public function sendMail($subject,$toEmail,$toName,$Msg){}

}
?>