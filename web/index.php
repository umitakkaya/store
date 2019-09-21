<?php declare(strict_types=1);

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidFactory;
use Store\Domain\Cart;
use Store\Domain\Item;
use Store\Domain\User;
use Store\Infrastructure\LoggingMessageBus;
use Store\Repository\EventRepository;
use Store\Repository\Mapper\EventMapper;
use Store\Repository\UserRepository;
use Store\Service\Store;

require __DIR__ . '/../vendor/autoload.php';

$service = new Store(
	new UserRepository(),
	new EventRepository(
		new LoggingMessageBus(
			new Logger('store_message_bus', [new StreamHandler(fopen('php://stdout', 'wb'))])
		),
		new EventMapper()
	)
);

$user = new User(
	new Cart()
);

$user->order(new Item(Uuid::uuid4(), '2lt Bottled water', 1), 2);
$user->order(new Item(Uuid::uuid4(), 'Chocolate muffin', 3), 1);

$service->checkout($user);
