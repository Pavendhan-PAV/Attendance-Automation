<?php

require_once "PHPMailer/class.phpmailer.php";
require_once "PHPMailer/class.smtp.php";
require_once "PHPMailer/PHPMailerAutoload.php";

$sname=$_SESSION['sname'];
$sid=$_SESSION['sid'];
$smail=$_SESSION['smail'];
$pname=$_SESSION['pname'];
$pmail=$_SESSION['pmail'];
$fmail=$_SESSION['fmail'];
$description=$_SESSION['description'];






$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "tsl";
$mail->Port     = 587;  
$mail->Username = "alwire2020solutions@gmail.com";
$mail->Password = "veetlairukom";
$mail->Host     = "smtp.gmail.com";
$mail->Mailer   = "smtp";
$mail->SetFrom("alwire2020solutions@gmail.com");
$mail->AddReplyTo($fmail);
$mail->AddAddress($fmail);

$mail->Subject = "REG:Student '$sname'('sid')";
$mail->WordWrap   = 80;

$content ="
<html>
<body>
___________________________________________________________________<br>

Respected Sir ,<br>
	'$description'<br>


Thanks,<br>
'$pname'(Email:'$pmail')<br>
____________________________________________________________________<br>

</body>
</html>"  ;


 $mail->MsgHTML($content);

$mail->IsHTML(true);
if(!$mail->Send()) 
{$_SESSION['MAILERROR']="Email Not sent.Please Try Again!";
}
else 
{$_SESSION['MAILERROR']="Email sent.";
}
header("location:fidchooser.php");
?>
