<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use phpDocumentor\Reflection\Types\Null_;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $senderId = $this->faker->randomElement([0, 1]);
        if ($senderId === 0) {
            $senderId = $this->faker->randomElement(\App\Models\User::pluck('id')->toArray()); // Generate a random number for sender_id
            $receiverId =1;
        } else {
            $receiverId = $this->faker->randomElement(\App\Models\User::pluck('id')->toArray()); // Generate a random number for receiver_id
            $senderId = 1;
        }
        $groupId = null;
        
       
        return [
            'sender_id' =>$senderId,
            'receiver_id' => $receiverId,
            'group_id' => $groupId,
            'message' => $this->faker->realText(200),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),


        ];
    }
}
