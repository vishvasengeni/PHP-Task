<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';
session_start();
include 'sql.php';
$sendAfter = (5)*(60); 
$now = date('Y-m-d H:i:s');
$sendMail = false;
 
if(!isset($_SESSION['sent_time']))
{
     $sendMail = true;
     $_SESSION['sent_time'] = $now;
}
else
{	
    $diff = strtotime($now) - strtotime($_SESSION['sent_time']);
    if($diff >= $sendAfter)
    {
        $sendMail = true;
        $_SESSION['sent_time'] = $now;
     }
 }
 
 if($sendMail)
 {
    $mail = new PHPMailer(true);
    $sql = "SELECT * FROM user WHERE email_status = 0 LIMIT 1";
	$result = mysqli_query($conn,$sql);
    $num_rows = mysqli_num_rows($result);
    if($num_rows > 0)
    {
        $row = mysqli_fetch_row($result);
        
        try {
            $mail->isSMTP();                                     
            $mail->Host = 'smtppro.zoho.in';
            $mail->SMTPAuth = true;                             
            $mail->Username = 'hr@lidertechnology.in';      //p.murugan103@gmail.com
            $mail->Password = 'Lider@123';              //ufdivrvpjxekguts       
                            
            $mail->SMTPSecure = 'ssl';                           
            $mail->Port = 465; 
            $mail->setFrom('hr@lidertechnology.in','iLider');     //p.murugan103@gmail.com
            
            $mail->addAddress($row[3]);
            $mail->isHTML(true);                                  
            $mail->Subject = 'Support Notification';
            $mail->Body    = '<html><body>
            <p>Register Successfully</p>
            <table>
                <tr><td>First Name</td>'.$row[1].'<td></td></tr>
                <tr><td>Last Name</td>'.$row[2].'<td></td></tr>
                <tr><td>Email</td>'.$row[3].'<td></td></tr>
                <tr><td>Mobile</td>'.$row[4].'<td></td></tr>
                <tr><td>Country</td>'.$row[5].'<td></td></tr>
                <tr><td>Website</td>'.$row[6].'<td></td></tr>
            </table>
            <p><button>Click Here to Home</button></p>
            </body>
            </html>';

            $mail->send();
            
            $sql = "UPDATE user SET email_status = 1 WHERE id = ".$row[0];
            $result = mysqli_query($conn,$sql);
        echo 'Message has been sent';
        } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
        }
    }
 }else{
    echo "Not Yet";
 }