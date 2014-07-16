<?php
	class SqlCommandUtils{
		public function cleanUnescapedString($unescapedString){
			$patterns = array(	'/\'/', 
								'/"/');
			$replaces = array(	'\\\'', '\\"');
			$escapedString = preg_replace($patterns, $replaces, $unescapedString);
			return $escapedString;
		}
	} 
?>