<?php
  include("connection.php");
  session_start();
   // Retrieve and sanitize input data from the form
  $student_number = mysqli_real_escape_string($conn, $_POST['student_number']);
  $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
  $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
  $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
  $extension_name = mysqli_real_escape_string($conn, $_POST['extension_name']);
  $program_degree = mysqli_real_escape_string($conn, $_POST['program_degree']);
  $year_graduated = mysqli_real_escape_string($conn, $_POST['year_graduated']);
  $client_email = mysqli_real_escape_string($conn, $_POST['client_email']);
  $client_contact_number1 = mysqli_real_escape_string($conn, $_POST['client_contact_number1']);
  $client_contact_number2 = mysqli_real_escape_string($conn, $_POST['client_contact_number2']);
  $house_number = mysqli_real_escape_string($conn, $_POST['house_number']);
  $street_name = mysqli_real_escape_string($conn, $_POST['street_name']);
  $barangay = mysqli_real_escape_string($conn, $_POST['barangay']);
  $municipality = mysqli_real_escape_string($conn, $_POST['municipality']);
  $document_type = mysqli_real_escape_string($conn, $_POST['document_type']);
  $academic_year = mysqli_real_escape_string($conn, $_POST['academic_year']);
  $purpose = mysqli_real_escape_string($conn, $_POST['purpose']);

  $request_id = uniqid('REQ-', true);
  $clientid = $_SESSION['clientid'];

  $sql = "INSERT INTO requests (
    client_name,
    client_id,
    request_id,
    student_number, 
    lastname, firstname, 
    middlename, 
    extension_name, 
    program_degree, 
    year_graduated, 
    client_email, 
    client_contact_number1, 
    client_contact_number2, 
    house_number, 
    street_name, 
    barangay, 
    city, 
    document_type, 
    academic_year, 
    purpose, 
    request_date, 
    date_created,
    status
    )
  VALUES (
    '$firstname $middlename. $lastname', 
    '$clientid',
    '$request_id',
    '$student_number', 
    '$lastname', 
    '$firstname', 
    '$middlename', 
    '$extension_name', 
    '$program_degree', 
    '$year_graduated', 
    '$client_email', 
    '$client_contact_number1', 
    '$client_contact_number2', 
    '$house_number', 
    '$street_name', 
    '$barangay', 
    '$municipality', 
    '$document_type', 
    '$academic_year', 
    '$purpose', 
    CURDATE(), 
    NOW(),
    'Pending'
  )";

  if($conn -> query($sql)){
    echo json_encode(['status' => 'success', 'message' => 'Request Submitted', 'description' => 'Request submitted, please wait atleast 3-5 business days to complete your request.']);
  }else {
    echo json_encode(['status' => 'error', 'message' => 'Request Submission Failed', 'description' => 'Were having a problem submitting your request. Please contact the registrar or try again requesting after couple of minutes or hour.']);
  }

  $conn -> close();
?>