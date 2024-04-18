<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

// $cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
// $cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.min.css');
		echo $this->Html->css('jquery-confirm.css');
		echo $this->Html->css('font-awesome.min.css');
		echo $this->Html->css('font-awesome-animation.css');
		echo $this->Html->css('bootstrap-timepicker.min.css');
		echo $this->Html->css('datepicker3.css');
		echo $this->Html->css('daterangepicker-bs3.css');		
		
		echo $this->Html->script('jquery-2.1.4.min.js');
		echo $this->Html->script('bootstrap.js');
		echo $this->Html->script('jquery-confirm.js');		
		echo $this->Html->script('bootstrap-datepicker.js');		
		echo $this->Html->script('bootstrap-timepicker.min.js');		
		echo $this->Html->script('daterangepicker.js');		
		echo $this->Html->script('icheck.min');		
		echo $this->Html->script('jquery.autocomplete.js');		
		echo $this->Html->script('jquery.inputmask.js');

		echo $this->Html->script('script');
		echo $this->Html->css('style');
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	
	<div id="container">
		<div id="header">
			<ul>
				<li><a class="active" href="<?php echo $this->webroot; ?>EmployeeList">Employee List</a></li>
				<li><a href="<?php echo $this->webroot; ?>Registration">Employee Registration</a></li>
				<li style="float:right"><a href="<?php echo $this->webroot; ?>Login">Logout</a></li>
				<li style="float:right">
				<span style = "color:green;display:inline-block;padding:14px 16px;">
				<?php 
					$login_name = $this->Session->read('LOGINNAME');
					echo "Welcome ".$login_name;
				?>
				</span>
				</li>
			</ul>
		</div>	
		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			
		</div>
	</div>
</body>
</html>
