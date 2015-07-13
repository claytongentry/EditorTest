<!--
*
* INVERSE Editor Test Application
* Developed by Clayton Gentry, claytongentry.com
* July 12, 2015
*
-->
<?php require('templates/header.php'); ?>

  <div class = "container">

    <!--Header-->
    <div class="row">
      <div class = "header col-md-8">
        <h1>Inverse Editing Test</h1>
      </div>
      <div class = "header col-md-4" id = "timer">
        <p id = "time"><span id = "hours">1 hr</span>, <span id = "minutes">59 min</span></p>
        <button id ="hideTimer" onclick = "toggleTimer()" style = "background: black;"><i class="fa fa-times-circle fa-8x"></i></button>
      </div>
      <div class = "header col-md-4" id = "show_timer" onclick = "toggleTimer()">
        <p style = "font-size: 16px; cursor: pointer">Show timer</p>
      </div>
    </div>

    <!-- Create the editor container and place to store it-->
    <div class = "row" id = "copy_begin">
      <div class = "col-md-12">
        <form id = "copy_form" method = "post" onsubmit = "return copyCopy()" action = <?php echo htmlspecialchars('mailer/submit.php');?>>

          <!-- Start Button-->
          <div class = "row" id = "button_holder">
            <button id = "start" type = "button" onclick="startTest(performance.now())"><p>Begin</p></button>
          </div>

          <div id = "copy" style = "display: none;" spellcheck="false">
            <h1><strong>Dear Universe, Bring Me Back as Tom Hardy</strong></h1>
            <h4>Every man can aspire to be a little more Hardy in their lives.</h4>
            <hr/>
            <p>If I bowed to the God of Reincarnation, or crawled into a shallow hole at the Pet Sematary, however that works, I would beg to be brought back as Tom Hardy. Even megastars and leading men struggle to carve out a niche in Hollywood; Hardy, meanwhile, is using a chainsaw. We could all do worse than to be a little more Tom Hardy each day.</p>
            <p>Pretty much every one knows of Tom Hardy now, after he salted the flaccid CGI game with his turn as Mad Max in George Miller’s visceral — and mostly real — Mad Max: Fury Road. The role has transformed Hardy from one of those “you know Tom Hardy, he was the dude in ‘this movie’ and ‘that movie’” guys into, simply, Tom Hardy. But he’s been around a minute, taking on challenging roles, smaller roles, and sneaking his brutish charm into some mega blockbusters along the way. The guy is more than just another prototypical marquee-topper; he’s a complex and fascinating character away from the cinema. He is a man’s man for man’s men.</p>
            <p>Tom Hardy does not project the debonair charm of a Cary Grant spawn, a la Clooney. He doesn’t have Brad Pitt’s cement-block abs. He doesn’t have Leo’s boyish glint or the Mouse Club perfection of Ryan Gosling. His teeth tilt, he’s bedecked in tattoos, his haircuts look like a crazed FIFA fullback’s, and his beard looks like a hipster got caught in a Cuisinart. And it isn’t manufactured to look that way, that’s just how he rolls. The rakishly good looks mirror his jagged charisma.</p>
            <p>His confidence shines through in several of his performances, in roles where his appearance is deceptively hidden. In Bronson, he looks like a bald version of bare-knuckle boxer John L. Sullivan), he wore a mask through the entirety of The Dark Knight Rises. Clooney, Pitt, DiCaprio, all those dudes are great in their own right, but do they ever look different beyond a hairstyle change? Even that’s a rarity. Hardy is more accessible if you ask me, a penetrable personality not floating in the clouds of Hollywood.</p>
            <p>Dude has also crushed some serious demons. In his early days, Hardy was a drunk and a druggie, a “bugger” in his own words, but he figured out that path had a definitive and abrupt end on a much shorter road, so he kicked the habits. All of them. Hardy transformed from a waste of space into a legit performer, constantly challenging the form.</p>
            <p>Under the scars and scraggly beard, he’s a quirky and delicately thoughtful guy. If you think he’s nothing but a serious bloke, check out his old MySpace page.</p>
            <p>Fury Road isn’t the only place to see Tom Hardy in 2015. In September, Hardy takes on dual roles as the Kray Twins in Legend, and in the thick of awards season he will star alongside DiCaprio in The Revenant. The more Tom Hardy the better. Hollywood and the current State of Man need more badasses who roll to their own beat. He is a movie star because that’s his job, not because he is a movie star in the purest sense. And I dig that about the guy.</p>
          </div>

          <textarea id = "hidden_copy" name = "hidden" display = "none"></textarea>

          <br/>

          <div class="form-actions">
            <button id="submit">Submit</button>
          </div>

        </form>
      </div>
    </div>

  </div>

  <ol style = "display: none" id = "joyride_tour" data-joyride>
    <li data-class = "header" data-button="Okay.">
      <h2>Hey!</h2>
      <p>Welcome to the Inverse editing test. It's nothing fancy, but let me show you around before we get started.</p>
    </li>
    <li data-id = "copy_form" data-button="Got it.">
      <h2>The Editor</h2>
      <p>When you start the test, this box will fill up with a bunch of bad copy, which you'll be able to edit right here in the browser. Clean it up as best you can according to AP style and the Inverse Style Guide. Use 'Cmd-b' to bold and 'Cmd-i' to italicize ('Ctrl-b and Ctrl-i if you're on a PC).</p>
    </li>
    <li data-id = "timer" data-button="Easy peezy.">
      <h2>Timer</h2>
      <p>You'll have two hours to do as much correcting as possible. This timer will start when you start the test and will count down to 0:00, at which point you won't be able to change any more copy. If it's distracting you, hover over it to bring up a hide button. You can always reopen it later.</p>
    </li>
    <li data-id = "submit" data-button="Sounds good.">
      <h2>Submit</h2>
      <p>When you're done (or when time is up), you'll find this Submit button at the BOTTOM of the page. Click it to send the copy to our recruiting editor, Hannah Margaret Allen.</p>
    </li>
    <li data-id="start" data-button="I'm ready.">
      <h2>Start 'er up.</h2>
      <p>When you're ready, you can click 'Begin' to start the test.</p>
    </li>
  </ol>

  <!--jQuery and Joyride-->
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="./js/jquery.cookie.js"></script>
  <script type="text/javascript" src="./js/modernizr.mq.js"></script>
  <script type="text/javascript" src="./js/jquery.joyride-2.1.js"></script>

  <script>
    /***************************************************************************
    * Joyride
    ***************************************************************************/
    $(window).load(function() {
      $("#joyride_tour").joyride({
        autoStart : true,
        modal:true,
      });
    });

    /****************************************************
    * Timer
    ****************************************************/
      // UX Bits
      $("#timer").hover(function() {
        $("#hideTimer").fadeIn("fast");
      }, function() {
        $("#hideTimer").fadeOut("fast");
      });

      function toggleTimer() {
        if ($("#timer").is(":visible")) {
          $("#timer").fadeOut(400, function() {
            $("#show_timer").fadeIn(500);
          });
        } else {
          $("#show_timer").fadeOut(400, function() {
            $("#timer").fadeIn();
          });
        }
      }

      // Takes parameter of how much time passed when site was open but test was not
      function startTest(openTime) {

          // Hide the now-useless Start Test button
          $("#start").fadeOut(400, function() {
            $("#copy").fadeIn();
          });

          // Make copy editable
          document.getElementById("copy").contentEditable = true;

          // Run test for two hours
          var timer = setInterval(countdown, 1000); // Update timer every second

          function countdown() {

            // Start clock only when they open the test
            timeIn = performance.now() - openTime;

            // Shut it down at two minutes (to be hours)
            if (timeIn > 120000) {
              setTimeout(testOver, 0);
              document.getElementById("timer").innerHTML = "Pencils down!";
            }

            /*
            * Current minute is remainder of number of seconds
            * the quiz has been open divided by 60, then
            * subtracted from 60, then rounded up. Trust me — it works.
            */
            mins = 60 - Math.floor((timeIn / 1000) % 60);
            hrs = 1 - Math.floor(timeIn / 60000);

            // Update view
            document.getElementById("minutes").innerHTML = ('0' + mins).slice(-2) + " min";
            document.getElementById('hours').innerHTML = hrs + " hr";
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
