<!DOCTYPE html>
<html land="en">
    <head>
        <meta charset="utf-8" />
        <meta name="descrition" content="Creating Web Applications Lab 10" />
        <meta name="keywords" content="PHP , MySql" />
        <title>Retrieving records to HTML</title>
</head>
<body>
   <?php
   require_once("settings.php");

   $conn = @mysqli_connect(
     $host,
     $user,
     $pwd,
     $sql_db
   );

   function sanitise_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<?php
    $firstname = sanitise_input($_POST["firstname"]);
    $lastname = sanitise_input($_POST["lastname"]);
    $streetaddress = sanitise_input($_POST["street_address"]);
    $suburbtown = sanitise_input($_POST["suburbtown"]);
    $state = sanitise_input($_POST["state"]);
    $postcode = sanitise_input($_POST["postcode"]);
    $phonenumber = sanitise_input($_POST["phone_number"]);
    $emailaddress = sanitise_input($_POST["email"]);
    $categorychoosen = sanitise_input($_POST["category"]);
    $packagecost = sanitise_input($_POST["cost"]);
    $packageduration = sanitise_input($_POST["qte"]);
    $totalpayment = sanitise_input($_POST["total"]);
    $cardtype = sanitise_input($_POST["cardtype"]);
    $cardholdername = sanitise_input($_POST["ccname"]);
    $cardnumber = sanitise_input($_POST["ccnumber"]);
    $expirymonth = sanitise_input($_POST["month"]);
    $expiryyear = sanitise_input($_POST["year"]);
    $cvv = sanitise_input($_POST["cvv"]);
    $sql_table = "orders";

    $query = "insert into $sql_table (firstname,lastname,streetaddress,suburbtown,state,postcode,phonenumber,emailaddress,categorychoosen,packagecost,packageduration,totalpayment,cardtype,cardholdername,cardnumber,expirymonth,expiryyear,cvv)
     values ('$firstname','$lastname','$streetaddress','$suburbtown','$state','$postcode','$phonenumber','$emailaddress','$categorychoosen','$packagecost','$packageduration','$totalpayment','$cardtype','$cardholdername','$cardnumber','$expirymonth','$expiryyear','$cvv')";
    $result = mysqli_query($conn,$query);
    if(!$result) {
        echo "<p class=\"wrong\">Something is wrong with ",  $query,"</p>";   
    }  else {
        echo "<p class=\"ok\">Successfully added New Car record </p>";
    }
    mysqli_close($conn);

    $errMsg ="";
    
if ($firstname=="") {
        $errMsg .= "<p>You must enter your first name.</p>";
    }
else if (!preg_match("/^[a-zA-Z]*$/",$firstname)) {
      $errMsg .="<p>Only alpha letters allowed in your first name.</p>";
  }

if ($lastname=="") {
    $errMsg .= "<p>You must enter your last name.</p>";
}
else if (!preg_match("/^[A-Za-z-]+$/",$lastname)) {
  $errMsg .="<p>Only alpha letters or hyphen allowed in your last name.</p>";
}

if ($streetaddress == "") {
    $errMsg .= "<p>Enter Street Address.</p>";
}
if ($suburbtown == "") {
    $errMsg .= "<p>Enter Suburb/Town.</p>";
}
if ($emailaddress == "") {
    $errMsg .= "<p>Enter your Email Address.</p>";
}

if ($categorychoosen == "") {
    $errMsg .= "<p>Pick the Package Type .</p>";
}
if ($packagecost == "") {       
    $errMsg .= "<p>Enter the Package Cost .</p>";
}

if ($packageduration=="") {
    $errMsg .= "<p>Please enter the package duration.</p>";
  }
  else if ($packageduration < 1) {
    $errMsg .= "<p>Plan must be for atleast 1 month</p>";
  }
  else if ($packageduration > 12) {
    $errMsg .= "<p>Plan must be for less than 12 months.</p>";
  }

if (!preg_match("/[0-9]{10,10}/",$phonenumber)) {
    $errMsg .= "<p>Enter your Phone Number</p>";
}
                  
