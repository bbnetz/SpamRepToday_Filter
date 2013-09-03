#!/usr/bin/php
<?php
/**
 * SpamRepToday_Filter Class
 * By Bastian Bringenberg <mail@bastian-bringenberg.de>
 *
 * #########
 * # USAGE #
 * #########
 *
 * See Readme File
 *
 * ###########
 * # Licence #
 * ###########
 *
 * See License File
 *
 * ##############
 * # Repository #
 * ##############
 *
 * Fork me on GitHub
 * https://github.com/bbnetz/SpamRepToday_Filter
 *
 *
 */

/**
 * Class SpamRepToday_Filter
 * @author Bastian Bringenberg <mail@bastian-bringenberg.de>
 * @link https://github.com/bbnetz/SpamRepToday_Filter
 *
 */

class SpamRepToday_Filter {

	/**
	 * @var int $minimalAlert the minimal amount of alerts that force a mail
	 */
	protected $minimalAlert = 5;

	/**
	 * function start
	 * Doing the main stuff
	 *
	 * @return void
	 */
	public function start() {
		$content = $this->getPipeContent();
		if($this->needsPublish($content))
			echo $this->filterContent($content);
	}

	/**
	 * function getPipeContent
	 * Reads stdin and returns content
	 *
	 * @return string the piped content
	 */
	protected function getPipeContent() {
		$stdin = fopen('php://stdin', 'r');
		$line = '';
		while($content = fgets(STDIN)) {
			$line .= $content;
		}
		return $line;
	}

	/**
	 * function needsPublish
	 * Checking if activity exists and is more than $this->minimalAlert
	 *
	 * @param string $content 
	 * @return boolean true if more than minimalAlert and activity logged
	 */
	protected function needsPublish($content) {
		if(strpos($content, 'No filter activity logged') !== false)
			return false;
		preg_match('/(\d*?) total filtered/', $content, $found);
		if(intval($found[1]) < $this->minimalAlert)
			return false;
		return true;
	}

	protected function filterContent($content) {
		return $content;
	}


}

$filter = new SpamRepToday_Filter();
$filter -> start();