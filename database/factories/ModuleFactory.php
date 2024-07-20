<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Module>
 */
class ModuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Dashboard',
            'route' => '#',
            'icon' => 'side-menu__icon si si-screen-desktop',
            'parent_id' => '0',
            'sorting' => null,
        ];
    }
}
