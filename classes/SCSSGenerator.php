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

namespace customarticles;

class SCSSGenerator {
	public function create_scss($value, $dc)
	{
		$scssTemplate = new \Contao\File('system/modules/c-customarticles/assets/placeholder.scss');
		$scssFinalFile = new \Contao\File('system/modules/c-customarticles/assets/final.scss');

		$scss = $scssTemplate->getContent();

		$gridSMvar = is_array($dc->activeRecord->gridSM) ? $dc->activeRecord->gridSM : deserialize($dc->activeRecord->gridSM);
		$gridMDvar = is_array($dc->activeRecord->gridMD) ? $dc->activeRecord->gridMD : deserialize($dc->activeRecord->gridMD);
		$gridLGvar = is_array($dc->activeRecord->gridLG) ? $dc->activeRecord->gridLG : deserialize($dc->activeRecord->gridLG);
		$gridVLGvar = is_array($dc->activeRecord->gridVLG) ? $dc->activeRecord->gridVLG : deserialize($dc->activeRecord->gridVLG);

		$widthSMvar = is_array($dc->activeRecord->widthSM) ? $dc->activeRecord->widthSM : deserialize($dc->activeRecord->widthSM);
		$widthMDvar = is_array($dc->activeRecord->widthMD) ? $dc->activeRecord->widthMD : deserialize($dc->activeRecord->widthMD);
		$widthLGvar = is_array($dc->activeRecord->widthLG) ? $dc->activeRecord->widthLG : deserialize($dc->activeRecord->widthLG);
		$widthVLGvar = is_array($dc->activeRecord->widthVLG) ? $dc->activeRecord->widthVLG : deserialize($dc->activeRecord->widthVLG);

		$paddingTopXSvar = is_array($dc->activeRecord->paddingTopXS) ? $dc->activeRecord->paddingTopXS : deserialize($dc->activeRecord->paddingTopXS);
		$paddingTopSMvar = is_array($dc->activeRecord->paddingTopSM) ? $dc->activeRecord->paddingTopSM : deserialize($dc->activeRecord->paddingTopSM);
		$paddingTopMDvar = is_array($dc->activeRecord->paddingTopMD) ? $dc->activeRecord->paddingTopMD : deserialize($dc->activeRecord->paddingTopMD);
		$paddingTopLGvar = is_array($dc->activeRecord->paddingTopLG) ? $dc->activeRecord->paddingTopLG : deserialize($dc->activeRecord->paddingTopLG);
		$paddingTopVLGvar = is_array($dc->activeRecord->paddingTopVLG) ? $dc->activeRecord->paddingTopVLG : deserialize($dc->activeRecord->paddingTopVLG);

		$paddingBottomXSvar = is_array($dc->activeRecord->paddingBottomXS) ? $dc->activeRecord->paddingBottomXS : deserialize($dc->activeRecord->paddingBottomXS);
		$paddingBottomSMvar = is_array($dc->activeRecord->paddingBottomSM) ? $dc->activeRecord->paddingBottomSM : deserialize($dc->activeRecord->paddingBottomSM);
		$paddingBottomMDvar = is_array($dc->activeRecord->paddingBottomMD) ? $dc->activeRecord->paddingBottomMD : deserialize($dc->activeRecord->paddingBottomMD);
		$paddingBottomLGvar = is_array($dc->activeRecord->paddingBottomLG) ? $dc->activeRecord->paddingBottomLG : deserialize($dc->activeRecord->paddingBottomLG);
		$paddingBottomVLGvar = is_array($dc->activeRecord->paddingBottomVLG) ? $dc->activeRecord->paddingBottomVLG : deserialize($dc->activeRecord->paddingBottomVLG);

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

		$unitPadingTopXS  = empty($paddingTopXSvar['unit']) ? 'px' : $paddingTopXSvar['unit'];
		$unitPadingTopSM  = empty($paddingTopSMvar['unit']) ? 'px' : $paddingTopSMvar['unit'];
		$unitPadingTopMD  = empty($paddingTopMDvar['unit']) ? 'px' : $paddingTopMDvar['unit'];
		$unitPadingTopLG  = empty($paddingTopLGvar['unit']) ? 'px' : $paddingTopLGvar['unit'];
		$unitPadingTopVLG = empty($paddingTopVLGvar['unit']) ? 'px' : $paddingTopVLGvar['unit'];

		$unitPadingBottomXS  = empty($paddingBottomXSvar['unit']) ? 'px' : $paddingBottomXSvar['unit'];
		$unitPadingBottomSM  = empty($paddingBottomSMvar['unit']) ? 'px' : $paddingBottomSMvar['unit'];
		$unitPadingBottomMD  = empty($paddingBottomMDvar['unit']) ? 'px' : $paddingBottomMDvar['unit'];
		$unitPadingBottomLG  = empty($paddingBottomLGvar['unit']) ? 'px' : $paddingBottomLGvar['unit'];
		$unitPadingBottomVLG = empty($paddingBottomVLGvar['unit']) ? 'px' : $paddingBottomVLGvar['unit'];

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

		$paddingTopXS  = empty($paddingTopXSvar['value']) ? '25' : $paddingTopXSvar['value'];;
		$paddingTopSM  = empty($paddingTopSMvar['value']) ? '30' : $paddingTopSMvar['value'];
		$paddingTopMD  = empty($paddingTopMDvar['value']) ? '45' : $paddingTopMDvar['value'];
		$paddingTopLG  = empty($paddingTopLGvar['value']) ? '50' : $paddingTopLGvar['value'];
		$paddingTopVLG = empty($paddingTopVLGvar['value']) ? '60' : $paddingTopVLGvar['value'];

		$paddingBottomXS  = empty($paddingBottomXSvar['value']) ? '25' : $paddingBottomXSvar['value'];;
		$paddingBottomSM  = empty($paddingBottomSMvar['value']) ? '30' : $paddingBottomSMvar['value'];
		$paddingBottomMD  = empty($paddingBottomMDvar['value']) ? '45' : $paddingBottomMDvar['value'];
		$paddingBottomLG  = empty($paddingBottomLGvar['value']) ? '50' : $paddingBottomLGvar['value'];
		$paddingBottomVLG = empty($paddingBottomVLGvar['value']) ? '60' : $paddingBottomVLGvar['value'];

		$scss = str_replace('[[gridXS]]', $gridXS . $unitGridXS, $scss);
		$scss = str_replace('[[gridSM]]', $gridSM . $unitGridSM, $scss);
		$scss = str_replace('[[gridMD]]', $gridMD . $unitGridMD, $scss);
		$scss = str_replace('[[gridLG]]', $gridLG . $unitGridLG, $scss);
		$scss = str_replace('[[gridVLG]]', $gridVLG . $unitGridVLG, $scss);

		$scss = str_replace('[[gridXS1]]', $gridXS1 . $unitGridXS, $scss);
		$scss = str_replace('[[gridSM1]]', $gridSM1 . $unitGridSM, $scss);
		$scss = str_replace('[[gridMD1]]', $gridMD1 . $unitGridMD, $scss);
		$scss = str_replace('[[gridLG1]]', $gridLG1 . $unitGridLG, $scss);
		$scss = str_replace('[[gridVLG1]]', $gridVLG1 . $unitGridVLG, $scss);

		$scss = str_replace('[[widthXS]]', $widthXS . $unitWidthXS, $scss);
		$scss = str_replace('[[widthSM]]', $widthSM . $unitWidthSM, $scss);
		$scss = str_replace('[[widthMD]]', $widthMD . $unitWidthMD, $scss);
		$scss = str_replace('[[widthLG]]', $widthLG . $unitWidthLG, $scss);
		$scss = str_replace('[[widthVLG]]', $widthVLG . $unitWidthVLG, $scss);

		$scss = str_replace('[[paddingTopXS]]', $paddingTopXS . $unitPadingTopXS, $scss);
		$scss = str_replace('[[paddingTopSM]]', $paddingTopSM . $unitPadingTopSM, $scss);
		$scss = str_replace('[[paddingTopMD]]', $paddingTopMD . $unitPadingTopMD, $scss);
		$scss = str_replace('[[paddingTopLG]]', $paddingTopLG . $unitPadingTopLG, $scss);
		$scss = str_replace('[[paddingTopVLG]]', $paddingTopVLG . $unitPadingTopVLG, $scss);

		$scss = str_replace('[[paddingBottomXS]]', $paddingBottomXS . $unitPadingBottomXS, $scss);
		$scss = str_replace('[[paddingBottomSM]]', $paddingBottomSM . $unitPadingBottomSM, $scss);
		$scss = str_replace('[[paddingBottomMD]]', $paddingBottomMD . $unitPadingBottomMD, $scss);
		$scss = str_replace('[[paddingBottomLG]]', $paddingBottomLG . $unitPadingBottomLG, $scss);
		$scss = str_replace('[[paddingBottomVLG]]', $paddingBottomVLG . $unitPadingBottomVLG, $scss);

		$scssFinalFile->write($scss);
		$scssFinalFile->close();

		return $value;
	}
}