<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <?php foreach($stylesheets as $stylesheet) { ?>
		<link rel="stylesheet" href="<?= $stylesheet ?>">
	<?php } ?>
  </head>
  <body>
    <div class="container">
      <header>
        <div id="nav">
          <div class="navClass" id="logo"><a href="index.php"><img src="images/tinyLogo.png" alt="logo"/></a></div>
          <h1>HookUpr</h1>
          <div id="navItems">
          <div class="navClass" id="home"><a href="index.php">Home</a></div>
          <div class="navClass" id="about"><a href="about.php">About</a></div>
          <div class="navClass" id="contact"><a href="contact.php">Contact</a></div>
        </div>
      </header>
