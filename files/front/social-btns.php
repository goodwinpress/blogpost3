<?php 
// кнопки Ваших социальных сетей

$titan = TitanFramework::getInstance( 'gpress' ); ?>

<ul class="svg-social-icons">
	<!--noindex-->
<?php 
	if ($titan->getOption( 'vk-loc' ) == '1') { 
		echo '<li><a href="' .$titan->getOption( 'vk-link' ). '" class="vk-icon gp-icon" rel="nofollow" target="_blank">BКонтакте</a></li>';
	}
	if ($titan->getOption( 'inst-loc' ) == '1') { 
		echo '<li><a href="' .$titan->getOption( 'inst-link' ). '" class="inst-icon gp-icon" rel="nofollow" target="_blank">Instagram</a></li>';
	}
	if ($titan->getOption( 'fb-loc' ) == '1') { 
		echo '<li><a href="' .$titan->getOption( 'fb-link' ). '" class="fb-icon gp-icon" rel="nofollow" target="_blank">Facebook</a></li>';
	}
	if ($titan->getOption( 'twi-loc' ) == '1') { 
	echo '<li><a href="' .$titan->getOption( 'twi-link' ). '" class="twi-icon gp-icon" rel="nofollow" target="_blank">Twitter</a></li>';
	}
	if ($titan->getOption( 'tg-loc' ) == '1') { 
		echo '<li><a href="' .$titan->getOption( 'tg-link' ). '" class="tele-icon gp-icon" rel="nofollow" target="_blank">Telegram</a></li>';
	}
	if ($titan->getOption( 'yt-loc' ) == '1') { 
		echo '<li><a href="' .$titan->getOption( 'yt-link' ). '" class="ytube-icon gp-icon" rel="nofollow" target="_blank">Youtube</a></li>';
	}
	if ($titan->getOption( 'od-loc' ) == '1') { 
	echo '<li><a href="' .$titan->getOption( 'od-link' ). '" class="odnkl-icon gp-icon" rel="nofollow" target="_blank">Одноклассники</a></li>';
	}
?>
	<!--/noindex-->
</ul>