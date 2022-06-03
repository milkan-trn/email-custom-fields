<?php

/* 
 * sd_login metaboxes.
 */
class ecf_location_meta_boxes {
    public function __construct() {
        add_action( 'add_meta_boxes', array( $this, 'ecf_sd_register_metaboxes' ) );
        add_action( 'save_post', array( $this, 'ecf_sd_save_meta_box' ) );
        
    }


   /**
     *  It will register metaboxes
     */
    public function ecf_sd_register_metaboxes() { 
        
      add_meta_box( 'sd_login_meta_box', __( "Add locations and departments"), array( $this, 'ecf_SD_post_meta' ), 'locations_dep', 'normal', 'high' );
    }
    
    
    
/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function ecf_SD_post_meta( $post ) { ?>
   <div class="hcf_box">
    <style scoped>
        .hcf_box{
            display: flex;
            flex-direction: column;
        }
        .hcf_field{
            display: flex;
            flex-direction: column;
        }
        label {
            margin: 10px 0 5px 0;
        }
        .div_cat {
            background: #cfe9ff;
            padding: 0 10px 10px 10px;
            margin: 10px 0 0 0;
        }
        .div_cat2 {
            background: #FFE5CF;
            padding: 0 10px 10px 10px;
            margin: 10px 0 0 0;
        }
        .wp-die-message, p {
    font-size: 13px;
    line-height: 1.5;
    margin: 0;
        }
                #titlediv #title-prompt-text { padding: 0 10px; }

    </style>
     <p class="meta-options hcf_field">
        <label for="location">Location</label>
        <input id="location" name="location" 
        value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'location', true ) ); ?>" required> 
    
    </p>
    <p class="meta-options hcf_field">
        <label for="department">Department</label>
        <input id="department" name="department" 
        value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'department', true ) ); ?>" required> 
    
    </p>
   
    <p class="meta-options hcf_field">
        <label for="ld_email">Email</label>
        <input id="ld_email" name="ld_email" type="email"
        value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'ld_email', true ) ); ?>"required> 
    
    </p>
    <label >Back to all locations</label>
    <a href="<?php echo get_site_url(); ?>/wp-admin/edit.php?post_type=locations_dep"  style="
		padding: 5px 10px 5px 10px;
		background: wheat;
		background: #2271b1;
		border-color: #2271b1;
		color: #fff;
		text-decoration: none;
		text-shadow: none;
        text-align: center;
        width: 100px;">Edit Location</a>
    <p>


    </p>
  
    </div>
  
</div>
<?php }

private function ecf_saveToJsonFile () {
    
    $args = array(  
           'post_type' => 'locations_dep',
           'post_status' => 'publish',
           'posts_per_page' => -1, 
            'orderby' => 'title', 
            'order' => 'ASC',
   
       );
   
       $loop = new WP_Query( $args ); 
         
       while ( $loop->have_posts() ) : $loop->the_post(); 
       $myObj = new stdClass();
       $myObj->Title = get_the_title();
       $myObj->Location =  esc_attr( get_post_meta( get_the_ID(), 'location', true ) );
       $myObj->Department = esc_attr( get_post_meta( get_the_ID(), 'department', true ) );
       $myObj->Email = esc_attr( get_post_meta( get_the_ID(), 'ld_email', true ) );
       
       $json_ecf[] =$myObj;
       
     
       
       
       endwhile;
       
       $myJSON = json_encode($json_ecf);
   
       file_put_contents("../wp-content/plugins/email-custom-fields/locations.json", $myJSON);
       
       wp_reset_postdata(); wp_reset_query();
       
   }

function ecf_sd_save_meta_box( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
        $post_id = $parent_id;
    }
    $fields = [
        'location',
        'department',
        'ld_email',
       
    ];
    foreach ( $fields as $field ) {
        if ( array_key_exists( $field, $_POST ) ) {
            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
        }
     }
     echo $this->ecf_saveToJsonFile ();
}

    
    
    /**class end*/
    }
    
    new ecf_location_meta_boxes();
