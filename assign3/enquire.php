<!DOCTYPE html>
<html lang="en">

<head>
<?php include('./includes/head.inc'); ?>
  <!-- Load font awesome icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="scripts/part2.js"></script>
  <script src="scripts/enhancements.js"></script>
  <title>Product Enquiry</title>
</head>

<body>
  <img src="images/logo_.png" alt="Website Logo" class="full" height="250" />
  <header>
  <?php include('./includes/header.inc'); ?>
  </header>
  <?php include('./includes/socialmedia.inc'); ?>
  <h1 class="enquire">ENQUIRE</h1>
  <h2>Drop down your details and our service partners will contact you as soon as possible!!</h2>
  <h3>If you have any issue with our services or want to know more about our plans , you can mention your query in the
    box given below.</h3>
  <!--Enhancement 2 - Tab Header-->
  <main>
    <h2> PLANS IN BRIEF-----></h2>

    <div id="mb1" class="tabcontent">
      <h3>Mobile data plan1</h3>
      <p>$80 , 6GB , 84days</p>
    </div>

    <div id="mb2" class="tabcontent">
      <h3>Mobile data plan2</h3>
      <p>$90 , 2GB/day , 56days</p>
    </div>

    <div id="wp1" class="tabcontent">
      <h3>Wifi plan1</h3>
      <p>$110 , 200mbps</p>
    </div>

    <div id="wp2" class="tabcontent">
      <h3>Wifi plan2</h3>
      <p>$125 , 600mbps (most popular plan)</p>
    </div>

    <button class="tablink" onclick="plans('mb1', this, 'rgb(169, 113, 221)')">Mobile data plan1</button>
    <button class="tablink" onclick="plans('mb2', this, 'skyblue')">Mobile data plan2</button>
    <button class="tablink" onclick="plans('wp1', this, 'pink')">Wifi plan1</button>
    <button class="tablink" onclick="plans('wp2', this, 'rgb(233,233,87)')">Wifi plan2</button>



    <!-- Form for enquiry-->
    <form method="post" class="form" id="form1" action="payment.php" novalidate="novalidate">
      <fieldset>
        <legend>CUSTOMER DETAILS</legend>
        <p>
          <label for="firstname">FIRST NAME</label>
          <input name="firstname" id="firstname" type="text" pattern="^[A-Za-z]+$" maxlength="25" />
        </p>
        <p>
          <label for="lastname">LAST NAME</label>
          <input name="lastname" id="lastname" type="text" pattern="^[A-Za-z]+$" maxlength="25" />
        </p>
        <p>
          <!--ADDRESS -->
        <fieldset>
          <legend>ADDRESS</legend>
          <p>
            <label for="street_address">STREET ADDRESS</label>
            <input name="street_address" id="street_address" type="text" maxlength="40" />
          </p>
          <p>
            <label for="suburbtown">SUBURB/TOWN </label>
            <input name="suburbtown" id="suburbtown" type="text" pattern="^[A-Za-z]+$" maxlength="20" />
          </p>
          <p>
            <label for="state">STATE</label>
            <select name="state" id="state">
              <option value="">Please Select</option>
              <option value="victoria">VIC</option>
              <option value="new_south_wales">NSW</option>
              <option value="queensland">QLD</option>
              <option value="northern_territory">NT</option>
              <option value="western_australia">WA</option>
              <option value="tasmania">TAS</option>
              <option value="south_australia">SA</option>
              <option value="australian_capital_territory">ACT</option>
            </select>
          </p>
          <p>
            <label for="postcode">POSTCODE</label>
            <input name="postcode" id="postcode" type="text" pattern="[0-9]{4}" maxlength="4" />
          </p>
        </fieldset>
        <br>
        <p>
          <!--contact details-->
        <fieldset>
          <legend>CONTACT DETAILS</legend>
          <label for="phone_number">PHONE NUMBER</label>
          <input name="phone_number" id="phone_number" type="text" pattern="[0-9]{10,10}" maxlength="10"
            placeholder="+61xxxxxxx" />
          <p>
            <label for="email">EMAIL ADDRESS</label>
            <input name="email" id="email" type="email" />
          </p>
          <!--Radio element used to choose preferred contact-->
          <p>PREFERRED CONTACT-: <br>
            <input type="radio" id="mail" name="mail" value="mail"/>
            <label for="mail">E-Mail</label>
            <input type="radio" id="post" name="mail" value="post" />
            <label for="post">Post</label>
            <input type="radio" id="phone" name="phone" value="phone" />
            <label for="phone">Phone</label>
          </p>
        </fieldset>
      </fieldset>
      <fieldset>
        <legend>PACKAGE DETAILS</legend>
        <p>
          <!--Package details-->
          <label for="category">CATEGORY(you want to enquire about)</label>
          <select name="category" id="category">
            <option value="">Please select</option>
            <option value="wifi_plan">WIFI PLANS</option>
            <option value="mobile_data_plan">MOBILE DATA PLANS</option>
          </select>
        </p>
        <p>
          <label for="cost">PACKAGE COST</label>
          <select name="cost" id="cost">
            <option value="">Please Select</option>
            <option value="$80">mobiledata plan 1-$80</option>
            <option value="$90">mobiledata plan 2-$90</option>
            <option value="$110">wifi plan 1-$110</option>
            <option value="$125">wifi plan 2-$125</option>
          </select>
        </p>
        <label for="qte">Number of months you want to buy a package : <br>
          <input type="number" id="qte"></label><br>
        <p>FEATURES (EXTRA BENEFITS)-:
          <br>
          <label for="subscriptions">SPECIAL SUBSCRIPTIONS</label>
          <input type="checkbox" id="subscriptions" name="subscriptions" value="subscriptions" checked="checked" />
          <label for="extra_discount">EXTRA DISCOUNT</label>
          <input type="checkbox" id="extra_discount" name="extra_discount" value="extra_discount" />
          <label for="other">OTHER</label>
          <input type="checkbox" id="other" name="other" value="other" />
        </p>
      </fieldset>
      <p><label>COMMENT FIELD</label></p>
      <p>
        <textarea id="issue" name="description_of_issue" rows="10" cols="40"
          placeholder="Specify here a particular aspect you are interested in...."></textarea>
      </p>
      <button type="submit">PAY NOW</button>
      <button type="reset">RESET FORM</button>
    </form>
  </main>
  <!--Footer-->
  <footer>
  <?php include('./includes/footer.inc'); ?>
  </footer>
</body>

</html>