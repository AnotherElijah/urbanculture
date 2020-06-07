<?php

  if ( ! class_exists( 'FTAGEMENTOR_TAX_META' ) ) {

    class FTAGEMENTOR_TAX_META {

      public function __construct() {
        add_action( 'product_cat_add_form_fields', array ( $this, 'ftagementor_add_category_custom_fields' ), 10, 2 );
        add_action( 'created_product_cat', array ( $this, 'ftagementor_save_category_custom_fields' ), 10, 2 );
        add_action( 'product_cat_edit_form_fields', array ( $this, 'ftagementor_update_category_custom_fields' ), 10, 2 );
        add_action( 'edited_product_cat', array ( $this, 'ftagementor_updated_category_custom_fields' ), 10, 2 );

        add_action( 'admin_enqueue_scripts', array( $this, 'load_media' ) );
        add_action( 'admin_footer', array ( $this, 'add_script' ) );
      }

      public function load_media() {
       wp_enqueue_media();
      }

      /*
      * Add a form field in the new category page
      */
      public function ftagementor_add_category_custom_fields ( $taxonomy ) { 
        ?>
          <div class="form-field term-group">
              <label for="category-icon-id"><?php esc_html_e('Category Icon', 'ftagementor'); ?></label>
              <input type="hidden" id="category-icon-id" name="category-icon-id" class="custom_media_url" value="">
             <div id="category-icon-wrapper"></div>
             <p>
               <input type="button" class="button button-secondary ftagementor_tax_media_button" id="ftagementor_tax_media_button" name="ftagementor_tax_media_button" value="<?php esc_html_e( 'Add Image', 'ftagementor' ); ?>" />
               <input type="button" class="button button-secondary ftagementor_tax_media_remove" id="ftagementor_tax_media_remove" name="ftagementor_tax_media_remove" value="<?php esc_html_e( 'Remove Image', 'ftagementor' ); ?>" />
            </p>
         </div>

        <?php
      }

     
      /*
      * Save the form field
      */
      public function ftagementor_save_category_custom_fields ( $term_id, $tt_id ) {
        if( isset( $_POST['category-icon-id'] ) && '' !== $_POST['category-icon-id'] ){
           $image = $_POST['category-icon-id'];
           add_term_meta( $term_id, 'category-icon-id', $image, true );
        }
      }
     
      /*
      * Edit the form field
      */
      public function ftagementor_update_category_custom_fields ( $term, $taxonomy ) {

        ?>
          <tr class="form-field term-group-wrap">
             <th scope="row">
               <label for="category-icon-id"><?php esc_html_e( 'Category Icon', 'ftagementor' ); ?></label>
             </th>
             <td>
               <?php $image_id = get_term_meta ( $term ->term_id, 'category-icon-id', true ); ?>
               <input type="hidden" id="category-icon-id" name="category-icon-id" value="<?php echo $image_id; ?>">
               <div id="category-icon-wrapper">
                 <?php if ( $image_id ) { ?>
                   <?php echo wp_get_attachment_image ( $image_id, 'thumbnail' ); ?>
                 <?php } ?>
               </div>
               <p>
                 <input type="button" class="button button-secondary ftagementor_tax_media_button" id="ftagementor_tax_media_button" name="ftagementor_tax_media_button" value="<?php esc_html_e( 'Add Icon', 'hero-theme' ); ?>" />
                 <input type="button" class="button button-secondary ftagementor_tax_media_remove" id="ftagementor_tax_media_remove" name="ftagementor_tax_media_remove" value="<?php esc_html_e( 'Remove Icon', 'ftagementor' ); ?>" />
               </p>
             </td>
           </tr>

        <?php
      }

      /*
       * Update the form field value
       */
      public function ftagementor_updated_category_custom_fields ( $term_id, $tt_id ) {
        if( isset( $_POST['cat_banner_title'] ) && '' !== $_POST['cat_banner_title'] ){
          $cat_shownews = $_POST['cat_banner_title'];
          update_term_meta ( $term_id, 'cat_banner_title', $cat_shownews );
        }else{
          update_term_meta ( $term_id, 'cat_banner_title', '' );
        }


        if( isset( $_POST['category-icon-id'] ) && '' !== $_POST['category-icon-id'] ){
           $image = $_POST['category-icon-id'];
           update_term_meta ( $term_id, 'category-icon-id', $image );
        } else {
          update_term_meta ( $term_id, 'category-icon-id', '' );
        }
      }






/*
 * Add script
 * @since 1.0.0
 */
 public function add_script() { ?>
   <script>
     jQuery(document).ready( function($) {
       function ftagementor_media_upload(button_class) {
         var _custom_media = true,
         _orig_send_attachment = wp.media.editor.send.attachment;
         $('body').on('click', button_class, function(e) {
           var button_id = '#'+$(this).attr('id');
           var send_attachment_bkp = wp.media.editor.send.attachment;
           var button = $(button_id);
           _custom_media = true;
           wp.media.editor.send.attachment = function(props, attachment){
             if ( _custom_media ) {
               $('#category-icon-id').val(attachment.id);
               $('#category-icon-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
               $('#category-icon-wrapper .custom_media_image').attr('src',attachment.url).css('display','block');
             } else {
               return _orig_send_attachment.apply( button_id, [props, attachment] );
             }
            }
         wp.media.editor.open(button);
         return false;
       });
     }
    ftagementor_media_upload('.ftagementor_tax_media_button.button');

     $('body').on('click','.ftagementor_tax_media_remove',function(){
       $('#category-icon-id').val('');
       $('#category-icon-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
     });

     $(document).ajaxComplete(function(event, xhr, settings) {
       var queryStringArr = settings.data.split('&');
       if( $.inArray('action=add-tag', queryStringArr) !== -1 ){
         var xml = xhr.responseXML;
         $response = $(xml).find('term_id').text();
         if($response!=""){
           // Clear the thumb icon
           $('#category-icon-wrapper').html('');
         }
       }
     });


   });
 </script>
 <?php }

    }

    $FTAGEMENTOR_TAX_META = new FTAGEMENTOR_TAX_META();
   
  }

?>