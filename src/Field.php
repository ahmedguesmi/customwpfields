<?php 
/** 
 * Determines the implementation of setting input fields
 */
namespace Ahmedguesmi\Customwpfields;

// Bail if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    die; 
}
interface Field {
    
    public static function render( array $field = [] ): void;
    
    public static function configurations(): array;
    
}