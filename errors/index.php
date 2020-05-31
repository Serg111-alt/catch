<?php
class NegativeValue extends Exception {
	private $value;
	public function __construct($message, $code, $value) {
		parent::__construct ( $message, $code );
		$this->value = $value;
	}

	public function getValue() {
		return $this->value;
	}

	public function __toString() {
		return "Исключение " . $this->getCode () . ": " . $this->getMessage () . "\n" 
				. " в " . $this->getFile () . ", строка " . $this->getLine () . "\n" 
				. "значение a:" . $this->value;
	}
}

function equation($a,$b) {
	if ($a == 0) {
		throw new NegativeValue ( "значение равно нулю!", E_ERROR, $a );
	}
	return -$b/$a;
}

try {
	$a = 0;
	$b = 10;
	$y = equation( $a,$b );
	echo $y;
} catch ( NegativeValue $ex ) {
	echo $ex;
}catch ( Exception $ex ) {
	echo $ex;
}
