<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);

        $this->call(PaymentGatewaySeeder::class);
        $this->call(StatesSeeder::class);
        $this->call(RoleSeeder::class);

        $this->call(RegionSeeder::class);
        $this->call(SubscriptionCategorySeeder::class);
        $this->call(SubscriptionComponentSeeder::class);
        $this->call(PlanSeeder::class);
        $this->call(PlanSubscriptionComponentSeeder::class);
        $this->call(OperatingCategorySeeder::class);

        $this->call(ItemCategorySeeder::class);
        $this->call(HireTypeSeeder::class);
        $this->call(AccessoriesSeeder::class);
        $this->call(JobTypeSeeder::class);
        $this->call(WorkTypeSeeder::class);
        $this->call(FillTypeSeeder::class);
        $this->call(ResourceTypeSeeder::class);
        $this->call(PlantHireSeeder::class);
        $this->call(JobRequestSeeder::class);

        $this->call(HirerPlantHireSeeder::class);
        $this->call(ServiceSeeds::class);
        $this->call(MaterialTypeSeeder::class);



        $this->call(AdminUserRolesSeeder::class);
    }
}
