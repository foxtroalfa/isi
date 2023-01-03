<?php
require_once('_sys/init.php');
if($argv[1]=='uninstall'):
	uninstall();
else:
	Mapper::run();
endif;
?>