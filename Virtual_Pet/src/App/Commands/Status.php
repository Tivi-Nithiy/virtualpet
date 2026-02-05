<?php

namespace App\Commands;

use Domain\Pet_Management;
use App\DispatchResult;

final class Status implements Command
{
    public function name(): string
    {
        return 'status';
    }

    public function help(): string
    {
        return "status          - get status of your pet";
    }

    public function run(Pet_Management $pet_manager, array $args): DispatchResult
    {
        $status = $pet_manager->status();
        return new DispatchResult (" Name: {$status[0]}\n Age: {$status[1]}\n Hunger: {$status[2]}\n Energy: {$status[3]}\n Happiness: {$status[4]}\n Health: {$status[5]}\n\n Tick: {$status[6]}\n"); 
    }
}