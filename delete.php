<?php
require_once('functions.php');
show_header('HookUpr');

try {
	$db = new PDO('mysql:host=hookupr.net.mysql;dbname=hookupr_net', 'hookupr_net', 'william');
} catch (PDOException $e) {
	print "Couldn't connect: " . $e->getMessage();
}

$q = $db->query('SELECT * FROM hookups WHERE id=' . $_GET['id']);
$rows = $q->fetchAll();
?>

<h1 class="sure">
	Are you sure you want to delete this hookup?
</h1>
<table class="all-hookups tbl-delete">
	<thead>
		<tr>
			<td>Name</td>
			<td>Age</td>
			<td>Personality</td>
			<td>Attraction</td>
			<td>Orgasm</td>
			<td>Dick</td>
			<td>Did you cum?</td>
			<td>Did you cuddle afterwards?</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<?php $row = $rows[0] ?>
			<td><?= $row['name'] ?></td>
			<td><?= $row['age'] ?> </td>
			<td><?= $row['personality'] ?> </td>
			<td><?= $row['attraction'] ?> </td>
			<td><?= $row['orgasm'] ?> </td>
			<td><?= $row['dick'] ?> </td>
			<td><?php if ($row['cum']) {
				echo 'Yes';
			} else {
				echo 'No';
			} ?> </td>
			<td><?php if ($row['cuddle']) {
				echo 'Yes';
			} else {
				echo 'No';
			} ?> </td>
	</tbody>
</table>
	<form id="my_form" class="bottom-buttons" method="post" action="hookups.php">
		<a href="hookups.php">Cancel</a>
		<a href="javascript:{}" onclick="document.getElementById('my_form').submit(); return false;">Delete</a>
		<br>
		<input type="text" name="delete" value="<?= $_GET['id'] ?>">
	</form>
</body>
</html>
