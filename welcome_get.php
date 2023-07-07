<?php 

echo $_GET["name"]; 
 echo $_GET["email"]; 

	//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
              use PHPMailer\PHPMailer\PHPMailer;
              use PHPMailer\PHPMailer\SMTP;
              use PHPMailer\PHPMailer\Exception;


	$name=$_POST['name'];
	$email=$_POST['email'];
	// $mobile=$_POST['mobile'];
	// $Pickup_Date=$_POST['Pickup_Date'];
	// $Pickup_Time=$_POST['Pickup_Time'];
	// $vehicle=$_POST['vehicle'];
	

	//Load Composer's autoloader
	require 'PHPMailer/Exception.php';
	require 'PHPMailer/PHPMailer.php';
	require 'PHPMailer/SMTP.php';


//Create an instance; passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
    //Server settings
  //  $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'kunalmore875@gmail.com';                     //SMTP username
    $mail->Password   = 'uhvtxagylwlujboo';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('kunalmore875@gmail.com', 'Mailer');
    $mail->addAddress('kunalmore875@gmail.com', 'Joe User');     //Add a recipient
    

    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Mail From Propcare Rental';
    $mail->Body    = "Name - $name<br>
   $email";


    $mail->send();
  
    echo '<script>window.location="t1.php"</script>';
  } catch (Exception $e) {
  	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }



?>