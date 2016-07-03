<?php
function show_header($title, $stylesheets = ['main.css']) {
	include_once('header.php');
}

function show_hookups() {
	include_once('table.php');
}

function show_form($errors = [], $values = []) {
	include_once('form.php');
}

function get_errors($values) {
	$errors = [];
	$name = trim($values['name']);
	if (strlen($name) < 1 || strlen($name) > 30) {
		$errors[] = 'Name must be between 1-30 characters';
	}
	$age = (int)$values['age'];
	if (! is_int($age)) {
		$errors[] = 'Age must be an integer';
	} else if ($age == 0) {
		$errors[] = 'Age cannot be zero';
	} else if ($age < 0) {
		$errors[] = 'Age cannot be less than zero';
	}
	if ($values['age'] > 2000000000) {
		$errors[] = 'Age cannot be greater than ' . number_format(2000000000);
	}
	if (! empty(validate_ranking('personality', $values))) {
		$errors[] = validate_ranking('personality', $values);
	}
	if (! empty(validate_ranking('attraction', $values))) {
		$errors[] = validate_ranking('attraction', $values);
	}
	if (! empty(validate_ranking('orgasm', $values))) {
		$errors[] = validate_ranking('orgasm', $values);
	}
	if (! empty(validate_ranking('dick', $values))) {
		$errors[] = validate_ranking('dick', $values);
	}
	if ($values['cuddle'] = '' || $values['cum'] = '') {
		$errors[] = 'Checkboxes must either be checked or unchecked';
	}
	return $errors;
}

function validate_ranking($name, $values) {
	if (! in_array($values[$name], [1, 2, 3, 4, 5])) {
		$ucname = ucfirst($name);
		$error = "$ucname ranking is required";
	} else {
		$error = '';
	}
	return $error;
}

function validate_form($values) {
	$values['name'] = encode($values['name']);
	if ($values['cum'] == 'on') {
		$values['cum'] = 1;
	} else {
		$values['cum'] = 0;
	}
	if ($values['cuddle'] == 'on') {
		$values['cuddle'] = 1;
	} else {
		$values['cuddle'] = 0;
	}

	// switch back to normal number-indexed array
	$new_values = [$values['name'],
				   $values['age'],
				   $values['personality'],
				   $values['attraction'],
				   $values['orgasm'],
				   $values['dick'],
				   $values['cum'],
				   $values['cuddle']];
	return $new_values;
}

function encode($s) {
	return htmlentities($s);
}
?>
