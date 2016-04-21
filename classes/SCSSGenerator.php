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

		$default = array(
			'Grid'							=> array('XS' => '100', 'SM' => '768', 'MD' => '992', 'LG' => '1200', 'VLG' => '1600'),
			'GridUnit'					=> array('XS' => '%', 'SM' => 'px', 'MD' => 'px', 'LG' => 'px', 'VLG' => 'px'),
			'Width'							=> array('XS' => '100', 'SM' => '750', 'MD' => '970', 'LG' => '1170', 'VLG' => '1440'),
			'WidthUnit'					=> array('XS' => '%', 'SM' => 'px', 'MD' => 'px', 'LG' => 'px', 'VLG' => 'px'),
			'PaddingTop'				=> array('XS' => '25', 'SM' => '30', 'MD' => '45', 'LG' => '50', 'VLG' => '60'),
			'PaddingTopUnit'		=> array('XS' => 'px', 'SM' => 'px', 'MD' => 'px', 'LG' => 'px', 'VLG' => 'px'),
			'PaddingBottom'			=> array('XS' => '25', 'SM' => '30', 'MD' => '45', 'LG' => '50', 'VLG' => '60'),
			'PaddingBottomUnit'	=> array('XS' => 'px', 'SM' => 'px', 'MD' => 'px', 'LG' => 'px', 'VLG' => 'px'),
		);

		$scss = $scssTemplate->getContent();

		$scss = $this->split_and_fix(
									'XS',
									$scss,
									$dc->activeRecord->gridXS,
									$dc->activeRecord->widthXS,
									$dc->activeRecord->paddingTopXS,
									$dc->activeRecord->paddingBottomXS,
									$default
								);

		$scss = $this->split_and_fix(
									'SM',
									$scss,
									$dc->activeRecord->gridSM,
									$dc->activeRecord->widthSM,
									$dc->activeRecord->paddingTopSM,
									$dc->activeRecord->paddingBottomSM,
									$default
								);

		$scss = $this->split_and_fix(
									'MD',
									$scss,
									$dc->activeRecord->gridMD,
									$dc->activeRecord->widthMD,
									$dc->activeRecord->paddingTopMD,
									$dc->activeRecord->paddingBottomMD,
									$default
								);

		$scss = $this->split_and_fix(
									'LG',
									$scss,
									$dc->activeRecord->gridLG,
									$dc->activeRecord->widthLG,
									$dc->activeRecord->paddingTopLG,
									$dc->activeRecord->paddingBottomLG,
									$default
								);

		$scss = $this->split_and_fix(
									'VLG',
									$scss,
									$dc->activeRecord->gridVLG,
									$dc->activeRecord->widthVLG,
									$dc->activeRecord->paddingTopVLG,
									$dc->activeRecord->paddingBottomVLG,
									$default
								);

		$scssFinalFile->write($scss);
		$scssFinalFile->close();

		return $value;
	}

	public function split_and_fix($size,$scss,$grid,$width,$paddingTop,$paddingBottom,$default){
		if($size == 'XS'){
			$grid				= '100';
			$unitGrid		= '%';
			$width			= '100';
			$unitWidth	= '%';
		}
		else {
			$gridvar						= is_array($grid) ? $grid : deserialize($grid);
			$widthvar						= is_array($width) ? $width : deserialize($width);
			$paddingTopvar			= is_array($paddingTop) ? $paddingTop : deserialize($paddingTop);
			$paddingBottomXSvar	= is_array($paddingBottom) ? $paddingBottom : deserialize($paddingBottom);

			$grid								= empty($gridvar['value']) ? $default['Grid'][$size] : $gridvar['value'];
			$unitGrid						= empty($gridvar['unit']) ? $default['GridUnit'][$size] : $gridvar['unit'];

			$width							= empty($widthvar['value']) ? $default['Width'][$size] : $widthvar['value'];
			$unitWidth					= empty($widthvar['unit']) ? $default['WidthUnit'][$size] : $widthvar['unit'];
		}

		$paddingTop					= empty($paddingTopvar['value']) ? $default['PaddingTop'][$size] : $paddingTopvar['value'];
		$unitPadingTop			= empty($paddingTopvar['unit']) ? $default['PaddingTopUnit'][$size] : $paddingTopvar['unit'];
		$paddingBottom			= empty($paddingBottomvar['value']) ? $default['PaddingBottom'][$size] : $paddingBottomvar['value'];
		$unitPadingBottom		= empty($paddingBottomvar['unit']) ? $default['PaddingBottomUnit'][$size] : $paddingBottomvar['unit'];

		$grid1							= (int)$grid-1;

		$scss = str_replace('[[grid'.$size.']]', $grid . $unitGrid, $scss);
		$scss = str_replace('[[grid'.$size.'1]]', $grid1 . $unitGrid, $scss);
		$scss = str_replace('[[width'.$size.']]', $width . $unitWidth, $scss);
		$scss = str_replace('[[paddingTop'.$size.']]', $paddingTop . $unitPadingTop, $scss);
		$scss = str_replace('[[paddingBottom'.$size.']]', $paddingBottom . $unitPadingBottom, $scss);

		return $scss;
	}
}