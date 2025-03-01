<?php

include 'Verhoeff.php';
include 'AllegedRC4.php';
include 'Base64SIN.php';

class ControlCode {
	function generate($authorizationNumber, $invoiceNumber, $nitci, $dateOfTransaction, $transactionAmount, $dosageKey) {
		//var_dump($authorizationNumber, $invoiceNumber, $nitci, $dateOfTransaction, $transactionAmount, $dosageKey);exit();
		if (empty($authorizationNumber) || empty($invoiceNumber) || empty($dateOfTransaction) || empty($transactionAmount) || empty($dosageKey) || (!strlen($nitci) > 0)) {
			throw new InvalidArgumentException('<b>Todos los campos son obligatorios</b>');
		} else {
			$this->validateNumber($authorizationNumber);
			$this->validateNumber($invoiceNumber);
			$this->validateNumber($dateOfTransaction);
			$this->validateNumber($nitci);
			$this->validateNumber($transactionAmount);
			$this->validateDosageKey($dosageKey);
		}

		$transactionAmount = $this->roundUp($transactionAmount);

		$invoiceNumber = self::addVerhoeffDigit($invoiceNumber, 2);
		$nitci = self::addVerhoeffDigit($nitci, 2);
		$dateOfTransaction = self::addVerhoeffDigit($dateOfTransaction, 2);
		$transactionAmount = self::addVerhoeffDigit($transactionAmount, 2);

		$sumOfVariables = $invoiceNumber + $nitci + $dateOfTransaction + $transactionAmount;
		$sumOfVariables5Verhoeff = self::addVerhoeffDigit($sumOfVariables, 5);

		$fiveDigitsVerhoeff = substr($sumOfVariables5Verhoeff, strlen($sumOfVariables5Verhoeff) - 5);
		$numbers = str_split($fiveDigitsVerhoeff);

		for($i = 0; $i < 5; $i++) {
			 $numbers[$i] = $numbers[$i] + 1;
		}
				
		$string1 = substr($dosageKey, 0, $numbers[0]);
		$string2 = substr($dosageKey, $numbers[0], $numbers[1]);
		$string3 = substr($dosageKey, $numbers[0] + $numbers[1], $numbers[2]);
		$string4 = substr($dosageKey, $numbers[0] + $numbers[1] + $numbers[2], $numbers[3]);
		$string5 = substr($dosageKey, $numbers[0] + $numbers[1] + $numbers[2] + $numbers[3], $numbers[4]);
		
		$authorizationNumberDKey = $authorizationNumber . $string1;
		$invoiceNumberdKey = $invoiceNumber . $string2;
		$NITCIDKey = $nitci . $string3;
		$dateOfTransactionDKey = $dateOfTransaction . $string4;
		$transactionAmountDKey = $transactionAmount . $string5;

		$stringDKey = $authorizationNumberDKey . $invoiceNumberdKey . $NITCIDKey . $dateOfTransactionDKey . $transactionAmountDKey;
		$keyForEncryption = $dosageKey . $fiveDigitsVerhoeff;
		$allegedRC4String = AllegedRC4::encryptMessageRC4($stringDKey, $keyForEncryption, true);
		
		$chars = str_split($allegedRC4String);
		$totalAmount = 0;
		$sp1 = 0;
		$sp2 = 0;
		$sp3 = 0;
		$sp4 = 0;
		$sp5 = 0;
		$tmp = 1;

		for($i = 0; $i < strlen($allegedRC4String); $i++) {
			$totalAmount += ord($chars[$i]);
			switch($tmp) {
				case 1: $sp1 += ord($chars[$i]); break;
				case 2: $sp2 += ord($chars[$i]); break;
				case 3: $sp3 += ord($chars[$i]); break;
				case 4: $sp4 += ord($chars[$i]); break;
				case 5: $sp5 += ord($chars[$i]); break;
			}
			$tmp = ($tmp < 5) ? $tmp + 1 : 1;
		}

		$tmp1 = floor($totalAmount * $sp1 / $numbers[0]);
		$tmp2 = floor($totalAmount * $sp2 / $numbers[1]);
		$tmp3 = floor($totalAmount * $sp3 / $numbers[2]);
		$tmp4 = floor($totalAmount * $sp4 / $numbers[3]);
		$tmp5 = floor($totalAmount * $sp5 / $numbers[4]);
		$sumProduct = $tmp1 + $tmp2 + $tmp3 + $tmp4 + $tmp5;
		$base64SIN = Base64SIN::convert($sumProduct);

		return AllegedRC4::encryptMessageRC4($base64SIN, $dosageKey . $fiveDigitsVerhoeff);
	}

	static function addVerhoeffDigit($value,$max) {
		for($i = 1; $i <= $max; $i++) {
			$value .= Verhoeff::calc($value);
		}
		return $value;
	}

	function roundUp($value) {
		$value2 = str_replace(',','.',$value);
		return round($value2, 0, PHP_ROUND_HALF_UP);
	}
	
	function validateNumber($value) {
		if(!preg_match('/^[0-9,.]+$/', $value)) {
			throw new InvalidArgumentException(sprintf('Error! Valor restringido a número, %s no es un número.', $value));
		}
	}
	
	function validateDosageKey($value) {
		if(!preg_match('/^[A-Za-z0-9=#()*+-_\@\[\]{}%$]+$/', $value)) {
			throw new InvalidArgumentException(sprintf('Error! llave de dosificación,<b> %s </b>contiene caracteres NO permitidos.', $value));
		}
	}
}