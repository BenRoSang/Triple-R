<?php
class ForgotPassController
{
	public function renderForgotPass()
	{
		$_SESSION["page_title"]="Forget Password";
		return new SupplierForgetPasswordView();
	}
	public function renderForgotPassRequest()
	{
		if(isset($_POST["btnRequestPassSuppplier"]))
		{
			if($_POST["forgot_email"] == "")
			{
				$errors["for_email_null"] = "Please Enter Email";
			}
			else
			{
				$pattern="/^[\w\-\.]+@([\w\-]+\.)+[a-zA-Z]{2,4}$/";
				if(!preg_match($pattern, $_POST["forgot_email"]))
				{
					$errors['invalid_email'] = "Invalid Email";
				}
			}

			if(isset($errors)){
			    return new SupplierForgetPasswordView(@$errors);
			}
			else{
				$userdao = new UserDao();
				$sup = $userdao->getUserBySupEmail($_POST['forgot_email']);

				if(empty($sup))
				{
					$errors['Not_Correct_email'] = "Email does not have in Triple_R";
					return new SupplierForgetPasswordView(@$errors);
				}
				else{
					//Password Generate

					$pass=mt_rand(99999, 999999);

					$from_email = "test2phpmail@gmail.com";
					$from_password = "php123456";

					$to_email = $_POST['forgot_email'];
					$forget_pass="12345";
					$message="";
					$message.="Your Reset password is $pass of your account to login Tripl_R website";
					$subject = "Subject ";

					$mail = new PHPMailer;
					$mail->isSMTP();// set mailer to use SMTP
					$mail->Host = 'smtp.gmail.com';// my host here
					$mail->Port = 587;//Set the SMTP port number - likely to be 25, 465 or 587
					$mail->SMTPSecure = 'tls';//Transport Layer Security
					$mail->SMTPAuth = true;// turn on SMTP authentication
					$mail->Username = $from_email;// a valid email here
					$mail->Password = $from_password;// the password from email
					$mail->addAddress($to_email);
					$mail->Subject = $subject;
					$mail->msgHTML($message);
					$mail->FromName = "Support Team";//Root User Name

					$mail->addAttachment('./images/8mmF35.jpg');//Attach an image file
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

					//Finish Send Email

					//new password save
					$userdao = new UserDao();
					$userdao->updateNewPassword($pass);

					return new SupplierLoginView();

				}
			}
		}
	}
	public function renderForgotPassMer()
	{
		$_SESSION["page_title"]="Forget Password";
	    return new MerchantForgetPasswordView();
	}
	public function renderForgotPassRequestMer()
	{
	    
	    if(isset($_POST["btnRequestPassMer"]))
	    {
	        if($_POST["forgot_email"] == "")
	        {
	            $errors["for_email_null"] = "Please Enter Email";
	        }
	        else
	        {
	            $pattern="/^[\w\-\.]+@([\w\-]+\.)+[a-zA-Z]{2,4}$/";
	            if(!preg_match($pattern, $_POST["forgot_email"]))
	            {
	                $errors['invalid_email'] = "Invalid Email";
	            }
	        }
	        
	        if(isset($errors)){
	            return new MerchantForgetPasswordView(@$errors);
	        }
	        else{
	            $userdao = new UserDao();
	            $sup = $userdao->getUserByMerEmail($_POST['forgot_email']);
	            
	            if(empty($sup))
	            {
	                $errors['Not_Correct_email'] = "Email does not have in Triple_R";
	                return new MerchantForgetPasswordView(@$errors);
	            }
	            else{
	                //Password Generate
	                
	                $pass=mt_rand(99999, 999999);
	                
	                $from_email = "test2phpmail@gmail.com";
	                $from_password = "php123456";
	                
	                $to_email = $_POST['forgot_email'];
	              //  $forget_pass="12345";
	                $message="";
	                $message.="Your Reset password is $pass of your account to login Tripl_R website";
	                $subject = "Subject ";
	                
	                $mail = new PHPMailer;
	                $mail->isSMTP();// set mailer to use SMTP
	                $mail->Host = 'smtp.gmail.com';// my host here
	                $mail->Port = 587;//Set the SMTP port number - likely to be 25, 465 or 587
	                $mail->SMTPSecure = 'tls';//Transport Layer Security
	                $mail->SMTPAuth = true;// turn on SMTP authentication
	                $mail->Username = $from_email;// a valid email here
	                $mail->Password = $from_password;// the password from email
	                $mail->addAddress($to_email);
	                $mail->Subject = $subject;
	                $mail->msgHTML($message);
	                $mail->FromName = "Support Team";//Root User Name
	                
	                $mail->addAttachment('./images/8mmF35.jpg');//Attach an image file
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

					//Finish Send Email

					//new password save
					$userdao = new UserDao();
					$userdao->updateNewPasswordMer($pass);
 					$_SESSION["page_title"]="Forget Password";
					return new MerchantForgetPasswordView();

				}
			}
		}
	
	}
	
}