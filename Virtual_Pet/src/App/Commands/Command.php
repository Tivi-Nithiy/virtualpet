<?php

namespace App\Commands;

use Domain\Pet_Management;
use App\DispatchResult;

interface Command
{
    public function name(): string;

    public function help(): string;

    public function run(Pet_Management $petManagement, array $args): DispatchResult;
}