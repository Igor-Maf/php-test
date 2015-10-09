<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php 
		require_once("user.model.php"); 
		require_once("user.controller.php"); 

		$persons = new UserController;
	?>

	<section class="container">
		<h2>Users array</h2>
		<pre class="section"><?php var_dump($persons->getUsers()); ?></pre>

		<form method="POST" action="<?php $_PHP_SELF ?>" class="section">
			<div class="form-group">
				<label for="oldNickname">Select user</label>
				<select id="oldNickname" name="oldNickname" required>
					<option value="0">Select user</option>
					<?php 
						foreach($persons->getUsers() as $id => $name) {
							$selected = ($_POST['oldNickname'] == $id) ? 'selected' : '';

							echo '<option 
									value="' . $id .'" 
									' . $selected . ' ">' . $name . '</option>';
						}
					?>
				</select>
			</div>

			<div class="form-group">
				<label for="newNickname">New nickname</label>
				<input id="newNickname" name="newNickname" value="" pattern=".{3,20}" required>
			</div class="form-group">

			<div class="form-group">
				<input type="submit" name="submit" value="Change">
			</div>
			
			<?php if ($persons->getMsg()) : ?>
				<p class='<?php echo ($persons->getMsgType()) ? "success" : "error"; ?> section'>
					<?php echo $persons->getMsg(); ?>
				</p>
			<?php endif; ?>	
		</form>
	</section>
</body>
</html>