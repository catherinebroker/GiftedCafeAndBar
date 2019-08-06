<?php
// define variables and set to empty values
$to = "catherinemariebroker@gmail.com";
$type = $name = $tel = $email = $mailCheck = $message = "";
$typeErr = $nameErr = $emailErr = $mailcheckErr = $messageErr = $messageStatus = $subject = "";

//Protect input values from malicious code
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $type = $_POST["type"];
  $name = test_input($_POST["name"]);
  $tel = test_input($_POST["tel"]);
  $email = test_input($_POST["email"]);
  $mailCheck = test_input($_POST["mailCheck"]);
  $message = test_input($_POST["message"]);
	$confirmed = $_POST["confirmed"];
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//Error messages
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["type"])) {
    $typeErr = "* Type is required.";
  } else {
    $type = test_input($_POST["type"]);
  }

  if (empty($_POST["name"])) {
    $nameErr = "* Name is required.";
  } else {
    $name = test_input($_POST["name"]);
  }

  $tel = test_input($_POST["tel"]);

  if (empty($_POST["email"])) {
    $emailErr = "* An email address is required.";
  } else if ($email != $mailCheck){
    $emailErr = "Email addresses must match.";
  } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // check if e-mail address is well-formed
    $emailErr = "* Invalid email format";
  } else {
    $email = test_input($_POST["email"]);
    }
  }

  if (empty($_POST["message"])) {
    $messageErr = "* A message is required.";
  } else {
    $message = test_input($_POST["message"]);
  }

	$page_flag = 0;


  // Check input values and send if everything is cool.
  if (empty($name) || empty($email) || !filter_var($email) || empty($subject) || empty($message)) {
    $messageStatus = "Please check that every box has been completed, the email addresses match, and that the email address entered is valid.";
  } else {
    $page_flag = 1;
  }

	// mail send
	if($page_flag == '1' && $confirmed == 'true') {
		mail($to, 'test', $message, $email);
		$page_flag = 2;
	}
 ?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
    <title>GFTD CAFE & BAR: Access</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav_style.css">
    <link rel="stylesheet" href="css/access.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
  </head>
  <body>
      <?php include('navigation.html')?>

      <div class="accesswrapper">


        <div class="map">
					<div class="header">
            <h1>Access</h1>
          </div>
          <img src="img/map.png" alt="">
        </div>

        <div class="contactDetails">
          <table>
            <tr>
              <td><p><i class="fas fa-map-marker-alt"></i></p></td>
              <td><p>〒162-0044 東京都新宿区喜久井町２０ニシカワビルB1F</p></td>
            </tr>
            <tr>
              <td><p><i class="far fa-clock"></i></p></td>
              <td><p>DAILY : 11 am - 11 pm</p></td>
            </tr>
            <tr>
              <td><p><i class="fas fa-phone"></i></p></td>
              <td><p>TEL : <a href="tel:03-5458-5700">03-5458-5700</a></p></td>
            </tr>
            <tr>
              <td><p><i class="fas fa-fax"></i></p></td>
              <td><p>FAX : 03-5428-1320</p></td>
            </tr>
          </table>
        </div>

        <div class="contactForm">
          <div class="header">
            <h1>Contact</h1>
          </div>
					<?php if($page_flag == 0): ?>
						<?php include('contact-form.php'); ?>
					<?php elseif ($page_flag == 1): ?>
						<?php include('confirm.php'); ?>
					<?php else: ?>
						<p>有難う御座います!</p>
					<?php endif ?>
        </div>
    </div>

    <?php include('footer.html')?>

		<script type="text/javascript">
      function submitForm() {

        alert("<?= $messageStatus?><?= $nameErr?><?= $emailErr?><?= $messageErr?>");
      }
    </script>
  </body>
</html>
