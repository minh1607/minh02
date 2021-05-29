/******************* Digi Store CUSTOMIZER CUSTOM SCRIPTS ******************************/
(function($) {
	$('.preview-notice').prepend('<span id="digi_store_upgrade"><a target="_blank" class="button btn-upgrade" href="' + digi_store_upgrade_links.upgrade_link + '">' + digi_store_upgrade_links.upgrade_text + '</a></span>');
	jQuery('#customize-info .btn-upgrade, .misc_links').click(function(event) {
		event.stopPropagation();
	});
})(jQuery);