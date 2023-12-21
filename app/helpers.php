<?php
if(!function_exists('public_path'))
{

    /**
     * Return the path to public dir
     * @param string|null $path
     * @return string
     */
    function public_path(?string $path = ''): string
    {
        return base_path('public') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}
