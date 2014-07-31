<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Web Essentials <extensions@web-essentials.asia>
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
 *  A copy is found in the textfile GPL.txt and important notices to the license
 *  from the author is found in LICENSE.txt distributed with these scripts.
 *
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
/**
 * Index search frontend example hook
 *
 * @author Web Essentials <extensions@web-essentials.asia>
 */
class Tx_WeDefault_Hook_IndexSearchHook {

	/**
	 * @todo Define visibility
	 */
	public $pObj;

	/**
	 * Splits the search word input into an array where each word is represented by an array with key "sword" holding the search word and key "oper" holding the SQL operator (eg. AND, OR)
	 *
	 * Only words with 2 or more characters are accepted
	 * Max 200 chars total
	 * Space is used to split words, "" can be used search for a whole string
	 * AND, OR and NOT are prefix words, overruling the default operator
	 * +/|/- equals AND, OR and NOT as operators.
	 * All search words are converted to lowercase.
	 *
	 * $defOp is the default operator. 1=OR, 0=AND
	 *
	 * @param 	boolean		If TRUE, the default operator will be OR, not AND
	 * @return 	array		Returns array with search words if any found
	 * @todo Define visibility
	 */
	public function getSearchWords($defOp) {
		// do not remove function otherwise hook function getSearchWords_splitSWords($inSW, $defOp) will not work
	}

	public function getSearchWords_splitSWords($inSW, $defOp) {

		// enable searching for Khmer version of utf-8
		if ($GLOBALS['TSFE']->lang === 'km' && $GLOBALS['TSFE']->metaCharset === 'utf-8') {
			$this->pObj->piVars['type'] = 20;
			if ($inSW) {
				$inSW = preg_replace( '/\p{Z}/u',' ', $inSW);
				$words = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(' ', $inSW, TRUE);
				foreach ($words as $key => $word) {
					$sWordArray[$key]['sword'] = $word;
					$sWordArray[$key]['oper'] = 'AND';
				}

				return $sWordArray;
			}

			return $sWordArray;
		} else {
			if ($this->pObj->piVars['type'] == 20) {

				// type = Sentence
				$sWordArray = array(array('sword' => trim($inSW), 'oper' => 'AND'));
			} else {
				$search = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Frontend\\ContentObject\\SearchResultContentObject');
				$search->default_operator = $defOp == 1 ? 'OR' : 'AND';
				$search->operator_translate_table = $this->pObj->operator_translate_table;
				$search->register_and_explode_search_string($inSW);
				if (is_array($search->sword_array)) {
					$sWordArray = $this->pObj->procSearchWordsByLexer($search->sword_array);
				}
			}
		}

		return $sWordArray;
	}
}

?>