if ($state == "Please Select") {
    $errMsg .= "<p>Please select one of the state.</p>";
}
else if ($state == "VIC" && (!preg_match("/^3|^8/",$postcode))) {
    $errMsg .= "<p>3 or 8 should be the first digit for the postcode of VIC.</p>";
}
else if ($state == "NSW" && (!preg_match("/^1|^2/",$postcode))) {
    $errMsg .="<p>1 or 2 should be the first digit for the postcode of NSW.</p>";
}
else if ($state == "QLD" && (!preg_match("/^4|^9/",$postcode))) {
    $errMsg .= "<p>4 or 9 should be the first digit for the postcode of QLD.</p>";
}
else if ($state == "NT" && (!preg_match("/^0/",$postcode))) {
    $errMsg .= "<p>0 should be the first digit for the postcode of NT</p>";
}
else if ($state == "WA" && (!preg_match("/^6/",$postcode))) {
    $errMsg .= "<p>6 should be the first digit for the postcode of WA.</p>";
}
else if ($state == "SA" && (!preg_match("/^5/",$postcode))) {
    $errMsg .= "<p>5 should be the first digit for the postcode of SA.</p>";
}
else if ($state == "TAS" && (!preg_match("/^7/",$postcode))) {
    $errMsg .= "<p>7 should be the first digit for the postcode of TAS.</p>";
}
else if ($state == "ACT" && (!preg_match("/^0/",$postcode))) {
    $errMsg .= "<p>0 should be the first digit for the postcode of ATC.</p>";
}
if ($totalpayment =="$0.00") {
    $errMsg .= "<p>Enter the Total Payment</p>";
}


if ($cardholdername=="") {
    $errMsg .= "<p>Enter your Credit Card Name.</p>";
  } else if (!preg_match("/^[a-zA-Z]*$/",$cardholdername)) {
    $errMsg .= "<p>Only alpha letters allowed in your name on credit card.</p>";
  }
if (!preg_match("/[0-9]{15,16}/", $cardnumber)) {
    $errMsg .= "<p>Enter valid card number </p>";
   }

if ($cardtype == "") {
    $errMsg .="<p>Please select the Type of Credit Card .</p>";
}
if ($cardtype == "visa" && (!preg_match("/^4[0-9]{12}(?:[0-9]{3})?$/",$cardnumber))) {
    $errMsg .= "<p>Visa card number must have 16 digits and should start with 4. </p>";
}
else if ($cardtype == "mastercard" && (!preg_match("/^5[1-5][0-9]{14}$/",$cardnumber))) {
    $errMsg .= "<p>Mastercard card number must have 16 digits and should start with digits 51 through to 55. </p>";
}
else if ($cardtype == "americanexpress" && (!preg_match("/^3[4,7][0-9]{13}$/",$cardnumber))) {
    $errMsg .="<p>An American Express card number must have 15 digits and should start with 34 or 37. </p>";
} 

if ($expirymonth=="") {
    $errMsg .= "<p>Please enter the Card Expiry Month</p>";
  }
  else if ($expirymonth > 12) {
    $errMsg .= "<p>There are only 12 months in a year.</p>";
  }
if ($expiryyear=="") {
    $errMsg .= "<p>Please enter the card expiry year</p>";
  }
  else if ($expiryyear <= 21) {
    $errMsg .= "<p>Your card has expired.</p>";
  }
  else if ($expiryyear > 40) {
    $errMsg .= "<p>Expiry year too far, Invalid.</p>";
  }
  if ($cvv=="") {
    $errMsg .= "<p>Please enter the card's cvv.</p>";
  }
  else if ($cvv > 999) {
    $errMsg .= "<p>CVV must be 3 digits long</p>";
  }
  else if ($cvv < 100) {
    $errMsg .= "<p>CVV must be 3 digits long</p>";
  }
  if ($errMsg !="") {
    echo "<p>$errMsg</p>";
}
else {
    echo "<p>Welcome $firstname ! <br>
    
    
    </p>";}


    ?>  
    </body>
    </html>