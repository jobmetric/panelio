<?php

if (!function_exists('get_current_panel')) {
    /**
     * Get the current panel
     *
     * @return string|null
     */
    function get_current_panel(): ?string
    {
        $parts = explode('/', request()->path());

        if (count($parts) > 1 && $parts[0] === 'p') {
            return $parts[1];
        }

        return null;
    }
}
