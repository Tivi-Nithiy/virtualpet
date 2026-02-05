<?php

require_once __DIR__ . '/../src/Domain/DomainException.php';
require_once __DIR__ . '/../src/Domain/BaseStats.php';
require_once __DIR__ . '/../src/Domain/Pet.php';
require_once __DIR__ . '/../src/Domain/Pet_Management.php';
require_once __DIR__ . '/../src/Domain/Alive.php';


require_once __DIR__ . '/../src/App/Commands/Command.php';
require_once __DIR__ . '/../src/App/Commands/Help.php';
require_once __DIR__ . '/../src/App/Commands/Feed.php';
require_once __DIR__ . '/../src/App/Commands/Play.php';
require_once __DIR__ . '/../src/App/Commands/Rename.php';
require_once __DIR__ . '/../src/App/Commands/Sleep.php';
require_once __DIR__ . '/../src/App/Commands/Status.php';
require_once __DIR__ . '/../src/App/Commands/Tick.php';
require_once __DIR__ . '/../src/App/Commands/Quit.php';


require_once __DIR__ . '/../src/App/CommandRouter.php';
require_once __DIR__ . '/../src/App/ConsoleApp.php';

use App\ConsoleApp;
use App\CommandRouter;
use Domain\Pet_Management;
use Domain\Pet;

$petManager = new Pet_Management();
$router = new CommandRouter();
$app = new ConsoleApp($petManager, $router);

$app->run();