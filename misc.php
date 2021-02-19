<?php
if (!session_id())
    session_start();

function verifyFormToken($form)
{
    // check if a session is started and a token is transmitted, if not return an error
    if (!isset($_SESSION[$form . '_token'])) {
        return false;
    }

    // check if the form is sent with token in it
    if (!isset($_POST['token'])) {
        return false;
    }

    // compare the tokens against each other if they are still the same
    if ($_SESSION[$form . '_token'] !== $_POST['token']) {
        return false;
    }

    return true;
}

function writeLog($where)
{
    $ip = $_SERVER["REMOTE_ADDR"]; // Get the IP from superglobal
    $host = gethostbyaddr($ip);    // Try to locate the host of the attack
    $date = date("d M Y");

    // create a logging message with php heredoc syntax
    $logging = <<<LOG
		\n
		<< Start of Message >>
		There was a hacking attempt on your form. \n 
		Date of Attack: {$date}
		IP-Adress: {$ip} \n
		Host of Attacker: {$host}
		Point of Attack: {$where}
		<< End of Message >>
LOG;

    // open log file
    if ($handle = fopen('hacklog.log', 'a')) {

        fputs($handle, $logging);  // write the Data to file
        fclose($handle);           // close the file

    }

    $logging .= "\r\n";
    $to = 'norm.bosse0@gmail.com';
    $subject = 'HACK ATTEMPT on Slice O Country';
    $header = 'From: norm.bosse0@gmail.com' . "\r\n";
    if (mail($to, $subject, $logging, $header)) {
        echo "Sent notice to admin.";
    }
}

if (verifyFormToken('form1')) 
{
    // ... more security testing
    // if pass, send email

    if (isset($_POST['email'])) {

        // EDIT THE 2 LINES BELOW AS REQUIRED
        // $email_to = "norm.bosse0@gmail.com";
        // $email_to = "viewscaper@gmail.com";
        // $email_to = "bosse.ann@gmail.com";
        $email_to = "sliceocountry@gmail.com";
        $email_subject = "Slice O Country contact form message";


        function died($error)
        {
            // your error code can go here
            echo "I am very sorry, but there were error(s) found with the form you submitted. ";
            echo "These errors appear below.<br /><br />";
            echo $error . "<br /><br />";
            echo "Please go back and fix these errors.<br /><br />";
            die();
        }

        // validation expected data exists
        if (
            !isset($_POST['name']) ||
            !isset($_POST['email']) ||
            !isset($_POST['message'])
        ) {
            died('I am sorry, but there appears to be a problem with the form you submitted.');
        }

        $name = $_POST['name']; // required
        $email_from = $_POST['email']; // required
        $message = $_POST['message']; // required

        $error_message = "";
        $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
        if (!preg_match($email_exp, $email_from)) {
            $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
        }
        // $string_exp = "/^[A-Za-z .'-]+$/";
        // if (!preg_match($string_exp, $first_name)) {
        //     $error_message .= 'The First Name you entered does not appear to be valid.<br />';
        // }
        // if (!preg_match($string_exp, $last_name)) {
        //     $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
        // }
        if (strlen($message) < 2) {
            $error_message .= 'The message you entered do not appear to be valid.<br />';
        }
        if (strlen($error_message) > 0) {
            died($error_message);
        }

        function clean_string($string)
        {
            $bad = array("content-type", "bcc:", "to:", "cc:", "href");
            return str_replace($bad, "", $string);
        }

        $email_message = "This message is from ";
        $email_message .= clean_string($name) . "\n\n";
        // $email_message .= "Email: " . clean_string($email_from) . "\n";
        $email_message .= clean_string($message) . "\n\n";

        // create email headers
        $headers = 'From: ' . $email_from . "\r\n" .
            'Reply-To: ' . $email_from . "\r\n" .
            'Bcc: norm.bosse0@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($email_to, $email_subject, $email_message, $headers);

        ?>

        <!-- include your own success html here -->
    
        <script type="text/javascript">
            window.location = "thankyou.php";
        </script>
<?php    
    }
} else {
    // echo "Hack-Attempt detected. Got ya!.<br>";
    writeLog('Formtoken');
}
?>
