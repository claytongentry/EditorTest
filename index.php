<!--
TODO:
- Sexify
- Ensure user is working on a desktop w/ media query
-->

<?php require('templates/header.php'); ?>

  <div class = "container">

  <h1>Inverse Editor Test</h1>

  <div id = "timer">
    <p><span id = "hours">1</span>:<span id = "minutes">59</span></p>
  </div>

  <button onclick="startTest(performance.now())">Start Test!</button>

  <!-- Create the editor container and place to store it-->
  <form method = "post" onsubmit = "return copyCopy()" action = <?php echo htmlspecialchars('mailer/submit.php');?>>
    <div id = "copy" contenteditable>

    <p>Austerity and the Politics of Money

    </p><p>This critical assessment of austerity policies across Europe by Mark Blyth, professor of international political economy at Brown University, can help you make sense of what’s going on in Greece.

    </p><p>How Sharks Have Sex

    </p><p>In honor of #SharkWeek, the good folks at Discovery News tell us everything we ever wanted to know about how our favorite predators get it on.

    </p><p>Should This Lake Exist?

    </p><p>The Salton Sea is in the middle of the California desert, and it appeared there entirely by accident. That didn’t stop locals from trying to turn it into the American version of the French Riviera in the 1960s. This video, from science and engineering presenter Veritasium, tells the fascinating story of this accidental lake.

    </p><p>What Does LSD Do To The Brain?

    </p><p>Here’s a short and sweet primer on acid, its fabled history, and its actual effects on the brain by Greg Foot at BritLab. Just so you know.</p>
    </div>
    <textarea id = "hidden_copy" name = "hidden" display = "none"></textarea>
    <input type = "submit" value = "Submit"/>
  </form>

  </div>

  <!--jQuery-->
  <!--<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>-->

  <script>
    /****************************************************
    * Timer
    ****************************************************/
    // $(document).ready(function() {

      // startTest(performance.now());

      // Takes parameter of how much time passed when site was open but test was not
      function startTest(openTime) {

        // var timeIn = true;
        // Run test for two hours
          console.log("Allan!");

          var timer = setInterval(countdown, 1000); // Update timer every second

          function countdown() {

            // Start clock only when they open the test
            timeIn = performance.now() - openTime;

            // Shut it down at two minutes (to be hours)
            if (timeIn > 120000) {
              setTimeout(testOver, 0);
              document.getElementById("timer").innerHTML = "Time's up!";
            }

            /*
            * Current minute is remainder of number of seconds
            * the quiz has been open divided by 60, then
            * subtracted from 60, then rounded up. Trust me — it works.
            */
            mins = 60 - Math.ceil((timeIn / 1000) % 60);
            // Reset at 0
            if (mins == -1) {
              mins = 59;
            }

            hrs = 2 - Math.ceil(timeIn / 60000);

            // Update view
            document.getElementById("minutes").innerHTML = ('0' + mins).slice(-2);
            document.getElementById('hours').innerHTML = hrs;
          }

          function testOver() {
            clearInterval(timer);
            console.log("You will edit...\n");
            document.getElementById("copy").contentEditable = false;
            console.log("\n...no longer.");
          }

      }

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
