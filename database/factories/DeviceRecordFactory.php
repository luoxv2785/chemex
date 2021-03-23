<?php

namespace Database\Factories;

use App\Models\DeviceCategory;
use App\Models\DeviceRecord;
use App\Models\VendorRecord;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeviceRecordFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DeviceRecord::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'asset_number'        => $this->faker->asset_number,
            'category_id' => DeviceCategory::factory(),
            'vendor_id'   => VendorRecord::factory(),
        ];
    }
}
