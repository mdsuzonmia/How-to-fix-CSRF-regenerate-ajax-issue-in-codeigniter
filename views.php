
<?php

// get the data and pass it to your view
$token_name = $this->security->get_csrf_token_name();
$token_hash = $this->security->get_csrf_hash();

$base_controler = base_url()."/suggestions";

?>
<form>                                
    <div>
        <input type="text" id="search-text" name="parent_name" placeholder="Search" value=""  >
        <div id="search-suggestions"></div>
    </div>
    <input type="hidden" id="csrf" name="<?php echo $token_name; ?>" value="<?php echo $token_hash; ?>" />
</form>
                
<script type="text/javascript">

    // Get Keyup 
    jQuery( "#search-text").keyup(function() {
        // Get Data 
        var val       = jQuery("#search-text").val();
        var hashValue = jQuery('#csrf').val();

        // check value
        if(val) {

            // Get show loading
            jQuery('#search-suggestions').show();
            jQuery("#search-suggestions").html("Loading ...");

            // Get jquery post for ajax task
            jQuery.post( 
                '<?php echo $base_controler; ?>',
                {val:val,'<?php echo $this->security->get_csrf_token_name(); ?>':hashValue}, 
                function(data)
                { 
                    // Get return data to decode
                    var obj = jQuery.parseJSON(data);

                    // Get csrf new hash value
                    var new_hash = obj.csrfHash;

                    // Set csrf new hash value update
                    jQuery('#csrf').val(new_hash);

                    // Show suggestion box
                    jQuery('#search-suggestions').fadeIn();
                    jQuery("#search-suggestions").html(obj.html);
                }
            );        
        }else{
            // Set fadeout suggestion box
            jQuery('#search-suggestions').fadeOut();
        }
    });
</script>