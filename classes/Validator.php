<?php


class Validator {

	protected $pattern;

	function isValid($string) {

		if (preg_match($this->pattern, $string)) {
            return true;
        } else {
        	return false;
        }

	}

}

class StringValidator extends Validator {
	protected $pattern = "/^[a-zA-Z]{2,60}$/";
}

$stringValidator = new StringValidator;