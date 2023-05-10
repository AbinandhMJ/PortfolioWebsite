<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $message = $_POST["body"];

  // Validate the email address
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo "Invalid email format";
    exit;
  }

  // Construct the email message
  $to = "abinandhmurukesan@gmail.com";
  $headers = "From: $name <$email>";
  $body = "Subject: $subject\n\n$message";

  // Send the email
  if (mail($to, $subject, $body, $headers)) {
    http_response_code(200);
    echo "Message sent successfully";
  } else {
    http_response_code(500);
    echo "Failed to send message";
  }
} else {
  http_response_code(400);
  echo "Invalid request";
}
?>
