<?php
$errors = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email_input = $_POST['email'];
  $sanitized_email = filter_var($email_input, FILTER_SANITIZE_EMAIL);
  if (!$email_input) {
    $errors[] = "Please make sure to fill out the email field";
  } else if (!filter_var($sanitized_email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email address";
  }
  $subject_input = $_POST['subject'];
  if (!$subject_input) {
    $errors[] = "Please make sure to fill out the subject field";
  } else {
    $subject_value = $subject_input;
  }
  $message_input = $_POST['message'];
  if (!$message_input) {
    $errors[] = "Please make sure to fill out the message field";
  }

  if (empty($errors)) {
    $sanitized_subject = htmlspecialchars($subject_input);
    $sanitized_message = htmlspecialchars($message_input);

    $to = 'carinacmeireles@gmail.com';
    $subject = $sanitized_subject;
    $message = $sanitized_message;
    $headers = "From: $sanitized_email";
    if (mail($to, $subject, $message, $headers)) {
      echo "Email sent successfully";
    } else {
      echo "Failed to send email";
    }
  }
}
?>
<!DOCTYPE html>
<html>

<body>
  <h1>Email Contact Form</h1>
  <form method="post">
    <input type="text" name="email" placeholder="email" />
    <div class="error">
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        foreach ($errors as $error) {
          echo "<div>$error</div>";
          break;
        }
      }
      ?>
    </div>
    <input type="text" name="subject" placeholder="subject" />
    <div class="error">
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $error_count = 0;
        foreach ($errors as $error) {
          if ($error_count == 1) {
            echo "<div>$error</div>";
            break;
          }
          $error_count++;
        }
      }
      ?>
    </div>
    <textarea rows="5" cols="40" name="message" placeholder=" message"></textarea>
    <div class="error">
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $error_count = 0;
        foreach ($errors as $error) {
          if ($error_count == 2) {
            echo "<div>$error</div>";
            break;
          }
          $error_count++;
        }
      }
      ?>
    </div>
    <input type="submit" value="Submit" />
  </form>
</body>

</html>

<style>
  input {
    display: block;
    margin-top: 10px;
  }

  textarea {
    margin-top: 10px;
  }

  .error {
    color: red;
  }
</style>