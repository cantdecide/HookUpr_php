<?php
require_once('functions.php');

$stylesheets = ['home.css'];
show_header('HookUpr', $stylesheets);
?>

      <div id="homeContent">
      <div id="welcomeText">
        <h2>Welcome</h2>
        <p>
          HookUpr is a handy website to track all of your intimate encounters. Whether you need to remember their name at a party, or if you simply want to be able to reminisce about old times, HookUpr is the place for you.
        </p>
      </div>
      <div id="getStarted">
          <button type="checkbox" id="button" class="hidden"></button>
        	<label for="button" class="button">Get Started</label>
      </div>
    </div>
  </div>
  <script>
    document.getElementById("button").addEventListener("click", goToHookupr);
    function goToHookupr() {
      window.location.href="hookupr.php";
    }
  </script>
  </body>
</html>
