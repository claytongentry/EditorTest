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
          <p>I am a...</p>
          <div class = "form-group">
            <div class = "radio">
              <p><input type="radio" name = "test_type" value = "copyeditor" onclick = "selectTest('copyeditor');" required> Copyeditor</input></p>
            </div>
            <div class = "radio">
              <p><input type="radio" name = "test_type" value = "writer" onclick = "selectTest('writer');" required> Writer</input></p>
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
          <p><span id="hours">1 hr</span>, <span id="minutes">59 min</span></p>
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
                <h1><strong>This Is the Copyeditor Test</strong></h1>
                <h4>Every man can aspire to be a little more Hardy in their lives.</h4>
                <hr/>
                <p>Last week, we celebrated the 30th anniversary of “Sussudio,” Phil Collins’s breakout single and a personal favorite of American Psycho ‘s Patrick Bateman. Throughout the film, Bateman waxes poetic about his favorite musicians. Most famously, he sings the praises of Huey Lewis and the News before taking an axe to Jared Leto’s Paul Allen.
                </p><p>Bateman’s taste is reflective of the corporate ‘80s. He didn’t like Huey Lewis and the News when they were “a little too new wave,” but their next album, with “a clear, crisp sound and a new sheen of consummate professionalism,” was just for him. Later, he professes his love for Genesis’ sincere lyrics, like on “‘In Too Deep,’ the most moving pop song of the 1980s…about monogamy and commitment.” Finally, he is astounded by the success of Whitney Houston’s self-titled debut, which had four No. 1 singles. His favorite of the four is “The Greatest Love of All,” a song about “self-preservation, dignity.”
                </p><p>Bateman’s taste was perfect for his time. But what would he listen to today?</p>
              </div>

              <div id = "writer_copy" style = "display: none;">
                <h1><strong>This Is the Writer Test</strong></h1>
                <h4>Every man can aspire to be a little more Hardy in their lives.</h4>
                <hr/>
                <p>Last week, we celebrated the 30th anniversary of “Sussudio,” Phil Collins’s breakout single and a personal favorite of American Psycho ‘s Patrick Bateman. Throughout the film, Bateman waxes poetic about his favorite musicians. Most famously, he sings the praises of Huey Lewis and the News before taking an axe to Jared Leto’s Paul Allen.
                </p><p>Bateman’s taste is reflective of the corporate ‘80s. He didn’t like Huey Lewis and the News when they were “a little too new wave,” but their next album, with “a clear, crisp sound and a new sheen of consummate professionalism,” was just for him. Later, he professes his love for Genesis’ sincere lyrics, like on “‘In Too Deep,’ the most moving pop song of the 1980s…about monogamy and commitment.” Finally, he is astounded by the success of Whitney Houston’s self-titled debut, which had four No. 1 singles. His favorite of the four is “The Greatest Love of All,” a song about “self-preservation, dignity.”
                </p><p>Bateman’s taste was perfect for his time. But what would he listen to today?</p>
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
      <p>When you start the test, this box will fill up with a bunch of bad copy, which you'll be able to edit right here in the browser. Clean it up as best you can according to AP style and the Inverse Style Guide. Use 'Cmd-b' to bold and 'Cmd-i' to italicize ('Ctrl-b and Ctrl-i if you're on a PC).</p>
    </li>
    <li data-id="timer" data-button="Easy peezy.">
      <h2>Timer</h2>
      <p>You'll have two hours to do as much correcting as possible. This timer will start when you start the test and will count down to 0:00, at which point you won't be able to change any more copy. If it's distracting you, hover over it to bring up a hide button. You can always reopen it later.</p>
    </li>
    <li data-id="copy_form" data-button="Sounds good.">
      <h2>Submit</h2>
      <p>When you're done (or when time is up), you'll find a Submit button at the BOTTOM of the page. Click it to send the copy to our recruiting editor, Hannah Margaret Allen.</p>
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

      return type;
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
        test = selectTest(type);
        console.log(test);
        document.getElementById("hidden_copy").value = document.getElementById(test + "_copy").innerHTML;

        // Make sure it actually copied
        if (document.getElementById("hidden_copy").value)
          return true;
        else
          return false;

      }
  </script>

<?php require('templates/footer.php'); ?>
