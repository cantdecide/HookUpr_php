<?php
try {
	$db = new PDO('mysql:host=hookupr.net.mysql;dbname=hookupr_net', 'hookupr_net', 'william');
} catch (PDOException $e) {
	print "Couldn't connect: " . $e->getMessage();
}

$q = $db->query('SELECT * FROM hookups ORDER BY id');
$rows = $q->fetchAll();
?>
<br><br>
<table class="all-hookups">
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
<?php foreach ($rows as $row) { ?>
	<tr>
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
		<td><a class="underline" href="hookupr.php?id=<?= $row['id'] ?>">Edit</a>&nbsp;
			<a class="underline" href="delete.php?id=<?= $row['id'] ?>">Delete</a></td>
	</tr>
<?php } ?>
<tr>
	<td colspan=9><a class="underline" href="hookupr.php">Add Hookup</a></td>
</tr>
	</tbody>
</table>
