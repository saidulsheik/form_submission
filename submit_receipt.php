<?php
    include "config/config.php"; 
    include "lib/Database.php"; 
    include "helpers/Format.php"; 
    $db = new Database(); 
	$fm = new Format(); 
    $response=array(
        'success'=>false
    );
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  // Perform server-side validation
  $data=array();
  $errors = [];
  $isValid=true;
  // Validate Amount (only numbers)
  $amount = $_POST['amount'];
  if (!is_numeric($amount)) {
    $errors['amount'] = 'Amount must be a number';
    $isValid=false;
  }

  // Validate Buyer (only text, spaces, and numbers)
  $buyer = $_POST['buyer'];
  if (!preg_match('/^[a-zA-Z0-9\s]+$/', $buyer)) {
    $errors['buyer'] = 'Buyer must contain only text, spaces, and numbers';
     $isValid=false;
  }

  // Validate Receipt ID (only text)
  $receiptId = $_POST['receipt_id'];
  if (!preg_match('/^[a-zA-Z]+$/', $receiptId)) {
    $errors['receipt_id'] = 'Receipt ID must contain only text';
     $isValid=false;
  }

  // Validate Items (only text)
  $items = $_POST['items'];
  if (!preg_match('/^[a-zA-Z\s,]+$/', $items)) {
    $errors['items'] = 'Items must contain only text';
    $isValid = false;
  }

  // Validate Buyer Email (valid email format)
  $buyerEmail = $_POST['buyer_email'];
  if (!filter_var($buyerEmail, FILTER_VALIDATE_EMAIL)) {
    $errors['buyer_email'] = 'Invalid Buyer Email';
     $isValid=false;
  }

  // Validate Note (not more than 30 words)
  $note = $_POST['note'];
  $noteWordCount = str_word_count($note);
  if ($noteWordCount > 30) {
    $errors['note'] = 'Note cannot exceed 30 words';
     $isValid=false;
  }

  // Validate City (only text and spaces)
  $city = $_POST['city'];
  if (!preg_match('/^[a-zA-Z\s]+$/', $city)) {
    $errors['city'] = 'City must contain only text and spaces';
     $isValid=false;
  }

  // Validate Phone (only numbers)
  $phone = $_POST['phone'];
  if (!preg_match('/^[0-9]+$/', $phone)) {
    $errors['phone'] = 'Phone must contain only numbers';
     $isValid=false;
  }




      // Validate Entry By (only numbers)
  $entryBy = $_POST['entry_by'];
  if (!is_numeric($entryBy)) {
    $errors['entry_by'] = 'Entry By must contain only numbers';
     $isValid=false;
  }

  // Check if there are any validation errors
  if (empty($errors) &&  $isValid==true) {

    $receiptId = $_POST['receipt_id'];
    $salt = 'salt';

    $buyer_ip= $_SERVER['REMOTE_ADDR'];

    // Generate the hash key using SHA-512 with salt
    $hashKey = hash('sha512', $receiptId . $salt);
    // All validations pass, proceed with saving the data to the database
    // ...
    
    /* echo '<pre>';
    print_r($_POST);
    print_r($buyer_ip= $_SERVER['REMOTE_ADDR']);
    echo '</pre>'; */
    
    $data=array(
      'amount'=>$amount,
      'buyer'=>$buyer,
      'receipt_id'=>$receiptId,
      'items'=>$items,
      'buyer_email'=>$buyerEmail,
      'buyer_ip'=>$buyer_ip,
      'note'=>$note,
      'city'=>$city,
      'phone'=>$phone,
      'hash_key'=>$hashKey,
      'entry_at'=>date('Y-m-d h:m:s'),
      'entry_by'=>$entryBy
    );
    
    
     // Return success response
    
    if($db->dynamicInsert('receipts',$data)==true){
        $response = ['success' => true, 'message' => 'Data submitted successfully'];
    }else{
      $response = ['success' => false, 'message' => 'Something Went Wrong'];
    }
    
  } else {
    // Validation errors occurred, return error response with error messages
    $response = ['success' => false, 'errors' => $errors];
   
  }
  $_SERVER['REQUEST_METHOD']='';
  $_POST='';

  
  echo json_encode($response);
 
}
   

?>
