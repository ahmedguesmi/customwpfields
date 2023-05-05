<?php
 /** 
  * Displays a text input field
  */
namespace Ahmedguesmi\Customwpfields\Fields;
use Ahmedguesmi\Customwpfields\Field as Field;

// Bail if accessed directly
if ( ! defined('ABSPATH') ) {
    die;
}

class Input implements Field {
    
    /**
     * Prepares the variables and renders the field
     * 
     * @param   array $field The array with field attributes data-alpha
     * @return  void
     */       
    public static function render( array $field = [] ): void {
        
        $attributes     = '';
        $class          = isset($field['style']) && $field['style'] ? esc_attr($field['style']) : 'regular-text';
        $id             = esc_attr($field['id']);
        $name           = esc_attr($field['name']);     
        $placeholder    = isset($field['placeholder']) && $field['placeholder'] ? ' placeholder="' . esc_attr($field['placeholder']) . '"' : '';
        $type           = isset($field['subtype']) && $field['subtype'] ? esc_attr($field['subtype']) : 'text';
        $value          = esc_attr($field['values']);   

        foreach( array('min', 'max', 'readonly', 'step') as $attribute ) {
            if( isset($field[$attribute]) && $field[$attribute] !== '' ) {
                $attributes .= ' ' . $attribute . '="' . esc_attr($field[$attribute]) . '"';  
            }
        }

        // Our definite field class
        $class = $type == 'number' && ! isset($field['style']) ? 'small-text' : $class; ?>

            <input class="<?php echo $class; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" type="<?php echo $type; ?>" value="<?php echo $value; ?>" <?php echo $placeholder . $attributes; ?> />    
        
        <?php
    }
    
    /**
     * Returns the global configurations for this field
     *
     * @return array $configurations The configurations
     */      
    public static function configurations(): array {
        
        $configurations = [
            'type'      => 'input',
            'defaults'  => ''
        ];
            
        return apply_filters( 'customwpfields_input_config', $configurations );

    }
    
}