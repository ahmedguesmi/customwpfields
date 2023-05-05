<?php
 /** 
  * Displays a code field with stylized code
  */
namespace Ahmedguesmi\Customwpfields\Fields;
use Ahmedguesmi\Customwpfields\Field as Field;

// Bail if accessed directly
if ( ! defined( 'ABSPATH' ) )
    die;

class Code implements Field {

    /**
     * Prepares the variables and renders the field
     * 
     * @param   array $field The array with field attributes
     * @return  void
     */       
    public static function render( array $field = [] ): void {
        
        $id         = esc_attr( $field['id'] );
        $name       = esc_attr( $field['name'] );
        $mode       = isset($field['mode']) ? esc_attr($field['mode']) : 'htmlmixed';
        $values     = html_entity_decode( $field['values'] );
        
        // Only Enqueue if it is not enqueued yet
        if( apply_filters('customwpfields_code_field_js', true) && ! wp_script_is('mirror-js', 'enqueued') ) {
            wp_enqueue_script('mirror-js');
        } ?>
        
            <textarea class="wpcf-code-editor-value" id="<?php echo $id; ?>" name="<?php echo $name; ?>" data-mode="<?php echo $mode; ?>"><?php echo $values; ?></textarea>

        <?php 

    }

    /**
     * Returns the global configurations for this field
     *
     * @return array $configurations The configurations
     */  
    public static function configurations(): array {

        $configurations = [
            'type'      => 'code',
            'defaults'  => ''
        ];
            
        return apply_filters( 'customwpfields_code_config', $configurations );

    }
    
}
