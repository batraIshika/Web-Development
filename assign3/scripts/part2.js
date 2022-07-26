/**
 * Author: Ishika Batra (103126718))
 * Target: enquire.php and payment.php
 * Purpose: Assign2 , Website
 * Created: 17 April 2021
 * Last Updated: 25 April 2021
 */

"use strict";
//Variable initialization
var debug = true;

function validate() {
    var errMsg = "";
    var result = true;
    var qte = document.getElementById("qte").value.trim();
    var firstname = document.getElementById("firstname").value;
    var lastname = document.getElementById("lastname").value;
    var streetAdd = document.getElementById("street_address").value;
    var suburbTown = document.getElementById("suburbtown").value;
    var state = document.getElementById("state");
    var states = state.options[state.selectedIndex].text;
    var postcode = document.getElementById("postcode").value.trim();
    var phonenum = document.getElementById("phone_number").value;
    var email = document.getElementById("email").value;
    var mail = document.getElementById("mail").checked;
    var post = document.getElementById("post").checked;
    var phone = document.getElementById("phone").checked;
    var cost = document.getElementById("cost").value;
    var category = document.getElementById("category").value;
    
     
    if(!debug)  {
    // name validation
    if (!firstname.match(/^[a-zA-Z]+$/)) {
        errMsg = errMsg + "Enter your first name \n";
        result = false;
    }

    if (!lastname.match(/^[a-zA-Z]+$/)) {
        errMsg = errMsg + "Enter your last name \n";
        result = false;
    }
    //Address validation
    if (streetAdd == "") {
        errMsg = errMsg + "Enter Street Address \n";
        result = false;
    }
    if (suburbTown == "") {
        errMsg = errMsg + "Enter Suburb or Town \n";
        result = false;
    }

    if (states == "Please Select") {
        errMsg = errMsg + "Please select one of the states.\n";
    }
    else if (states == "VIC" && !postcode.match(/^3|^8/)) {
        errMsg = errMsg + "3 or 8 should be the first digit for the postcode of VIC.\n";
    }
    else if (states == "NSW" && !postcode.match(/^1|^2/)) {
        errMsg = errMsg + "1 or 2 should be the first digit for the postcode of NSW.\n";
    }
    else if (states == "QLD" && !postcode.match(/^4|^9/)) {
        errMsg = errMsg + "4 or 9 should be the first digit for the postcode of QLD.\n";
    }
    else if (states == "NT" && !postcode.match(/^0/)) {
        errMsg = errMsg + "0 should be the first digit for the postcode of NT\n";
    }
    else if (states == "WA" && !postcode.match(/^6/)) {
        errMsg = errMsg + "6 should be the first digit for the postcode of WA.\n";
    }
    else if (states == "SA" && !postcode.match(/^5/)) {
        errMsg = errMsg + "5 should be the first digit for the postcode of SA.\n";
    }
    else if (states == "TAS" && !postcode.match(/^7/)) {
        errMsg = errMsg + "7 should be the first digit for the postcode of TAS.\n";
    }
    else if (states == "ACT" && !postcode.match(/^0/)) {
        errMsg = errMsg + "0 should be the first digit for the postcode of ATC.\n";
    }
    //contact details validation
    if (!phonenum.match(/[0-9]{10,10}/)) {
        errMsg = errMsg + "Enter your Phone Number \n";
        result = false;
    }
    if (email == "") {
        errMsg = errMsg + "Enter your Email Address \n";
        result = false;
    }
    if (!(mail || post || phone)) {
        errMsg += "Please select atleast one  mode of contact. \n";
        result = false;
    }
    //package details validation
    if (cost == "") {
        errMsg = errMsg + "Enter the value of package choosen\n";
        result = false;
    }
    if (category == "") {
        errMsg = errMsg + "Pick the package type. \n";
        result = false;
    }
    if (!qte.match(/^[1-9]+$/)) {
        errMsg = errMsg + "Number of months  must be greater than 1\n";
        result = false;
    }
}
    if (errMsg != "") {
        alert(errMsg);
        result = false;
    } else {
        storage(firstname, lastname, streetAdd, suburbTown, email, post , phone , mail , phonenum, postcode, states, cost, qte, category);
    }
    return result;
}
/*validation for credit card details*/
function payment() {
    var errMsg = "";
    var result = true;

    var cardtype = document.getElementById("cardtype");
    var ctypeopt = cardtype.options[cardtype.selectedIndex].text;
    var cchn = document.getElementById("ccname").value;
    var cardnum = document.getElementById("ccnumber").value;
    var cvv = document.getElementById("cvv").value;
    var month = document.getElementById("expirydate").value;
    var year = document.getElementById("year").value;
    if(!debug)  {
    //card type
    if (ctypeopt == "Please Select") {
        errMsg = errMsg + "Please select the Type of Credit Card .\n";
    }
    if (ctypeopt == "VISA" && !cardnum.match(/^4[0-9]{12}(?:[0-9]{3})?$/)) {
        errMsg = errMsg + "Visa card number must have 16 digits and should start with 4. \n";
    }
    else if (ctypeopt == "MASTERCARD" && !cardnum.match(/^5[1-5][0-9]{14}$/)) {
        errMsg = errMsg + "Mastercard card number must have 16 digits and should start with digits 51 through to 55. \n";
    }
    else if (ctypeopt == "AMERICAN EXPRESS" && !cardnum.match(/^3[4,7][0-9]{13}$/)) {
        errMsg = errMsg + "An American Express card number must have 15 digits and should start with 34 or 37. \n";
    }
    //credit card holder name
    if (cchn == "") {
        errMsg = errMsg + "Please enter the Credit Card Name.\n";
    }
    else if (!cchn.match(/^[a-zA-Z ]*$/)) {
        errMsg = errMsg + "The Card Name must contain alphabets and spaces only.\n";
    }
    else if (cchn.length > 40) {
        errMsg = errMsg + "The Card Name must be maximum of 40 characters in length.\n";
    }
    //Expiry date validation
    if (month == "") {
        errMsg = errMsg + "Please enter the Month of expiry of credit card.\n";
    }
    else if (month.length > 2) {
        errMsg = errMsg + "Month of expiry should include max 2 digits.\n";
    }
    else if (month > 12 || month < 0) {
        errMsg = errMsg + "The Month of expiry cannot be more than 12 or less than 0 .\n";
    }

    if (year == "") {
        errMsg = errMsg + "Please enter the Year of expiry of credit card.\n";
    }
    else if (year.length > 2) {
        errMsg = errMsg + "Year of expiry should include max 2 digits.\n";
    }
    //validation of cvv
    if ((cvv) == "") {
        errMsg = errMsg + "Enter CVV \n";

    }
}
    if (errMsg != "") {
        alert(errMsg);
        result = false;
    }

    return result;
}
/*storing data in enquiry page*/
function storage(firstname, lastname, streetAdd, suburbTown, email, post ,phone , mail , phonenum, postcode, states, cost, qte, category) {
    localStorage.setItem("firstname", firstname);
    localStorage.setItem("lastname", lastname);
    localStorage.setItem("qte", qte);
    localStorage.setItem("streetAdd", streetAdd);
    localStorage.setItem("suburbTown", suburbTown);
    localStorage.setItem("states", states);
    localStorage.setItem("postcode", postcode);
    localStorage.setItem("phonenum", phonenum);
    localStorage.setItem("email", email);
    localStorage.setItem("cost", cost);
    localStorage.setItem("category", category);
    localStorage.setItem("post", post);
    localStorage.setItem("phone", phone);
    localStorage.setItem("mail", mail);

}
/*Retriving data in payment page*/
function forminfo() {
    if (typeof (Storage) !== "undefined") {
        if (localStorage.getItem("firstname") !== null) {
            document.getElementById("firstname").value = localStorage.getItem("firstname");
            document.getElementById("lastname").value = localStorage.getItem("lastname");
            document.getElementById("street_address").value = localStorage.getItem("streetAdd");
            document.getElementById("suburbtown").value = localStorage.getItem("suburbTown");
            document.getElementById("email").value = localStorage.getItem("email");
            document.getElementById("phone_number").value = localStorage.getItem("phonenum");
            document.getElementById("postcode").value = localStorage.getItem("postcode");
            document.getElementById("state").value = localStorage.getItem("states");
            document.getElementById("cost").value = localStorage.getItem("cost");
            document.getElementById("qte").value = localStorage.getItem("qte");
            document.getElementById("category").value = localStorage.getItem("category");
            var post = localStorage.getItem("post");
            document.getElementById("post").checked = (post == "true");
            var phone = localStorage.getItem("phone");
            document.getElementById("phone").checked = (phone == "true");
            var mail = localStorage.getItem("mail");
            document.getElementById("mail").checked = (mail == "true");

            /*Total cost to be calculated and displayed*/
            var totalcost = 0;
            var qte = Number(localStorage.getItem("qte"));
            if (localStorage.getItem("cost") == "$80") {
                totalcost = 80 * qte;
            }
            else if (localStorage.getItem("cost") == "$90") {
                totalcost = 90 * qte;
            }
            else if (localStorage.getItem("cost") == "$110") {
                totalcost = 110 * qte;
            }
            else if (localStorage.getItem("cost") == "$125") {
                totalcost = 125 * qte;
            }

            document.getElementById("total").value = "$" + totalcost.toFixed(2);
        }
    }
}

/*Function to clear storage and direct to home page*/
function cancelpayment() {
    localStorage.clear();
    window.location = "index.php";
}
/*Calling init function*/
function init() {
  if (document.getElementById("form1") != null) {
        document.getElementById("form1").onsubmit = validate;
    } 
    else if (document.getElementById("payform") != null) {
        forminfo();
       document.getElementById("payform").onsubmit = payment;
        var canbut = document.getElementById("co");
        canbut.onclick = cancelpayment;
    }

}
window.onload = init;

