/**
 * Author: Ishika Batra (103126718))
 * Target: payment.php
 * Purpose: Assign2 , Website
 * Created: 17 April 2021
 * Last Updated: 25 April 2021
 */
"use strict";
var count = 280; // 280 secs countdown time
var counter = setInterval(timer, 1000); //1000 will  run it every 1 second

function timer() {
   count = count - 1;
   if (count <= 0) {
      clearInterval(counter);
      cancelpayment();
      window.location = "index.php"; //directs ir to directly main page
      return;
   }

   document.getElementById("timer").innerHTML = count + " secs left to complete payment !!"; // watch for spelling
}