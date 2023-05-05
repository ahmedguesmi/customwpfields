<?php
 /** 
  * Displays an editor field
  */
namespace Ahmedguesmi\Customwpfields\Fields;
use Ahmedguesmi\Customwpfields\Field as Field;

// Bail if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    die; 
}

class Editor implements Field {
    
    /**
     * Prepares the variables and renders the field
     * 
     * @param   array $field The array with field attributes data-alpha
     * @return  void
     */     
    public static function render( array $field = [] ): void {

        // Implements the settings for the wp_editor as defined in the codex
        if( isset($field['settings']) ) {
            foreach( $field['settings'] as $key => $setting ) {
                // The keys should be in the supported format
                if( ! in_array($key, ['wpautop', 'media_buttons', 'textarea_rows', 'tabindex', 'editor_css', 'editor_class', 'editor_height', 'teeny', 'dfw', 'tinymce', 'quicktags', 'drag_drop_upload']) ) {
                    continue;
                }

                $settings[$key] = $setting;
            }
        }
        
        wp_editor($field['values'], $field['id']);
        
    }

    /**
     * Returns the global configurations for this field
     *
     * @return array $configurations The configurations
     */        
    public static function configurations(): array {

        $configurations = [
            'type'      => 'editor',
            'defaults'  => ''
        ];
            
        return apply_filters( 'customwpfields_editor_config', $configurations );

    }
    
}