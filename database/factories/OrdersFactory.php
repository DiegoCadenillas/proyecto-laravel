<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User as User;
use App\Models\PaymentMethods as PaymentMethods;
use App\Models\Addresses as Addresses;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Orders>
 */
class OrdersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'userId' => User::factory(),
            'paymentMethodId' => PaymentMethods::factory(),
            'addressId' => Addresses::factory(),
            'orderDate' => fake()->dateTimeBetween('-1 year', 'now')
        ];
    }
}
