<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BasketballerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $positions = ["pointGuard", "shootingGuard", "smallForward", "powerForward", "center"];
        $statuses = [
            "available", "available", "available", "available", "available", "available", "available", "available",
            "injured",
            "suspended"
        ];
        $states = [
            "Alaska", "Alabama", "Arkansas", "American Samoa", "Arizona","California", "Colorado",
            "Connecticut", "District of Columbia", "Delaware", "Florida", "Georgia", "Guam", "Hawaii",
            "Iowa", "Idaho", "Illinois", "Indiana", "Kansas", "Kentucky", "Louisiana", "Massachusetts",
            "Maryland", "Maine", "Michigan", "Minnesota", "Missouri", "Mississippi", "Montana",
            "North Carolina", "North Dakota", "Nebraska", "New Hampshire", "New Jersey", "New Mexico",
            "Nevada", "New York", "Ohio", "Oklahoma", "Oregon", "Pennsylvania", "Puerto Rico",
            "Rhode Island", "South Carolina", "South Dakota", "Tennessee", "Texas", "Utah", "Virginia",
            "Virgin Islands", "Vermont", "Washington", "Wisconsin", "West Virginia", "Wyoming"
        ];
             
        return [
            'name' => fake()->firstNameMale().' '.fake()->lastName(),
            'team' => fake()->randomElement($states),
            'position' => fake()->randomElement($positions),
            'odds' => rand(1, 55),
            'status' => fake()->randomElement($statuses)
        ];
    }
}
