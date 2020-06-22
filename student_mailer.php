<?php

require_once "PHPMailer/class.phpmailer.php";
require_once "PHPMailer/class.smtp.php";
require_once "PHPMailer/PHPMailerAutoload.php";

$sname=$_SESSION['sname'];
$smail=$_SESSION['studentuser'];
$sid=$_SESSION['sid'];
$description=$_SESSION['description'];
$fmail=$_SESSION['fmail'];


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
$mail->SetFrom("alwire2020solutions@gmail.com", "alwire");
$mail->AddReplyTo($fmail);
$mail->AddAddress($fmail);
$mail->Subject = "Reg:ATTENDANCE\n ";
$mail->WordWrap   = 80;


$content ="
<html>
<body>

From:'$smail'<br>
___________________________________________________________________<br>

Respected Sir,
 '$description' ,<br>
	
Thanks,<br>
'$sname'('$sid')<br>
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
header("location:facultycontact.php");
?>
