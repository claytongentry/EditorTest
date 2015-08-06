<!--
*
* INVERSE Edit Test Application
* Developed by Clayton Gentry, claytongentry.com
* July 12, 2015
*
-->

<?php require('templates/header.php'); ?>

  <div class = "container">
    <!--Identification-->
    <div class = "col-md-12">
      <div id = "id_box">
        <form name = "id_form" id = "id_form" method = "post" role = "form" data-toggle = "validator">
          <p>Select a test</p>
          <div class = "form-group">
            <div class = "radio">
              <p><input type="radio" name = "test_type" value = "copyeditor" onclick = "selectTest('copyeditor');" required> Copyeditor</input></p>
            </div>
            <div class = "radio">
              <p><input type="radio" name = "test_type" value = "writer" onclick = "selectTest('writer1');" required> Writer 1</input></p>
            </div>
            <div class = "radio">
              <p><input type="radio" name = "test_type" value = "writer" onclick = "selectTest('writer2');" required> Writer 2</input></p>
            </div>
            <div class = "radio">
              <p><input type="radio" name = "test_type" value = "writer" onclick = "selectTest('writer3');" required> Writer 3</input></p>
            </div>
            <div class = "radio">
              <p><input type="radio" name = "test_type" value = "writer" onclick = "selectTest('writer4');" required> Writer 4</input></p>
            </div>
            <div class = "radio">
              <p><input type="radio" name = "test_type" value = "writer" onclick = "selectTest('writer5');" required> Writer 5</input></p>
            </div>
          </div>
          <div class = "form-group">
            <input id = "id_submit" value = "Go!" style = "cursor: pointer;"></input>
          </div>
        </form>
      </div>
    </div>

    <div class="test_container" style = "display: none;">

      <!--Header-->
      <div class="row" id = "head">
        <div class="header col-md-8">
          <h1>Inverse Edit Test</h1>
        </div>
        <div class="header col-md-4" id="timer">
          <p><span id="hours">2 hr</span>, <span id="minutes">00 min</span></p>
          <button id="hideTimer" onclick="toggleTimer()"><i class="fa fa-times-circle fa-8x"></i></button>
        </div>
        <div class="header col-md-4" id="show_timer" onclick="toggleTimer()">
          <p>Show timer</p>
        </div>
      </div>

      <!-- Editor Container-->
      <div class="row" id="copy_begin">
        <div class="col-md-12">
          <form id="copy_form" method="post" onsubmit="return copyCopy()" action=<?php echo htmlspecialchars('mailer/submit.php');?>>

            <!-- "Begin" Button-->
            <div class="row" id="button_holder">
              <button id="start" type="button" onclick="startTest(performance.now())"><p>Begin</p></button>
            </div>

            <!--Test Copy-->
            <div id = "copy" spellcheck = "false">

              <div id = "copyeditor_copy" style = "display: none;">
                <h1><strong>This is the copy editing test.</strong></h1>
                <h4>No current test in progress.</h4>
                <hr/>
                <p>
                </p><p>
                </p><p></p>
              </div>

              <div id = "writer1_copy" style = "display: none;">
                <h1><strong>This Is the Writer Test</strong></h1>
                <h4>Prompt: Hugo Gernsbeck’s 131st birthday is on August 14. Write a brief post about why his work and legacy are still relevant today.</h4>
                <hr/>
                <p></p>
              </div>

              <div id = "writer2_copy" style = "display: none;">
                <h1><strong>This Is the Writer Test</strong></h1>
                <h4>Prompt: Please break down the trailer for “The Intern” in order to give us a sense of what to expect from that film and what it might signify about attitudes toward start-up culture.</h4>
                <hr/>
                <p></p>
              </div>

              <div id = "writer3_copy" style = "display: none;">
                <h1><strong>This Is the Writer Test</strong></h1>
                <h4>Prompt: Please write a story about the future of air conditioning. It does not need to be all encompassing and should posit a specific theory.</h4>
                <hr/>
                <p></p>
              </div>

              <div id = "writer4_copy" style = "display: none;">
                <h1><strong>This Is the Writer Test</strong></h1>
                <h4>Prompt: Please write a story about the Mars Reconnaissance Rover. What was its significance, if any?</h4>
                <hr/>
                <p></p>
              </div>

              <div id = "writer5_copy" style = "display: none;">
                <h1><strong>This Is the Writer Test</strong></h1>
                <h4>There are two parts:<br/>
                  1.) Please pitch eight stories. Four of the stories should be relatively quick news hits (one or no sources) and four of them should be either "thought scoops" or reported pieces. To get a better grasp of what’s our wheelhouse, just peruse the website.<br/>
                  2.) Write a timely 400-word long piece from one of your above pitches. Your article should have an angle and be based on aggregated information. Please write a hed and dek for it as well — just for good measure.</h4>
                <hr/>
                <p></p>
              </div>

              <textarea id="hidden_copy" name="hidden" display="none"></textarea>

              <br/>

              <div class="form-actions">
                <button id="submit">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <ol style="display: none" id="joyride_tour" data-joyride>
    <li data-class="header" data-button="Okay.">
      <h2>Hey!</h2>
      <p>Welcome to the Inverse Edit Test. It's nothing fancy, but let me show you around before we get started.</p>
    </li>
    <li data-id="copy_form" data-button="Got it.">
      <h2>The Editor</h2>
      <p>When you start the test, this box will fill up with your prompt. You can click the prompt text and enter your response right here in the browser. If you need it, you can use 'Cmd-b' to bold and 'Cmd-i' to italicize ('Ctrl-b and Ctrl-i if you're on a PC).</p>
    </li>
    <li data-id="timer" data-button="Easy peezy.">
      <h2>Timer</h2>
      <p>You'll have two hours to do as much correcting as possible. This timer will start when you start the test and will count down to 0:00, at which point you won't be able to change any more copy. If it's distracting you, hover over it to bring up a hide button. You can always reopen it later.</p>
    </li>
    <li data-id="copy_form" data-button="Sounds good.">
      <h2>Submit</h2>
      <p>When you're done (or when time is up), you'll find a Submit button at the BOTTOM of the page. Click it to send the copy to our editorial coordinator, Hannah Margaret Allen.</p>
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
    * Test Selection
    * Copyeditor or Writer?
    ***************************************************************************/
    function selectTest(type) {
      if (type != null) {
        document.getElementById(type + "_copy").style.display = "block";
      }
    }


    /***************************************************************************
    * Joyride Walkthrough
    ***************************************************************************/
    $("#id_submit").click(function() {
      $("#id_box").fadeOut(function() {
        $(".test_container").fadeIn(function() {
          $("#joyride_tour").joyride({
            autoStart : true,
            modal:true
          });
        });
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
          $("#timer").fadeOut(function() {
            $("#show_timer").fadeIn();
          });
        } else {
          $("#show_timer").fadeOut(function() {
            $("#timer").fadeIn();
          });
        }
      }

      /*
      * Takes parameter of how much time passed when site was open but before test begun
      * Allows us to use high-res time (performance.now()) but w/ delayed start
      */
      function startTest(openTime) {

          // Hide the now-useless Start Test button
          $("#start").fadeOut(function() {
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
            if (timeIn > 3600000) {
              setTimeout(testOver, 0);
              document.getElementById("timer").innerHTML = "Pencils down!";
            }

            /*
            * Current minute is remainder of number of seconds
            * the quiz has been open divided by 60, then
            * subtracted from 59, then rounded up. Trust me — it works.
            */
            mins = 59 - Math.floor((timeIn / 60000) % 60);
            hrs = 1 - Math.floor((timeIn / 3600000) % 2);

            // Update view
            document.getElementById("minutes").innerHTML = ('0' + mins).slice(-2) + " min";
            document.getElementById('hours').innerHTML = hrs + " hr";
          }

          function testOver() {
            clearInterval(timer);
            document.getElementById("copy").contentEditable = false;
          }

      }

      /****************************************************
      * Copy Prep for PHP Mailing
      ****************************************************/
      function copyCopy() {

        // Copy content from editable (but non-mailable) div element to non-editable (but mailable) form element
        if ($("#copyeditor_copy").is(":visible"))
          document.getElementById("hidden_copy").value = document.getElementById("copyeditor_copy").innerHTML;
        else if ($("#writer_copy").is(":visible"))
          document.getElementById("hidden_copy").value = document.getElementById("writer_copy").innerHTML;
        else
          console.log("But where's the copy?!");

        // Make sure it actually copied
        if (document.getElementById("hidden_copy").value)
          return true;
        else
          return false;

      }
  </script>

<?php require('templates/footer.php'); ?>
