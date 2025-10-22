<?php

if (!function_exists('editable_content')) {
    /**
     * Display editable content for admin users in edit mode
     *
     * @param string $key
     * @param string $default
     * @param string $type
     * @return string
     */
    function editable_content($key, $default = '', $type = 'text')
    {
        // Get the content from database or use default
        $content = \App\Models\Setting::where('key', $key)->first();
        $value = $content ? $content->value : $default;
        
        // Check if we're in edit mode
        if (isset($GLOBALS['editMode']) && $GLOBALS['editMode']) {
            // Return editable element for admin users
            return '<div class="editable-content" data-key="' . $key . '" data-type="' . $type . '">' . 
                   $value . 
                   '<div class="edit-overlay">' . 
                   '<i class="fas fa-edit"></i>' . 
                   '</div>' . 
                   '</div>';
        }
        
        // Return plain content for regular users
        return $value;
    }
}