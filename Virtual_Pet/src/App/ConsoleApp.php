<?php

namespace App;

use Domain\DomainException;
use Domain\Pet_Management;
use Domain\Pet;

final class ConsoleApp
{
    public function __construct(
        private Pet_Management $petManagement,
        private CommandRouter $router
    )
    {
    }

    public function run(): void
    {
        $this->println('Welcome to your virtual pet. Type "help" for commands. Type "quit" to exit.');
        $myPet = new Pet;
        while (true) {
            $this->print("> ");
            $line = fgets(STDIN);

            if ($line === false) {
                $this->println("\nEOF. Exiting.");
                return;
            }

            $line = trim($line);
            if ($line === '') {
                continue;
            }

            try {
                $result = $this->router->dispatch($line, $this->petManagement);

                if ($result->shouldQuit) {
                    $this->println("Bye.");
                    return;
                }

                if ($result->output !== '') {
                    $this->println($result->output);
                }
            } catch (DomainException $e) {
                $this->println("ERR: " . $e->getMessage());
            } catch (\Throwable $t) {
                // Keep REPL alive on unexpected crashes.
                $this->println("CRASH: " . $t->getMessage());
            }
        }

    }

    private function print(string $s): void
    {
        fwrite(STDOUT, $s);
    }

    private function println(string $s): void
    {
        fwrite(STDOUT, $s . PHP_EOL);
    }
}