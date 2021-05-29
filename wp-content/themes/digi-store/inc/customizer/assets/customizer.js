// js for to display only three category at a time 
 jQuery(document).on('click', '#customize-control-digi_store_theme_options-digi_store_product_cat_lists select>option', function(e) {

            if(jQuery(this).hasClass('cat_selected')){
                jQuery(this).removeClass('cat_selected');
            }
            else {
                jQuery(this).addClass('cat_selected');
            }
            var last_valid_selection = null;
            jQuery('#customize-control-digi_store_theme_options-digi_store_product_cat_lists select').change(function(event) {
                if (jQuery(this).val().length > 3) {
                    alert('Please Select Only three Items');
                    jQuery(this).val(last_valid_selection);
                    jQuery(this).find('option').removeAttr('selected');
                } else {
                    last_valid_selection = jQuery(this).val();
                }
            });
        });