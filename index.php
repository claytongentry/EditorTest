<!--
TODO:
-
- Ensure user is working on a desktop w/ media query
-->

<?php require('templates/header.php'); ?>

  <div class = "container">

  <h1>Inverse Editor Test</h1>

  <div id = "timer">
    <p><span id = "hours">1</span>:<span id = "minutes">59</span></p>
  </div>

  <!-- Create the editor container and place to store it-->
  <form method = "post" onsubmit = "return copyCopy()" action = <?php echo htmlspecialchars('mailer/submit.php');?>>
    <div id = "copy" contenteditable>Tus eest bad sintunce.</div>
    <textarea id = "hidden_copy" name = "hidden" display = "none"></textarea>
    <input type = "submit" value = "Submit"/>
  </form>

  </div>

  <script>
    /****************************************************
    * Timer
    ****************************************************/
    var hrs = 1; // Init hours
    function minutes_countdown() {
      // TODO: Fix this logic
      mins = 60 - Math.ceil(performance.now() / 1000);
      if (mins == -1) {
        mins = 59;
        console.log("Reset!");
      }
      // console.log("Mins:" + mins);
      document.getElementById("minutes").innerHTML = ('0' + mins).slice(-2);
    }

    function hours_countdown() {
      hrs = 2 - Math.ceil(performance.now() / 60000);
      document.getElementById('hours').innerHTML = hrs;
    }

    var minTimer = setInterval(minutes_countdown, 500);
    var hourTimer = setInterval(hours_countdown, 30000)

    function testOver() {
      clearInterval(timer);
      // document.getElementById("timer").innerHTML = "Time's up!";
    }

    setTimeout(testOver, 60000);

    /****************************************************
    * Copy Prep for PHP Mailing
    ****************************************************/
    function copyCopy() {
      // Copy content from editable (but non-mailable) div element to non-editable (but mailable) form element
      document.getElementById("hidden_copy").value = document.getElementById("copy").innerHTML;
      console.log("Stuff to send: " + document.getElementById("hidden_copy").value);

      // Make sure it actually copied
      if (document.getElementById("hidden_copy").value)
        return true;
      else
        return false;

    }
  </script>

<?php require('templates/footer.php'); ?>
