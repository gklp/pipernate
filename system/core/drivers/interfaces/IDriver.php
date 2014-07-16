<?php
	interface IDriver{
		public function connect();
		public function selectDatabase();
		public function executeQuery($query);
		public function getResultCount($dataset);
		public function getFetchAssoc($dataset);
		public function getFetchArray($dataset);
		public function getColumnNames($dataset);
		public function getAffectedRows();
		public function getEscapedString($unescaped_string);
		public function getNextInsertID($table);
		public function getCellValue($dataset, $num, $columnName);
		public function close();
	}
?>