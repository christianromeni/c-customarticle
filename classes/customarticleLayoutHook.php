<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @package   customarticle
 * @author    Christian Romeni  <christian@romeni.eu>
 * @link      https://romeni.eu
 * @license   GNU
 * @copyright Romeni WebDesign
 */

namespace customarticle;

class customarticleLayoutHook extends \PageRegular {
	/**
	 * [insertCustomGrid description]
	 * @param  Database_Result $objElement
	 * @param  [string]          $strBuffer
	 * @return [string]
	 */
	public function modifyCombinedStyle($strContent, $strKey, $strMode)
	{
		global $objPage;
		$layoutID = $objPage->layout;
		$objLayout = \LayoutModel::findByID($layoutID);

		if($objLayout->activateCArticles){

			$gridSMvar   = unserialize($objLayout->gridSM);
			$gridMDvar   = unserialize($objLayout->gridMD);
			$gridLGvar   = unserialize($objLayout->gridLG);
			$gridVLGvar  = unserialize($objLayout->gridVLG);

			$widthSMvar  = unserialize($objLayout->widthSM);
			$widthMDvar  = unserialize($objLayout->widthMD);
			$widthLGvar  = unserialize($objLayout->widthLG);
			$widthVLGvar = unserialize($objLayout->widthVLG);

			$padingTopXSvar  = unserialize($objLayout->padingTopXS);
			$padingTopSMvar  = unserialize($objLayout->padingTopSM);
			$padingTopMDvar  = unserialize($objLayout->padingTopMD);
			$padingTopLGvar  = unserialize($objLayout->padingTopLG);
			$padingTopVLGvar = unserialize($objLayout->padingTopVLG);

			$padingBottomXSvar  = unserialize($objLayout->padingBottomXS);
			$padingBottomSMvar  = unserialize($objLayout->padingBottomSM);
			$padingBottomMDvar  = unserialize($objLayout->padingBottomMD);
			$padingBottomLGvar  = unserialize($objLayout->padingBottomLG);
			$padingBottomVLGvar = unserialize($objLayout->padingBottomVLG);

			$gridXS  = '100';
			$gridSM  = empty($gridSMvar['value']) ? '768' : $gridSMvar['value'];
			$gridMD  = empty($gridMDvar['value']) ? '992' : $gridMDvar['value'];
			$gridLG  = empty($gridLGvar['value']) ? '1200' : $gridLGvar['value'];
			$gridVLG = empty($gridVLGvar['value']) ? '1600' : $gridVLGvar['value'];

			$unitGridXS  = '%';
			$unitGridSM  = empty($gridSMvar['unit']) ? 'px' : $gridSMvar['unit'];
			$unitGridMD  = empty($gridMDvar['unit']) ? 'px' : $gridMDvar['unit'];
			$unitGridLG  = empty($gridLGvar['unit']) ? 'px' : $gridLGvar['unit'];
			$unitGridVLG = empty($gridVLGvar['unit']) ? 'px' : $gridVLGvar['unit'];

			$unitWidthXS  = '%';
			$unitWidthSM  = empty($widthSMvar['unit']) ? 'px' : $widthSMvar['unit'];
			$unitWidthMD  = empty($widthMDvar['unit']) ? 'px' : $widthMDvar['unit'];
			$unitWidthLG  = empty($widthLGvar['unit']) ? 'px' : $widthLGvar['unit'];
			$unitWidthVLG = empty($widthVLGvar['unit']) ? 'px' : $widthVLGvar['unit'];

			$unitPadingTopXS  = empty($padingTopXSvar['unit']) ? 'px' : $padingTopXSvar['unit'];
			$unitPadingTopSM  = empty($padingTopSMvar['unit']) ? 'px' : $padingTopSMvar['unit'];
			$unitPadingTopMD  = empty($padingTopMDvar['unit']) ? 'px' : $padingTopMDvar['unit'];
			$unitPadingTopLG  = empty($padingTopLGvar['unit']) ? 'px' : $padingTopLGvar['unit'];
			$unitPadingTopVLG = empty($padingTopVLGvar['unit']) ? 'px' : $padingTopVLGvar['unit'];

			$unitPadingBottomXS  = empty($padingBottomXSvar['unit']) ? 'px' : $padingBottomXSvar['unit'];
			$unitPadingBottomSM  = empty($padingBottomSMvar['unit']) ? 'px' : $padingBottomSMvar['unit'];
			$unitPadingBottomMD  = empty($padingBottomMDvar['unit']) ? 'px' : $padingBottomMDvar['unit'];
			$unitPadingBottomLG  = empty($padingBottomLGvar['unit']) ? 'px' : $padingBottomLGvar['unit'];
			$unitPadingBottomVLG = empty($padingBottomVLGvar['unit']) ? 'px' : $padingBottomVLGvar['unit'];

			$gridXS1  = (int)$gridXS-1;
			$gridSM1  = (int)$gridSM-1;
			$gridMD1  = (int)$gridMD-1;
			$gridLG1  = (int)$gridLG-1;
			$gridVLG1 = (int)$gridVLG-1;

			$widthXS  = '100';
			$widthSM  = empty($widthSMvar['value']) ? '750' : $widthSMvar['value'];
			$widthMD  = empty($widthMDvar['value']) ? '970' : $widthMDvar['value'];
			$widthLG  = empty($widthLGvar['value']) ? '1170' : $widthLGvar['value'];
			$widthVLG = empty($widthVLGvar['value']) ? '1440' : $widthVLGvar['value'];

			$padingTopXS  = empty($padingTopXSvar['value']) ? '25' : $padingTopXSvar['value'];;
			$padingTopSM  = empty($padingTopSMvar['value']) ? '30' : $padingTopSMvar['value'];
			$padingTopMD  = empty($padingTopMDvar['value']) ? '45' : $padingTopMDvar['value'];
			$padingTopLG  = empty($padingTopLGvar['value']) ? '50' : $padingTopLGvar['value'];
			$padingTopVLG = empty($padingTopVLGvar['value']) ? '60' : $padingTopVLGvar['value'];

			$padingBottomXS  = empty($padingBottomXSvar['value']) ? '25' : $padingBottomXSvar['value'];;
			$padingBottomSM  = empty($padingBottomSMvar['value']) ? '30' : $padingBottomSMvar['value'];
			$padingBottomMD  = empty($padingBottomMDvar['value']) ? '45' : $padingBottomMDvar['value'];
			$padingBottomLG  = empty($padingBottomLGvar['value']) ? '50' : $padingBottomLGvar['value'];
			$padingBottomVLG = empty($padingBottomVLGvar['value']) ? '60' : $padingBottomVLGvar['value'];

			$strContent = str_replace('[[gridXS]]', $gridXS . $unitGridXS, $strContent);
			$strContent = str_replace('[[gridSM]]', $gridSM . $unitGridSM, $strContent);
			$strContent = str_replace('[[gridMD]]', $gridMD . $unitGridMD, $strContent);
			$strContent = str_replace('[[gridLG]]', $gridLG . $unitGridLG, $strContent);
			$strContent = str_replace('[[gridVLG]]', $gridVLG . $unitGridVLG, $strContent);

			$strContent = str_replace('[[gridXS1]]', $gridXS1 . $unitGridXS, $strContent);
			$strContent = str_replace('[[gridSM1]]', $gridSM1 . $unitGridSM, $strContent);
			$strContent = str_replace('[[gridMD1]]', $gridMD1 . $unitGridMD, $strContent);
			$strContent = str_replace('[[gridLG1]]', $gridLG1 . $unitGridLG, $strContent);
			$strContent = str_replace('[[gridVLG1]]', $gridVLG1 . $unitGridVLG, $strContent);

			$strContent = str_replace('[[widthXS]]', $widthXS . $unitWidthXS, $strContent);
			$strContent = str_replace('[[widthSM]]', $widthSM . $unitWidthSM, $strContent);
			$strContent = str_replace('[[widthMD]]', $widthMD . $unitWidthMD, $strContent);
			$strContent = str_replace('[[widthLG]]', $widthLG . $unitWidthLG, $strContent);
			$strContent = str_replace('[[widthVLG]]', $widthVLG . $unitWidthVLG, $strContent);

			$strContent = str_replace('[[padingTopXS]]', $padingTopXS . $unitPadingTopXS, $strContent);
			$strContent = str_replace('[[padingTopSM]]', $padingTopSM . $unitPadingTopSM, $strContent);
			$strContent = str_replace('[[padingTopMD]]', $padingTopMD . $unitPadingTopMD, $strContent);
			$strContent = str_replace('[[padingTopLG]]', $padingTopLG . $unitPadingTopLG, $strContent);
			$strContent = str_replace('[[padingTopVLG]]', $padingTopVLG . $unitPadingTopVLG, $strContent);

			$strContent = str_replace('[[padingBottomXS]]', $padingBottomXS . $unitPadingBottomXS, $strContent);
			$strContent = str_replace('[[padingBottomSM]]', $padingBottomSM . $unitPadingBottomSM, $strContent);
			$strContent = str_replace('[[padingBottomMD]]', $padingBottomMD . $unitPadingBottomMD, $strContent);
			$strContent = str_replace('[[padingBottomLG]]', $padingBottomLG . $unitPadingBottomLG, $strContent);
			$strContent = str_replace('[[padingBottomVLG]]', $padingBottomVLG . $unitPadingBottomVLG, $strContent);

			if (strpos($strContent, 'clearfix') !== false) {
				print_r($padingTopXSvar);
			}

		}

		return $strContent;
	}
}