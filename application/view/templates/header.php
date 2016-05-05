<div class="header">
	<div class="menu">
		<a href="<?php echo Config::get('URL'); ?>dashboard"><img src="<?php echo Config::get('URL'); ?>images/logo-light.png"></a>
		<input type="checkbox" id="toggle">
		<label for="toggle" class="spinner">
			<div class="diagonal1"></div>
			<div class="horizontal"></div>
			<div class="diagonal2"></div>
		</label>
		<ul class="nav">
		<li class="profile-info"><a <?php if ($this->menu_selected == 'profile') {echo "class='selected' ";} ?>href="<?php echo Config::get('URL'); ?>profile"><span><?php echo Session::get('user_name'); ?></span></a></li>
			<li><a <?php if ($this->menu_selected == 'dashboard') {echo "class='selected' ";} ?>href="<?php echo Config::get('URL'); ?>dashboard/index">inicio</a></li>
			<li><a <?php if ($this->menu_selected == 'users') {echo "class='selected' ";} ?>href="<?php echo Config::get('URL'); ?>users/index">users</a></li>
			<li><a href="<?php echo Config::get('URL'); ?>login/logout"><span>Logout</span></a></li>
		</ul>
	</div>
</div>