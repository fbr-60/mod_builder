<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   (C) 2009 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Vendor\Helper\Template\Site\Helper\WebveterHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Uri\Uri;

$config = new WebveterHelper();
$content = $module->content;

// get module background
$style_bg = '{background-image: url("' . Uri::root(true) . '/' . HTMLHelper::_('cleanImageURL', $params->get('backgroundimage'))->url . '");}';


[$part1, $part2] = $config->splitContentByShortcode($content, $shortcode = '{x2t}');

$container_type = ($params->get('tcont', 1) == 1) ? " uk-container" : " uk-container-small@l";
$sub_class = "uk-h2 uk-text-large";
$show_title = 1;
$show_subtitle = 1;
$animate_bg = $params->get('animate_bg') ? " uk-animation-reverse  uk-transform-origin-scale-up " : "";
$modId =  $module->id;
$i = 0;
?>

<style>
<?php if($params->get("bg_type", 1) == 1) : ?>
.build-mod {color: #fff !important;}
#<?php echo "sect__" . $modId; ?> 	<?php echo $style_bg; ?>
#<?php echo "sect__" . $modId; ?> {
	background-size: cover;
	backgroun-repeat: no-repeat;	
	background-attachment: fixed;
}
<?php elseif($params->get("bg_type", 2) == 0) : ?>
#<?php echo "sect__" . $modId; ?> {background-color: <?php echo $params->get('backgroundcolor'); ?>}
<?php endif; ?>
</style>

<div id="<?php echo "sect__" . $modId; ?>" class="build-mod section  <?php echo $params->get('moduleclass_sfx', '');?>" >

	<div class="intro <?php echo $container_type; ?>">
		
		<?php if($show_title) : ?>
			<h1><?php echo $module->title; ?></h1>
		<?php endif; ?>
		<?php if($show_subtitle) : ?>
			<h3 class="<?php echo $sub_class; ?>"><?php echo $params->get('adv_box', ''); ?></h3>
		<?php endif; ?>
		
		<div class="m_wrap">
			
			<div class="uk-flex-middle3 uk-grid-match" uk-grid="" >
				
				<div class="uk-width-1-2@s">
					<div class="uk-panel uk-bordered">
						<div class="uk-text-center"><?php echo $part1; ?></div>
					</div>
				</div>
				
				<div class="uk-width-1-2@s">		
					<div class=" uk-bordered uk-panel">
						<div class="uk-text-center"><?php echo $part2; ?></div>
					</div>
				</div>
		
			</div>	
		
		</div>
	
	</div>
	
</div>


