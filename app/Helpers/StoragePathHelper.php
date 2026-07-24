<?php

namespace App\Helpers;

class StoragePathHelper
{
    public static function url(?string $path): string
    {
        if (empty($path)) {
            return '';
        }

        if (preg_match('#^https?://#i', $path)) {
            return $path;
        }

        $normalized = ltrim($path, '/');

        if (str_starts_with($normalized, 'storage/')) {
            return '/' . $normalized;
        }

        if (str_starts_with($normalized, 'public/')) {
            return '/' . str_replace('public/', 'storage/', $normalized);
        }

        if (str_starts_with($normalized, 'app/public/')) {
            return '/' . str_replace('app/public/', 'storage/', $normalized);
        }

        return '/storage/' . $normalized;
    }
}
