<?php declare(strict_types=1);

class RequestHelper {}

abstract class ProcessRequest
{
	abstract public function process(RequestHelper $requestHelper): void;
}

class MainProcess extends ProcessRequest
{
	public function process(RequestHelper $requestHelper): void
	{
		echo __CLASS__ . ": выполнение запроса \n";
	}
}

abstract class DecorateProcess extends ProcessRequest
{
	protected ProcessRequest $processRequest;

	public function __construct(ProcessRequest $processRequest)
	{
		$this->processRequest = $processRequest;
	}
}

//clients' code

class LogRequest extends DecorateProcess
{
	public function process(RequestHelper $requestHelper): void
	{
		echo __CLASS__ . ": регистрация запроса \n";
		$this->processRequest->process($requestHelper);
	}
}

class AuthenticateRequest extends DecorateProcess
{
	public function process(RequestHelper $requestHelper): void
	{
		echo __CLASS__ . ": аутентификация запроса \n";
		$this->processRequest->process($requestHelper);
	}
}

class StructureRequest extends DecorateProcess
{
	public function process(RequestHelper $requestHelper): void
	{
		echo __CLASS__ . ": упорядочение данных запроса \n";
		$this->processRequest->process($requestHelper);
	}
}

$process = new AuthenticateRequest(
	new StructureRequest(
		new LogRequest(
			new MainProcess()
		)
	)
);

$process->process(new RequestHelper());