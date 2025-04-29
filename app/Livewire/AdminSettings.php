<?php

namespace App\Livewire;

use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class AdminSettings extends Component
{
    public $name;
    public $description;
    public $email;
    public $phone;
    public $address;
    public bool $maintenance_mode;

    public function mount()
    {
        $this->name = settings('site_name');
        $this->description = settings('site_description');
        $this->email = settings('email');
        $this->phone = settings('phone');
        $this->address = settings('address');
        $this->maintenance_mode = settings('maintenance_mode');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required',
            'maintenance_mode' => 'required|boolean',
        ]);
        $setting = WebsiteSetting::first();
        $setting->site_name = $this->name;
        $setting->site_description = $this->description;
        $setting->phone = $this->phone;
        $setting->address = $this->address;
        $setting->maintenance_mode = $this->maintenance_mode;
        $setting->save();
        Cache::forget('website_settings');
    }

    public function render()
    {
        return view('livewire.admin-settings')->layout('components.layouts.admin_layout');
    }
}
