<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

class EventFactory extends Factory
{
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'event_name' => "EVENT" . $this->faker->name,
            'event_of_date' => $this->faker->date('Y_m_d'),
            'slug' => $this->faker->paragraph(),
            'excert' => $this->faker->paragraph(), // password
            'event_content' => $this->faker->paragraph(2), // password
            'event_image' => "default.png",
        ];
    }
}
