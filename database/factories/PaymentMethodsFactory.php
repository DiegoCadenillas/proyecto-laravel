<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User as User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaymentMethods>
 */
class PaymentMethodsFactory extends Factory
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
            'fullName' => fake()->firstName() . " " . fake()->lastName(),
            'cardNumber' => fake()->creditCardNumber(),
            'expiryDate' => fake()->creditCardExpirationDate(),
            'fiscalCountry' => fake()->country(),
            'fiscalCity' => fake()->city(),
            'fiscalStreet' => fake()->streetAddress(),
            'fiscalPostalCode' => fake()->postcode()
        ];
    }
}
