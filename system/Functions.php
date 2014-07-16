<?php
	function requirePath($path){
		foreach (glob($path . "/*.php") as $filename){
		    require_once $filename;
		}
	}
?>