<?php

namespace Kirby\Validation;

use Closure;
use Kirby\Toolkit\A;
use Throwable;

/**
 * Validations
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Validations
{
	public array $validations = [];

	/**
	 * Add a new validation
	 */
	public function add(string $id, mixed $args = [], string|null $message = null, bool $skipOnEmpty = true): Validation
	{
		return $this->validations[$id] = match (true) {
			// deactivated handler
			$args === false, $args === null => new Validation(
				disabled: true,
				handler: $id,
				message: $message,
			),

			// custom handler
			is_a($args, Closure::class) => new Validation(
				handler: $args,
				message: $message
			),

			// validation object
			is_a($args, Validation::class) => $args,

			// basic validation
			default => new Validation(
				handler: $id,
				args: A::wrap($args),
				message: $message
			)
		};
	}

	/**
	 * Get a validation by id
	 */
	public function get(string $id): ?Validation
	{
		return $this->validations[$id] ?? null;
	}

	/**
	 * Returns an array with all validation errors for the given value
	 */
	public function errors(mixed $value = null): array
	{
		$errors = [];

		foreach ($this->validations as $key => $validation) {
			try {
				$validation->validate($value);
			} catch (Throwable $e) {
				$errors[$key] = $e->getMessage();
			}
		}

		return $errors;
	}

	/**
	 * Remove a validation by id
	 */
	public function remove(string $id)
	{
		unset($this->validations[$id]);
	}

	/**
	 * Validate the value against all set validations
	 */
	public function validate(mixed $value = null): bool
	{
		foreach ($this->validations as $key => $validation) {
			$validation->validate($value);
		}

		return true;
	}
}
