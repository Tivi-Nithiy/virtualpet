<?php

namespace App\Commands;

use Domain\Pet_Management;
use App\DispatchResult;

final class Quit implements Command
{
    public function name(): string
    {
        return 'quit';
    }

    public function help(): string
    {
        return "quit            - exit";
    }

    public function run(Pet_Management $pet_manager, array $args): DispatchResult
    {
        return DispatchResult::quit();
    }
}
