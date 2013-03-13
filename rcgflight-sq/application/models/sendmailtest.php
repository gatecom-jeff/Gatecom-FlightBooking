<?php
// multiple recipients
$to  = 'virendra@techesprit.com' ; // note the comma


$subject = 'Free Video from The Paramount Leadership';

$userName = "virendra";

 $message = '
<html>
<head>
  <title>Free Video from The Paramount Leadership</title>
</head>
<body>
  
  <table>
    <tr>
      <td >Hi, <strong>'.$userName.'</strong></td>
    </tr>
    <tr>
      <td>To view your free video from The Paramount leadership, please click the link below:</td>
    </tr>
    <tr>
      <td><a href="http://www.paramopuntleadership.com" target="_blank">Get Free Video</a></td>
    </tr>
	 <tr>
      <td> Enjoy your free video!</td>
    </tr>
	 <tr>
      <td>The Paramount Leadership Team</td>
    </tr>
  </table>
</body>
</html>
';
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
//$headers .= 'To: '.$userName.'<'.$to.'>' . "\r\n";
$headers .= 'From: Paramount <paramount@support.com>' . "\r\n";
//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);
?>