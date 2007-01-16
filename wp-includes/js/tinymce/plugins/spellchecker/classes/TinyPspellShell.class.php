<?php
/* * 
 * Tiny Spelling Interface for TinyMCE Spell Checking.
 *
 * Copyright � 2006 Moxiecode Systems AB
 *
 */

class TinyPspellShell {
	var $lang;
	var $mode;
	var $string;
	var $error;
	var $errorMsg;

	var $cmd;
	var $tmpfile;

	var $jargon;
	var $spelling;
	var $encoding;

	function TinyPspellShell(&$config, $lang, $mode, $spelling, $jargon, $encoding) {
		$this->lang = $lang;
		$this->mode = $mode;
		$this->error = false;
		$this->errorMsg = array();

		$this->tmpfile = tempnam($config['tinypspellshell.tmp'], "tinyspell");
		$this->cmd = "cat ". $this->tmpfile ." | " . $config['tinypspellshell.aspell'] . " -a --lang=". $this->lang;
	}

	// Returns array with bad words or false if failed.
	function checkWords($wordArray) {
		if ($fh = fopen($this->tmpfile, "w")) {
			fwrite($fh, "!\n");
			foreach($wordArray as $key => $value)
				fwrite($fh, "^" . $value . "\n");

			fclose($fh);
		} else {
			$this->errorMsg[] = "PSpell not found.";
			return array();
		}

		$data = shell_exec($this->cmd);
		@unlink($this->tmpfile);
		$returnData = array();
		$dataArr = preg_split("/\n/", $data, -1, PREG_SPLIT_NO_EMPTY);

		foreach($dataArr as $dstr) {
			$matches = array();

			// Skip this line.
			if (strpos($dstr, "@") === 0)
				continue;

			preg_match("/\& (.*) .* .*: .*/i", $dstr, $matches);

			if (!empty($matches[1]))
				$returnData[] = $matches[1];
		}

		return $returnData;
	}

	// Returns array with suggestions or false if failed.
	function getSuggestion($word) {
		if ($fh = fopen($this->tmpfile, "w")) {
			fwrite($fh, "!\n");
			fwrite($fh, "^$word\n");
			fclose($fh);
		} else
			wp_die("Error opening tmp file.");

		$data = shell_exec($this->cmd);
		@unlink($this->tmpfile);
		$returnData = array();
		$dataArr = preg_split("/\n/", $data, -1, PREG_SPLIT_NO_EMPTY);

		foreach($dataArr as $dstr) {
			$matches = array();

			// Skip this line.
			if (strpos($dstr, "@") === 0)
				continue;

			preg_match("/\& .* .* .*: (.*)/i", $dstr, $matches);

			if (!empty($matches[1])) {
				// For some reason, the exec version seems to add commas?
				$returnData[] = str_replace(",", "", $matches[1]);
			}
		}
		return $returnData;
	}
}

// Setup classname, should be the same as the name of the spellchecker class
$spellCheckerConfig['class'] = "TinyPspellShell";

?>
