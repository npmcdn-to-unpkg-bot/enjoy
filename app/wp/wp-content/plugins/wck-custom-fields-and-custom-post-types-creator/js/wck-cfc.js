jQuery(function(){
	jQuery(document).on( 'change', '#wck_cfc_fields #field-type', function () {
		value = jQuery(this).val();
		
		if( value == 'select' || value == 'checkbox' || value == 'radio' ){
			jQuery( '#wck_cfc_fields .row-options' ).show();
		}
		else{
			jQuery( '#wck_cfc_fields .row-options' ).hide();
		}
		
		if( value == 'upload' ){
			jQuery( '#wck_cfc_fields .row-attach-upload-to-post' ).show();
		}
		else{
			jQuery( '#wck_cfc_fields .row-attach-upload-to-post' ).hide();
		}
		
		if( value == 'cpt select' ){
			jQuery( '#wck_cfc_fields .row-cpt' ).show();
		}
		else{
			jQuery( '#wck_cfc_fields .row-cpt' ).hide();
		}

        if( value == 'textarea' ){
            jQuery( '#wck_cfc_fields .row-number-of-rows' ).show();
            jQuery( '#wck_cfc_fields .row-readonly' ).show();
            jQuery( '#wck_cfc_fields .row-default-text' ).show();
            jQuery( '#wck_cfc_fields .row-default-value' ).hide();
        }
        else{
            jQuery( '#wck_cfc_fields .row-number-of-rows' ).hide();
            jQuery( '#wck_cfc_fields .row-readonly' ).hide();
            jQuery( '#wck_cfc_fields .row-default-text' ).hide();
        }

        if( value == 'heading' ) {
            jQuery( '#wck_cfc_fields .row-required' ).hide();
            jQuery( '#wck_cfc_fields .row-default-value' ).hide();
        }

        if( value != 'textarea' && value != 'heading' ){
            jQuery( '#wck_cfc_fields .row-required' ).show();
            jQuery( '#wck_cfc_fields .row-default-value' ).show();
        }

        if( value == 'phone' ) {
            jQuery( '#wck_cfc_fields .row-phone-format' ).show();
            jQuery( '#wck_cfc_fields .row-default-value' ).hide();
        } else {
            jQuery( '#wck_cfc_fields .row-phone-format' ).hide();
        }

        if( value == 'html' ) {
            jQuery( '#wck_cfc_fields .row-html-content' ).show();
            jQuery( '#wck_cfc_fields .row-default-value' ).hide();
            jQuery( '#wck_cfc_fields .row-required' ).hide();
        } else {
            jQuery( '#wck_cfc_fields .row-html-content' ).hide();
        }

    });
	
	jQuery(document).on( 'change', '#container_wck_cfc_fields #field-type', function () {
		value = jQuery(this).val();
		if( value == 'select' || value == 'checkbox' || value == 'radio' ){
			jQuery(this).parent().parent().parent().children(".row-options").show();
		}
		else{
			jQuery(this).parent().parent().parent().children(".row-options").hide();
		}
		
		if( value == 'upload' ){
			jQuery(this).parent().parent().parent().children(".row-attach-upload-to-post").show();
		}
		else{
			jQuery(this).parent().parent().parent().children(".row-attach-upload-to-post").hide();
		}

		if( value == 'cpt select' ){
			jQuery(this).parent().parent().parent().children(".row-cpt").show();
		}
		else{
			jQuery(this).parent().parent().parent().children(".row-cpt").hide();
		}

        if( value == 'textarea' ){
            jQuery(this).parent().parent().parent().children(".row-number-of-rows").show();
            jQuery(this).parent().parent().parent().children(".row-readonly").show();
            jQuery(this).parent().parent().parent().children(".row-default-text").show();
            jQuery(this).parent().parent().parent().children(".row-default-value").hide();
        }
        else{
            jQuery(this).parent().parent().parent().children(".row-number-of-rows").hide();
            jQuery(this).parent().parent().parent().children(".row-readonly").hide();
            jQuery(this).parent().parent().parent().children(".row-default-text").hide();
        }

        if( value == 'heading' ) {
            jQuery( this ).parent().parent().parent().children( ".row-required" ).hide();
            jQuery( this ).parent().parent().parent().children( ".row-default-value" ).hide();
        }

        if( value != 'textarea' && value != 'heading' ) {
            jQuery( this ).parent().parent().parent().children( ".row-required" ).show();
            jQuery( this ).parent().parent().parent().children( ".row-default-value" ).show();
        }

        if( value == 'phone' ) {
            jQuery( this ).parent().parent().parent().children( ".row-phone-format" ).show();
            jQuery( this ).parent().parent().parent().children( ".row-default-value" ).hide();
        } else {
            jQuery( this ).parent().parent().parent().children( ".row-phone-format" ).hide();
        }

        if( value == 'html' ) {
            jQuery( this ).parent().parent().parent().children( ".row-html-content" ).show();
            jQuery( this ).parent().parent().parent().children( ".row-default-value" ).hide();
            jQuery( this ).parent().parent().parent().children( ".row-required" ).hide();
        } else {
            jQuery( this ).parent().parent().parent().children( ".row-html-content" ).hide();
        }

    });
});