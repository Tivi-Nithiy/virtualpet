<?php

namespace App;

use App\Commands\Command;
use App\Commands\Feed;
use App\Commands\Help;
use App\Commands\Play;
use App\Commands\Quit;
use App\Commands\Rename;
use App\Commands\Sleep;
use App\Commands\Status;
use App\Commands\Tick;

use Domain\DomainException;
use Domain\Pet_Management;

final class CommandRouter
{
    private array $commands = [];

    public function __construct()
    {
        $this->register(new Feed());
        $this->register(new Play());
        $this->register(new Rename());
        $this->register(new Sleep());
        $this->register(new Status());
        $this->register(new Tick());

        $this->register(new Quit());
        $this->register(new Help(fn() => $this->all()));
    }

    public function register(Command $command): void
    {
        $this->commands[$command->name()] = $command;
    }

    /** @return Command[] */
    public function all(): array
    {
        return array_values($this->commands);
    }

    public function dispatch(string $line, Pet_Management $system): DispatchResult
    {
        [$verb, $args] = $this->parse($line);

        $command = $this->commands[$verb] ?? null;
        if ($command === null) {
            throw new DomainException("Unknown command '{$verb}'. Try: help");
        }

        return $command->run($system, $args);
    }

    /**
     * @return array{0:string,1:list<string>}
     */
    private function parse(string $line): array
    {
        $parts = str_getcsv($line, ' ', '"');
        $verb = strtolower((string)($parts[0] ?? ''));

        if ($verb === '') {
            throw new DomainException("Empty command. Try: help");
        }

        /** @var list<string> $args */
        $args = array_values(array_slice($parts, 1));
        return [$verb, $args];
    }
}

final class DispatchResult
{
    public function __construct(
        public string $output = '',
        public bool   $shouldQuit = false,
    )
    {
    }

    public static function quit(string $message = ''): self
    {
        return new self($message, true);
    }
}