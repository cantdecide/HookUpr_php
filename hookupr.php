<?php
require_once('functions.php');
show_header('HookUpr');

if (isset($_GET['id'])) {
	try {
		$db = new PDO('mysql:host=hookupr.net.mysql;dbname=hookupr_net', 'hookupr_net', 'william');
	} catch (PDOException $e) {
		print "Couldn't connect: " . $e->getMessage();
	}

	$q = $db->query('SELECT * FROM hookups WHERE id=' . $_GET['id']);
	$rows = $q->fetchAll();
	$hookup = $rows[0];
}
$h = isset($hookup['id']);
?>

      <div class="app">
        <h3>New Hookup</h3>
		<form id="mainForm" method="post" action="hookups.php">
        <div id="textFields">
        <input class="inline" id="nameField" type="text" name="name" value="<?php if($h) {echo $hookup['name'];} ?>" placeholder="Name" required><br>
        <!-- TODO: Fix size of age input -->
        <input class="inline" id="ageField" type="number" name="age" value="<?php if($h) {echo $hookup['age'];} ?>"placeholder="Age" size="2" required><br>
        </div>
          <p>Personality</p>
          <input type="radio" id="p1" name="personality" value="1" <?php if($h) { if($hookup['personality'] == 1) { echo 'checked="checked"';}} ?>><label for="p1">1</label>
          <input type="radio" id="p2" name="personality" value="2" <?php if($h) { if($hookup['personality'] == 2) { echo 'checked="checked"';}} ?>><label for="p2">2</label>
          <input type="radio" id="p3" name="personality" value="3" <?php if($h) { if($hookup['personality'] == 3) { echo 'checked="checked"';}} ?>><label for="p3">3</label>
          <input type="radio" id="p4" name="personality" value="4" <?php if($h) { if($hookup['personality'] == 4) { echo 'checked="checked"';}} ?>><label for="p4">4</label>
          <input type="radio" id="p5" name="personality" value="5" <?php if($h) { if($hookup['personality'] == 5) { echo 'checked="checked"';}} ?>><label for="p5">5</label>
          <p>Level of Attraction</p>
          <input type="radio" id="a1" name="attraction" value="1" <?php if($h) { if($hookup['attraction'] == 1) { echo 'checked="checked"';}} ?>><label for="a1">1</label>
          <input type="radio" id="a2" name="attraction" value="2" <?php if($h) { if($hookup['attraction'] == 2) { echo 'checked="checked"';}} ?>><label for="a2">2</label>
          <input type="radio" id="a3" name="attraction" value="3" <?php if($h) { if($hookup['attraction'] == 3) { echo 'checked="checked"';}} ?>><label for="a3">3</label>
          <input type="radio" id="a4" name="attraction" value="4" <?php if($h) { if($hookup['attraction'] == 4) { echo 'checked="checked"';}} ?>><label for="a4">4</label>
          <input type="radio" id="a5" name="attraction" value="5" <?php if($h) { if($hookup['attraction'] == 5) { echo 'checked="checked"';}} ?>><label for="a5">5</label>
          <p>Intenseness of Orgasm</p>
          <input type="radio" id="o1" name="orgasm" value="1"  <?php if($h) { if($hookup['orgasm'] == 1) { echo 'checked="checked"';}} ?>><label for="o1">1</label>
          <input type="radio" id="o2" name="orgasm" value="2"  <?php if($h) { if($hookup['orgasm'] == 2) { echo 'checked="checked"';}} ?>><label for="o2">2</label>
          <input type="radio" id="o3" name="orgasm" value="3"  <?php if($h) { if($hookup['orgasm'] == 3) { echo 'checked="checked"';}} ?>><label for="o3">3</label>
          <input type="radio" id="o4" name="orgasm" value="4"  <?php if($h) { if($hookup['orgasm'] == 4) { echo 'checked="checked"';}} ?>><label for="o4">4</label>
          <input type="radio" id="o5" name="orgasm" value="5"  <?php if($h) { if($hookup['orgasm'] == 5) { echo 'checked="checked"';}} ?>><label for="o5">5</label>
          <p>Dick</p>
          <input type="radio" id="d1" name="dick" value="1" <?php if($h) { if($hookup['dick'] == 1) { echo 'checked="checked"';}} ?>><label for="d1">1</label>
          <input type="radio" id="d2" name="dick" value="2" <?php if($h) { if($hookup['dick'] == 2) { echo 'checked="checked"';}} ?>><label for="d2">2</label>
          <input type="radio" id="d3" name="dick" value="3" <?php if($h) { if($hookup['dick'] == 3) { echo 'checked="checked"';}} ?>><label for="d3">3</label>
          <input type="radio" id="d4" name="dick" value="4" <?php if($h) { if($hookup['dick'] == 4) { echo 'checked="checked"';}} ?>><label for="d4">4</label>
          <input type="radio" id="d5" name="dick" value="5" <?php if($h) { if($hookup['dick'] == 5) { echo 'checked="checked"';}} ?>><label for="d5">5</label>
          <br>
          <div class="yesno">
            <input name="cum" class ="checkbox" type="checkbox" id="cum" <?php if($h) { if($hookup['cum'] == '1') {echo 'checked="checked"';}} ?>>
            <label for="cum">Did you cum?</label>
            <br>
            <input name="cuddle" class ="checkbox" type="checkbox" id="cuddle" <?php if($h) { if($hookup['cuddle'] == '1') {echo 'checked="checked"';}} ?>>
            <label for="cuddle">Did you cuddle afterwards?</label>
          </div>
		  <input class="submit" type="submit" value="<?php if($h) {echo 'Update Hookup';} else {echo 'Add Hookup';} ?>">
		  <?php if ($h) { echo '<input type="text" name="update" value="' . $_GET['id'] . '">';} ?>
        </form>
        <p id="result">

        </p>
      </div>
    </div>
    <script>
      document.getElementById("button").addEventListener("click", score)
      var isFormDone = (document.getElementById("p1").checked);
      console.log(isFormDone);

      var personalityGroup = new Array(
        document.getElementById("p1"),
        document.getElementById("p2"),
        document.getElementById("p3"),
        document.getElementById("p4"),
        document.getElementById("p5")
      );

      var attractionGroup = new Array(
        document.getElementById("a1"),
        document.getElementById("a2"),
        document.getElementById("a3"),
        document.getElementById("a4"),
        document.getElementById("a5")
      );

      var orgasmGroup = new Array(
        document.getElementById("o1"),
        document.getElementById("o2"),
        document.getElementById("o3"),
        document.getElementById("o4"),
        document.getElementById("o5")
      );

      var dickGroup = new Array(
        document.getElementById("d1"),
        document.getElementById("d2"),
        document.getElementById("d3"),
        document.getElementById("d4"),
        document.getElementById("d5")
      );

      var name, age, personalityRating, attractionRating, orgasmRating, dickRating, compositeScore;
      var didCum = false;
      var didCuddle = false;
      var cumYesno = "No";
      var cuddleYesno = "No";

      function score() {
        checkYesno();
        if (checkForm()) {
          compositeScore = personalityRating + attractionRating + orgasmRating + dickRating;
          if (didCum) {
            compositeScore += 5;
          }
          if (didCuddle) {
            compositeScore += 5;
          }
          console.log("form is complete");
          displayResult();
        } else {
          console.log("form is incomplete");
          document.getElementById("result").innerHTML = "form is incomplete"
        }
      }

      function displayResult() {
        var result = document.getElementById("result");
        result.innerHTML = name + "<br>" + age + "<br>" + "personality: " + personalityRating + "<br>" + "attraction: " + attractionRating + "<br>" + "orgasm: " + orgasmRating + "<br>" + "dick: " + dickRating + "<br>" + "Did you cum? - " + cumYesno + "<br>" + "Did you cuddle afterwards? - " + cuddleYesno + "<br><br>" + "composite score: " + compositeScore;
      }

      function checkForm() {
        if (checkPersonality() && checkAttraction() && checkOrgasm() && checkDick() && checkFields()) {
          return true;
        }
        return false;
      }

      function checkPersonality() {
        for (var i = 0; i < personalityGroup.length; i++) {
          if (personalityGroup[i].checked) {
            personalityRating = parseInt(personalityGroup[i].value);
            return true;
          }
        }
        return false;
      }

      function checkAttraction() {
        for (var i = 0; i < attractionGroup.length; i++) {
          if (attractionGroup[i].checked) {
            attractionRating = parseInt(attractionGroup[i].value);
            return true;
          }
        }
        return false;
      }

      function checkOrgasm() {
        for (var i = 0; i < orgasmGroup.length; i++) {
          if (orgasmGroup[i].checked) {
            orgasmRating = parseInt(orgasmGroup[i].value);
            return true;
          }
        }
        return false;
      }

      function checkDick() {
        for (var i = 0; i < dickGroup.length; i++) {
          if (dickGroup[i].checked) {
            dickRating = parseInt(dickGroup[i].value);
            return true;
          }
        }
        return false;
      }

      function checkFields() {
        var nameField = document.getElementById("nameField");
        var ageField = document.getElementById("ageField");
        if (nameField.value != "" && ageField.value!= "") {
          name = nameField.value;
          age = parseInt(ageField.value);
          return true;
        }
        return false;
      }

      function checkYesno() {
        if (document.getElementById("cum").checked) {
          didCum = true;
          cumYesno = "Yes";
        } else {
          didCum = false;
          cumYesno = "No";
        }
        if (document.getElementById("cuddle").checked) {
          didCuddle = true;
          cuddleYesno = "Yes";
        } else {
          didCuddle = false;
          cuddleYesno = "No";
        }
      }

    </script>
  </body>
</html>
