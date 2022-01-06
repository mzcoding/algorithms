<?php declare(strict_types=1);

class Login implements SplSubject
{
	private SplObjectStorage $storage;

	public function __construct()
	{
		$this->storage = new SplObjectStorage();
	}

	public function attach(SplObserver $observer): void
	{
		$this->storage->attach($observer);
	}

	public function detach(SplObserver $observer): void
	{
		$this->storage->detach($observer);
	}

	public function notify(): void
	{
		foreach($this->storage as $observer) {
			$observer->doUpdate($this);
		}
	}
}

abstract class LoginObserver implements SplObserver {
	private Login $login;

	public function __constructor(Login $login)
	{
		$this->login = $login;
		$login->attach($this);
	}

	public function update(SplSubject $subject): void
	{
		if($subject === $this->login) {
			$this->doUpdate($subject);
		}
	}

	abstract function doUpdate(Login $login);
}

class SecurityMonitor extends LoginObserver {

	function doUpdate(Login $login)
	{
		// TODO: Implement doUpdate() method.
	}
}

class GeneralLogger extends LoginObserver {

	function doUpdate(Login $login)
	{
		// TODO: Implement doUpdate() method.
	}
}