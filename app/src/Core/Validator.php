<?php

namespace Core;

class Validator
{
	public function validate(array $settings, array $params): array
	{
		$errorMessage = [];
		foreach ($_POST as $key => $value) {
			$value = trim($value);
			
			if (!empty($settings[$key]['required']) && empty($value)) {
				$errorMessage[$key] = 'Måste fyllas i';
			}

			if (empty($errorMessage[$key])
				&& !empty($settings[$key]['isEmail']) 
				&& !filter_var($value, FILTER_VALIDATE_EMAIL)
			) {
				$errorMessage[$key] = $value . ' är ej en giltig e-postadress';
			}
		}
		
		return $errorMessage;
	}
}
