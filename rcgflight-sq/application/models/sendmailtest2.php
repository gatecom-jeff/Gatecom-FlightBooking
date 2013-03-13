<?php 
 /*$userName = $_POST['string1'];
 $to = $_POST['string2'];
 */
$to  = 'virendra@techesprit.com' . ', '; // note the comma
$to .= 'pratapvirendra2000@gmail.com';
 $userName = "abc";
 $subject = 'Free Video from The Paramount Leadership';
$url = ' <a href="www.paramopuntleadership.com">Get Vieo</a>';
 $message = '
<html>
<head>
  <title>Free Video from The Paramount Leadership</title>
</head>
<body>
  <p>Here are the birthdays upcoming in August! <a href="www.paramopuntleadership.com">Get Free Video</a></p>
  <table>
    <tr>
      <th >Hi, '.$userName.'</th>
    </tr>
    <tr>
      <td>To view your free video from The Paramount leadership, please click the link below:</td>
    </tr>
    <tr>
      <td>'.$url.'</td>
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
	$headers .= 'To: '.$userName.'<'.$to.'>'."\r\n";
	$headers .= 'From: Paramount <paramount@theparamountleadership.com>' . "\r\n";
	$headers .= 'Cc: virendra@techesprit.com' . "\r\n";
	$headers .= 'Bcc: virendra@aarnasoft.com' . "\r\n";
	
	   
   
    
  
  	mail($to, $subject, $message, $headers);
  	echo "An Email has been sent to the address you provided. Please confirm your address to receive your free Video now!.   ";
   
 
?>