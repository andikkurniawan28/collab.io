<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\Project;
use App\Models\Customer;
use App\Models\Phase;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $role = [
            ["name" => ucwords(str_replace("_", " ", "PM", ))],
            ["name" => ucwords(str_replace("_", " ", "system_analyst", ))],
            ["name" => ucwords(str_replace("_", " ", "UI/UX", ))],
            ["name" => ucwords(str_replace("_", " ", "production", ))],
            ["name" => ucwords(str_replace("_", " ", "QA", ))],
        ];
        Role::insert($role);

        $customer = [
            ["name" => ucwords(str_replace("_", " ", "andik_kurniawan", )), "company" => ucwords(str_replace("_", " ", "PG_kebonagung", ))],
        ];
        Customer::insert($customer);

        $phase = [
            ["name" => ucwords(str_replace("_", " ", "plan")), "color" => "#FFA500"],
            ["name" => ucwords(str_replace("_", " ", "negotiation")), "color" => "#808080"],
            ["name" => ucwords(str_replace("_", " ", "closing")), "color" => "#964B00"],
            ["name" => ucwords(str_replace("_", " ", "design")), "color" => "#00008B"],
            ["name" => ucwords(str_replace("_", " ", "development")), "color" => "#0000FF"],
            ["name" => ucwords(str_replace("_", " ", "production")), "color" => "#008000"],
            ["name" => ucwords(str_replace("_", " ", "maintenance")), "color" => "#000000"],
            ["name" => ucwords(str_replace("_", " ", "debugging")), "color" => "#FF0000"],
        ];
        Phase::insert($phase);

        $project = [
            [
                "title" => ucwords(str_replace("_", " ", "silab", )),
                "description" => "Sistem Informasi Laboratorium",
                "customer_id" => Customer::where("name", ucwords(str_replace("_", " ", "andik_kurniawan", )))->get()->last()->id,
                "phase_id" => Phase::where("name", ucwords(str_replace("_", " ", "plan", )))->get()->last()->id,
                "deadline" => date("Y-m-d"),
                "repository" => "https://github.com/andikkurniawan28/silab",
            ],
        ];
        Project::insert($project);
    }
}
