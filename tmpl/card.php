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

//$config = new WebveterHelper();
$content = $module->content;
$img_width = trim($params->get('media_width') . $params->get('media_breakpoint'));

// get module background
$style_bg = '{background-image: url("' . Uri::root(true) . '/' . HTMLHelper::_('cleanImageURL', $params->get('backgroundimage'))->url . '");}';


$container_type = ($params->get('tcont', 1) == 1) ? " uk-container" : " uk-container-small@l";
$sub_class = "uk-h2 uk-text-large";
$show_title = 1;
$show_subtitle = 0;
$animate_bg = $params->get('animate_bg') ? " uk-animation-reverse  uk-transform-origin-scale-up " : "";
$modId =  $module->id;
$i = 0;
?>


<div id="<?php echo "sect__" . $modId; ?>" class="section " >

	<div class="intro <?php echo $container_type; ?>">
		
		<?php if($show_title) : ?>
			<h1><?php echo $module->title; ?></h1>
		<?php endif; ?>
		<?php if($show_subtitle) : ?>
			<h3 class="<?php echo $sub_class; ?>"><?php echo $params->get('adv_box', ''); ?></h3>
		<?php endif; ?>
		
		<div class="m_wrap">
			
			<div class="uk-flex-middle uk-grid-match" uk-grid>
				
				<div class="<?php echo $img_width ; ?>">
					
						<div class="uk-text-center"><img src="<?php echo $params->get('adv_media'); ?>" alt="img" /></div>
					
				</div>
				
				<div class="uk-width-expand@m">		
					<div class=" uk-card uk-card-default uk-card-body uk-margin">
						<?php echo $module->content; ?>
					</div>
				</div>
		
			</div>	
		
		</div>
	
	</div>
	
</div>


