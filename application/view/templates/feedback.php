<?php

$feedback_positive = Session::get('feedback_positive');
$feedback_negative = Session::get('feedback_negative');
$feedback_warning = Session::get('feedback_warning');
$feedback_info = Session::get('feedback_info');

if (isset($feedback_positive)) {
	foreach ($feedback_positive as $feedback) {
?>
<div class="notification success">
	<span class="icon-success"></span>
		<div class="message"><?php echo $feedback; ?></div>
</div>
<?php
	}
}

if (isset($feedback_negative)) {
	foreach ($feedback_negative as $feedback) {
?>
<div class="notification error">
	<span class="icon-error"></span>
		<div class="message"><?php echo $feedback; ?></div>
</div>
<?php
	}
}

if (isset($feedback_warning)) {
	foreach ($feedback_warning as $feedback) {
?>
<div class="notification warning">
	<span class="icon-warning"></span>
		<div class="message"><?php echo $feedback; ?></div>
</div>
<?php
	}
}

if (isset($feedback_info)) {
	foreach ($feedback_info as $feedback) {
?>
<div class="notification info">
	<span class="icon-info"></span>
		<div class="message"><?php echo $feedback; ?></div>
</div>
<?php
	}
}

?>