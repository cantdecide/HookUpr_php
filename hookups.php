<?php
require_once('functions.php');
show_header('HookUpr');

try {
	$user = 'hookupr_net';
	$password = 'william';
	$db = new PDO('mysql:host=hookupr.net.mysql;dbname=hookupr_net', $user, $password);
} catch (PDOException $e) {
	print "Couldn't connect: " . $e->getMessage();
}

if ('POST' == $_SERVER['REQUEST_METHOD']) {
	if (isset($_POST['delete'])) {
		$stmt = $db->prepare('DELETE FROM hookups WHERE id=' . $_POST['delete']);
		$stmt->execute();
		print "<div id='deleted'>Hookup deleted. <span id='x' onclick='hide_alert()'>x</span></div>";
		show_hookups();
	} else {
		$errors = [];
		$values['name'] = $_POST['name'] ?? '';
		$values['age'] = $_POST['age'] ?? '';
		$values['personality'] = $_POST['personality'] ?? '';
		$values['attraction'] = $_POST['attraction'] ?? '';
		$values['orgasm'] = $_POST['orgasm'] ?? '';
		$values['dick'] = $_POST['dick'] ?? '';
		$values['cum'] = $_POST['cum'] ?? '';
		$values['cuddle'] = $_POST['cuddle'] ?? '';
		$errors = get_errors($values);

		if (! empty($errors)) {
			$values['name'] = encode($values['name']);
			show_form($errors, $values);
		} else {
			$values = validate_form($values);
		}
		if (isset($_POST['update'])) {
			$cmd = 'UPDATE hookups SET name="' . $values[0] . '"';
			$cmd .= ', age=' . $values[1];
			$cmd .= ', personality=' . $values[2];
			$cmd .= ', attraction=' . $values[3];
			$cmd .= ', orgasm=' . $values[4];
			$cmd .= ', dick=' . $values[5];
			$cmd .= ', cum=' . $values[6];
			$cmd .= ', cuddle=' . $values[7];
			$cmd .= ' WHERE id=' . $_POST['update'];
			$stmt = $db->prepare($cmd);
			$stmt->execute();
			print "<div id='deleted'>Hookup updated. <span id='x' onclick='hide_alert()'>x</span></div>";
			show_hookups();
		} else {
			$stmt = $db->prepare('INSERT INTO hookups (name, age, personality, attraction, orgasm, dick, cum, cuddle) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
			$stmt->execute($values);
			show_hookups();
		}
	}
} else {
	show_hookups();
}
?>
</div>
<script>
	function hide_alert() {
		var $alert = document.getElementById('deleted');
		$alert.style.visibility = 'hidden';
	}
</script>
</body>
</html>
