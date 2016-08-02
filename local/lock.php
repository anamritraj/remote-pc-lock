<?php
if(exec("python python-scripts/lock.py")){
	echo '{
		"success" : 1
	}';
}else{
	echo '{
		"success" : 0
	}';
}
?>