<?php declare(strict_types=1);

namespace Store\Repository;

use Store\Domain\User;

class UserRepository
{
	public function persist(User $user): void
	{
		// persist user to a storage
	}
}
