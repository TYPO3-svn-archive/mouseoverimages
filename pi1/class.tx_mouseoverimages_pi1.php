<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2008 Till Korten <webmaster@korten-rivat.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

require_once(PATH_tslib.'class.tslib_pibase.php');


/**
 * Plugin 'Mouse over Images' for the 'mouseoverimages' extension.
 *
 * @author	Till Korten <webmaster@korten-rivat.de>
 * @package	TYPO3
 * @subpackage	tx_mouseoverimages
 */
class tx_mouseoverimages_pi1 extends tslib_pibase {
	var $prefixId      = 'tx_mouseoverimages_pi1';		// Same as class name
	var $scriptRelPath = 'pi1/class.tx_mouseoverimages_pi1.php';	// Path to this script relative to the extension dir.
	var $extKey        = 'mouseoverimages';	// The extension key.
	var $pi_checkCHash = true;
	
	/**
	 * The main method of the PlugIn does nothing
	 *
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	function main($content,$conf)	{
		if ($conf['debug']) {
			debug($conf);
		}
	}

	/**
	 * creates an image tag and puts it into a register, so that we can insert it into Typoscript
	 *
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	function registerOverlayImages($content,$conf)	{
		$overlayImgList = $this->cObj->stdWrap($conf['overlayImgList'], $conf['overlayImgList.']);
		$overlayImgs = t3lib_div::trimExplode(',', $overlayImgList);
		$overlayImgCount = count($overlayImgs);
		$overlayImgPath = $this->cObj->stdWrap($conf['overlayImgPath'], $conf['overlayImgPath.']);
		$imgNumCurr = $GLOBALS['TSFE']->register['IMAGE_NUM_CURRENT'];
		$imgConf = $conf;
		$imgConf['file.']['height'] = $GLOBALS['TSFE']->register['imageheight'];
		$imgConf['file.']['width'] = $GLOBALS['TSFE']->register['imagewidth'];
		//$imgConf['params'] = 'class="'.$conf['overlayImgClass'].'"';
		//$imgConf['altText'] = $conf['altText'];
		//$imgConf['altText.'] = $conf['altText.'];
		if ($imgNumCurr < $overlayImgCount) {
			$imgConf['file'] = $overlayImgPath.$overlayImgs[$imgNumCurr];
		} else {
			$imgConf['file'] = $overlayImgPath.$overlayImgs[$overlayImgCount-1];
		}
		$GLOBALS['TSFE']->register['overlayimage'] = $this->cObj->IMAGE($imgConf);
		
		if ($conf['debug']) {
			debug($GLOBALS['TCA']);
		}
		

		return $content;
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mouseoverimages/pi1/class.tx_mouseoverimages_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mouseoverimages/pi1/class.tx_mouseoverimages_pi1.php']);
}
?>
