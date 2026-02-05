<?php

namespace App\Commands;

use Domain\Pet_Management;
use Domain\DomainException;
use App\DispatchResult;

final class Rename implements Command
{
    public function name(): string
    {
        return 'rename';
    }

    public function help(): string
    {
        return "rename          - rename your pet";
    }

    public function run(Pet_Management $pet_manager, array $args): DispatchResult
    {
        if (count($args) < 1)
            {
                throw new DomainException("rename requires: name");
            }
        $newName = $args[0];
        $pet_manager->rename($newName);
        return new DispatchResult ("Your pet has been named to {$newName}"); 
    }
}