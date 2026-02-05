<?php

namespace App\Commands;

use Domain\Pet_Management;
use App\DispatchResult;

final class Sleep implements Command
{
    public function name(): string
    {
        return 'sleep';
    }

    public function help(): string
    {
        return "sleep           - let your pet sleep";
    }

    public function run(Pet_Management $pet_manager, array $args): DispatchResult
    {
        if ($pet_manager->checkAlive() === 0)
                {
                return new DispatchResult('Your pet has died due to low health');
                }
        $pet_manager->sleep();
        return new DispatchResult ("Goodnight!"); 
    }
}