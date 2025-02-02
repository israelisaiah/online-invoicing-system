<?php
	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	include_once("{$currDir}/header.php");

	$current_user = Request::val('currentUser', false);
	$username = is_allowed_username(Request::val('memberID'), $current_user);
?>

<style>
	nav, .hidden-print{ display: none; }
</style>

<div style="height: 1em;"></div>
<?php if($username) { ?>
	<div class="alert alert-success">
		<i class="glyphicon glyphicon-ok"></i>
		<?php echo str_replace('<MemberID>', "<b>{$username}</b>", $Translation['user available']); ?>
		<span data-result="username-available"></span>
	</div>
<?php } else { ?>
	<div class="alert alert-danger">
		<i class="glyphicon glyphicon-warning-sign"></i>
		<?php echo str_replace('<MemberID>', '<b>' . html_attr(Request::val('memberID')) . '</b>', $Translation['username invalid']); ?>
		<span data-result="username-unavailable"></span>
	</div>
<?php } ?>

<div class="text-center">
	<input type="button" value="Close" onClick="window.close();" autofocus class="btn btn-default btn-lg">
</div>

<?php include_once("{$currDir}/footer.php"); ?>
