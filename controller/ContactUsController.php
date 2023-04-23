<?php
class ContactUsController
{
	public function renderContactUs()
	{
		$_SESSION["page_title"]="Contact Us";
		return new ContactUsView();
	}

	public function renderContactUsConfirm()
	{
		$_SESSION["page_title"]="Contact Us";
		if(isset($_POST["btnContactUsConfirm"]))
		{
			
				$name=$_POST["name"];
				$visitor_email=$_POST["email"];
				$subject=$_POST["subject"];
				$user_message = $_POST["message"];
		
		
		if($_POST["name"] == "" && $_POST["email"]=="" && $_POST["subject"] == "" && $_POST["message"]=="")
		{
			$errors["all_null"]="Please All required fields";
		}		
		else
			{
				if($_POST["name"] == "")
					$errors["name_null"]="Please Enter Name";
				if($_POST["email"]=="")
					$errors["email_null"]="Please Enter Mail";
				else{
					$pattern="/^[\w\-\.]+@([\w\-]+\.)+[a-zA-Z]{2,4}$/";
					if(!preg_match($pattern, $_POST["email"]))
					$errors["invalid_email"]="Invalid Email";
				}
				if($_POST["subject"] == "")
					$errors["subject_null"]="Please Enter Subject";
				if($_POST["message"]=="")
					$errors["message_null"]="Please Enter Message";
					
				$mail = new PHPMailer;
				$mail->isSMTP();// set mailer to use SMTP
				//$mail->SMTPDebug=2;
				$mail->Host = 'smtp.gmail.com';// my host here
				$mail->Port = 587;//Set the SMTP port number - likely to be 25, 465 or 587
				$mail->SMTPSecure = 'tls';//Transport Layer Security
				$mail->SMTPAuth = true;// turn on SMTP authentication
				$mail->Username = "test2phpmail@gmail.com";// a valid email here
				$mail->Password ="php123456";// the password from email
				$mail->addAddress("test2phpmail@gmail.com","Name");
				$mail->setFrom($visitor_email,$name);//Root User Name
				$mail->addReplyTo($visitor_email,$name);
				$mail->msgHTML($user_message);
				
				$mail->FromName = $name;
				$mail->Subject = $subject;
				$mail->Body = $user_message;
				$mail->WordWrap=50;

				if (!$mail->send()) 
				{
					$error = "Mailer Error: " . $mail->ErrorInfo;
					?>
					<script>alert('<?php echo $error ?>');</script>
					<?php
				}
				else 
				{
					echo '<script>alert("Message sent!");</script>';
				}
				
			}	
		if(!empty($errors))
			return new ContactUsView($errors);
			
		if(empty($errors))
		{	
			$contact=new Suggestion();
			$contact->setSuggestionName($name);
			$contact->setSuggestionEmail($visitor_email);
			$contact->setSuggestionSubject($subject);
			$contact->setSuggestionMessage($user_message);
		
			$_SESSION["contact_user"]=$contact;
			return new ContactUsSendView();
		}	
				
		}

	}
		public function renderContactUsSave()
		{
			$suggestiondao=new SuggestionDao();
			$suggestiondao->saveSuggestionInfo();
			$_SESSION["page_title"]="Contact Us";
			return new ContactUsView();
		}
}


		
	/*
	 $car = $_POST['category'];
	 $pick = $_POST['text1'];
	 $drop = $_POST['text2'];
	 $source = $_POST['text3'];
	 $email= $_POST['text4'];

	 $to="$email";
	 $subject="Web Enquiry";
	 $message="....." //your message to user goes here

	 $to_admin = "admin@email.com";
	 $subject_admin = "...."; //subject for mail to admin
	 $message_admin = "....." //your message to admin goes here


	 $headers ="From:$email\n";
	 $headers.="MIME-Version: 1.0\n";
	 $headers.="Content-type: text/html; charset=iso 8859-1";
	 if((mail($to, $subject, $message,$headers) && mail($to_admin, $subject_admin, $message_admin, $headers))
	 {
	 echo "Your Message has been sent." ;
	 }
	 else {
	 echo "";
	 }
	 */
		
		 	
		 	 	
		 	 	 	
		 	 	 	 	
		 	 	 	 	 	
		 	 	 	 	 	 	
		 	 	 	 	 	 	 	
		 	 	 	 	 	 	 	 	
		 	 	 	 	 	 	 	 	 	
	/*$from_name = $_POST['name'];
	 $from_email = $_POST['email'];
	 //$forget_pass="12345";
	 //$message="";
	 //$message.="<br>Dear ".$_POST["name"].",<br>"."Your forget Password is $forget_pass";
	 $subject = $_POST['subject'];
	 $message = $_POST['message'];

	 $to_email = "ttone9579@gmail.com";
	 //$to_password = "NiCk9786*TT#namei";

	 $mail = new PHPMailer;
	 $mail->isSMTP();// set mailer to use SMTP
	 $mail->Host = 'smtp.gmail.com';// my host here
	 $mail->Port = 587;//Set the SMTP port number - likely to be 25, 465 or 587
	 $mail->SMTPSecure = 'tls';//Transport Layer Security
	 $mail->SMTPAuth = true;// turn on SMTP authentication
	 $mail->Username = $to_email;// a valid email here
	 $mail->Password = $to_password;// the password from email
	 $mail->addAddress($from_email);
	 $mail->Subject = $subject;
	 $mail->msgHTML($message);
	 $mail->FromName = "Support Team";//Root User Name*/

	/****************************/
	//Set who the message is to be sent to
	//$mail->addAddress('whoto@example.com', 'John Doe');
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	//$mail->msgHTML(file_get_contents('contents.html'),dirname(__FILE__));
	//Replace the plain text body with one created manually
	//$mail->AltBody = 'This is a plain-text message body';
	/********************************/
	//$mail->addAttachment('./images/8mmF35.jpg');//Attach an image file
	//if (!$mail->send()) {
	//	$error = "Mailer Error: " . $mail->ErrorInfo;
