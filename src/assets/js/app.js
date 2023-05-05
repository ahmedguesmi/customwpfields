/**
 * This script bundles all the modules from the Customwpfields Application
 */
'use strict';

var fields          = require('./fields');
var options         = require('./options');
var repeatable      = require('./modules/repeatable');
var tabs            = require('./modules/tabs');

window.wcfCodeMirror   = {}; // Contains all the global wcfCodeMirror instance

var init = function() {
    
    // Boot our fields
    fields.init('.wpcf-framework');    
    options.init('.wpcf-framework');
    repeatable.init('.wpcf-framework');
    tabs.init();
    
}

// Boot Customwpfields on Document Ready
jQuery(document).ready(init);