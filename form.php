<div class="app">
<?php if (! empty($errors)) { ?>
	<div class="errors">
		<p>Please fix the following errors:</p>
		<ul>
			<?php foreach ($errors as $error) { ?>
				<li><?= $error ?> </li>
			<?php } ?>
		</ul>
	</div>
<?php } ?>
<h3>New Hookup</h3>
<form id="mainForm" method="post" action="hookups.php">
<div id="textFields">
<input class="inline" id="nameField" type="text" name="name" placeholder="Name" required><br>
<!-- TODO: Fix size of age input -->
<input class="inline" id="ageField" type="number" name="age" placeholder="Age" size="2" required><br>
</div>
  <p>Personality</p>
  <input type="radio" id="p1" name="personality" value="1"><label for="p1">1</label>
  <input type="radio" id="p2" name="personality" value="2"><label for="p2">2</label>
  <input type="radio" id="p3" name="personality" value="3"><label for="p3">3</label>
  <input type="radio" id="p4" name="personality" value="4"><label for="p4">4</label>
  <input type="radio" id="p5" name="personality" value="5"><label for="p5">5</label>
  <p>Level of Attraction</p>
  <input type="radio" id="a1" name="attraction" value="1"><label for="a1">1</label>
  <input type="radio" id="a2" name="attraction" value="2"><label for="a2">2</label>
  <input type="radio" id="a3" name="attraction" value="3"><label for="a3">3</label>
  <input type="radio" id="a4" name="attraction" value="4"><label for="a4">4</label>
  <input type="radio" id="a5" name="attraction" value="5"><label for="a5">5</label>
  <p>Intenseness of Orgasm</p>
  <input type="radio" id="o1" name="orgasm" value="1"><label for="o1">1</label>
  <input type="radio" id="o2" name="orgasm" value="2"><label for="o2">2</label>
  <input type="radio" id="o3" name="orgasm" value="3"><label for="o3">3</label>
  <input type="radio" id="o4" name="orgasm" value="4"><label for="o4">4</label>
  <input type="radio" id="o5" name="orgasm" value="5"><label for="o5">5</label>
  <p>Dick</p>
  <input type="radio" id="d1" name="dick" value="1"><label for="d1">1</label>
  <input type="radio" id="d2" name="dick" value="2"><label for="d2">2</label>
  <input type="radio" id="d3" name="dick" value="3"><label for="d3">3</label>
  <input type="radio" id="d4" name="dick" value="4"><label for="d4">4</label>
  <input type="radio" id="d5" name="dick" value="5"><label for="d5">5</label>
  <br>
  <div class="yesno">
	<input name="cum" class ="checkbox" type="checkbox" id="cum">
	<label for="cum">Did you cum?</label>
	<br>
	<input name="cuddle" class ="checkbox" type="checkbox" id="cuddle">
	<label for="cuddle">Did you cuddle afterwards?</label>
  </div>
  <input class="submit" type="submit" value="Add Hookup">
</form>
</div>
</div>
</body>
</html>
