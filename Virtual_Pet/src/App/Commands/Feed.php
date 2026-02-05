<?php

namespace App\Commands;

use Domain\Pet_Management;
use App\DispatchResult;

final class Feed implements Command
{
    public function name(): string
    {
        return 'feed';
    }

    public function help(): string
    {
        return "feed            - feed your pet";
    }

    public function run(Pet_Management $pet_manager, array $args): DispatchResult
    {
        if ($pet_manager->checkAlive() === 0)
                {
                return new DispatchResult('Your pet has died due to low health');
                }
        $pet_manager->feed();
        return new DispatchResult ("Yum!"); 
    }
}