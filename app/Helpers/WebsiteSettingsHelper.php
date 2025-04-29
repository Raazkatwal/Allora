<?php

use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\Cache;

if (!function_exists('settings')) {
    /**
     * Retrieve a website setting by key or all settings.
     *
     * @param string|null $key The setting key to retrieve (e.g., 'site_name'). If null, returns all settings.
     * @param mixed $default Default value if the key doesn't exist.
     * @return mixed The setting value or all settings as an array.
     */
    function settings($key = null, $default = null)
    {
        // Cache the settings for 24 hours (1440 minutes)
        $settings = Cache::remember('website_settings', 1440, function () {
            return WebsiteSetting::firstOrCreate(
                ['id' => 1],
                [
                    'site_name' => 'Allora',
                    'site_description' => 'A modern e-commerce platform for all your needs.',
                    'maintenance_mode' => false,
                    'email' => 'support@example.com',
                    'phone' => '+1 (555) 123-4567',
                    'address' => '123 Main St, City, Country',
                ]
            )->toArray();
        });

        if ($key === null) {
            return $settings;
        }

        return $settings[$key] ?? $default;
    }
}
