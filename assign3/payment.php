<!DOCTYPE html>
<html lang="en">

<head>
<?php include('./includes/head.inc'); ?>
    <!-- Load font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="scripts/part2.js"></script>
    <script src="scripts/enhancements2.js"></script>
    <title>Product Payment</title>
</head>

<body>
    <img src="images/logo_.png" alt="Website Logo" class="full" height="250" />
    <header>
    <?php include('./includes/header.inc'); ?>
    </header>
    <?php include('./includes/socialmedia.inc'); ?>


    <h1>CUSTOMER PERSONAL DETAILS</h1>
    <!--Enhancement-1  Timer-->
    <h2>Hurry Up :<span id="timer"></span></h2>
    <!--Form containing pre-filled data-->
    <form action="process_order.php" id="payform" method="post" novalidate="novalidate">
        <fieldset class="form">

            <p>
                <label for="firstname">FIRST NAME</label>
                <input name="firstname" id="firstname" type="text" pattern="^[A-Za-z]+$" maxlength="25"
                    required="required" readonly />
            </p>
            <p>
                <label for="lastname">LAST NAME</label>
                <input name="lastname" id="lastname" type="text" pattern="^[A-Za-z]+$" maxlength="25"
                    required="required" readonly />
            </p>
            <p>
                <label for="street_address">STREET ADDRESS</label>
                <input name="street_address" id="street_address" type="text" maxlength="40" required="required"
                    readonly />
            </p>
            <p>
                <label for="suburbtown">SUBURB/TOWN </label>
                <input name="suburbtown" id="suburbtown" type="text" pattern="^[A-Za-z]+$" maxlength="20"
                    required="required" readonly />
            </p>
            <p>
                <label for="state">STATE </label>
                <input type="text" id="state" name="state" readonly>
            </p>
            <p>
                <label for="postcode">POSTCODE</label>
                <input name="postcode" id="postcode" type="text" pattern="[0-9]{4}" maxlength="4" required="required"
                    readonly />
            </p>
            <p> <label for="phone_number">PHONE NUMBER</label>
                <input name="phone_number" id="phone_number" type="text" pattern="[0-9]{10,10}" maxlength="10"
                    required="required" readonly />
            </p>
            <p>
                <label for="email">EMAIL ADDRESS</label><br>
                <input name="email" id="email" type="email" required="required" readonly />
            </p>
            <p>PREFERRED CONTACT-: <br>
            <input type="radio" id="mail" name="mail" value="mail" class="readonly" />
            <label id="readonly1" for="mail">E-Mail</label>
            <input type="radio" id="post" name="mail" value="post" class="readonly"/>
            <label  id="readonly2" for="post">Post</label>
            <input type="radio" id="phone" name="phone" value="phone" class="readonly"/>
            <label id="readonly3" for="phone">Phone</label>
          </p>
            <p>
                <label for="category">CATEGORY CHOOSEN</label>
                <br>
                <input name="category" id="category" required="required" readonly>
            </p>
            <label for="cost">PACKAGE COST</label><br>
            <input type="text" name="cost" id="cost" required="required" readonly>
            <p>
                <label for="qte">PLAN DURATION (MONTHS)</label>
                <br>
                <input type="number" name="qte" id="qte" required="required" readonly>
            </p>
            <p>
                <label for="total">TOTAL PAYMENT </label>
                <br>
                <input type="text" name="total" id="total" required="required" readonly>
            </p>
        </fieldset>
        <h1>PRODUCT PAYMENT DETAILS</h1>
        <!--Form containing Payment details-->
        <fieldset class="form">
            <p>
                <label for="cardtype">CARD TYPE</label>
                <select name="cardtype" id="cardtype">
                    <option value="">Please Select</option>
                    <option value="visa">VISA</option>
                    <option value="mastercard">MASTERCARD</option>
                    <option value="americanexpress">AMERICAN EXPRESS</option>
                </select>
            </p>
            <p>
                <label for="ccname">CREDIT CARD HOLDER NAME</label>
                <input name="ccname" id="ccname" type="text" pattern="^[a-zA-Z ]+$" maxlength="40" />
            </p>
            <p> <label for="ccnumber">CREDIT CARD NUMBER</label>
                <input name="ccnumber" id="ccnumber" type="text" pattern="^[0-9]{15,16}$" maxlength="16"
                    placeholder="1111222233334444" />
            </p>
            <p> <label for="expirydate">CREDIT CARD EXPIRY DATE:</label>
                <br>
                <input type="text" id="expirydate" placeholder="mm" name="month" minlength="2" maxlength="2">
                <input type="text" id="year" placeholder="yy" name="year" minlength="2" maxlength="2">
            </p>
            <p>
                <label for="cvv">CARD VERIFICATION VALUE(CVV)</label><br>
                <input name="cvv" id="cvv" type="password" maxlength="3" />
            </p>
            <button type="reset" id="co">CANCEL ORDER</button>
            <button type="submit" id="po">CHECK <br> OUT</button>
        </fieldset>
    </form>
    <!--Footer-->

    <footer>
    <?php include('./includes/footer.inc'); ?>
    </footer>
</body>

</html>