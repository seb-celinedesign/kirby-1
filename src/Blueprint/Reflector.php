<?php

namespace Kirby\Blueprint;

use Kirby\Toolkit\Str;
use ReflectionClass;
use ReflectionParameter;
use ReflectionProperty;
use ReflectionUnionType;
use Throwable;

/**
 * Reflector
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Reflector
{
	public string $class;
	public ReflectionClass $reflection;

	public function __construct(string $class)
	{
		$this->class      = $class;
		$this->reflection = new ReflectionClass($this->class);
	}

	public function comment(string|null $comment = null): string
	{
		$comment = str_replace(['/**', '*/'], '', $comment);
		$comment = Str::split($comment, PHP_EOL);

		$lines = [];

		foreach ($comment as $line) {
			$line = trim($line);

			// remove star
			$line = trim(preg_replace('!^\*!', '', $line));

			// stop before first parameter
			if (str_starts_with($line, '@') === true) {
				break;
			}

			$lines[] = $line;
		}

		return trim(implode(PHP_EOL, $lines));
	}

	public function field(string $name): Field
	{
		$prop  = $this->props()[$name];
		$type  = $prop['type'];
		$field = match ($type) {
			'float'  => new NumberField($name),
			'bool'   => new ToggleField($name),
			'string' => new TextField($name),
			default  => new InputField($name)
		};

		$field->set('required', $prop['required']);
		$field->set('help', $prop['comment']);

		return $field;
	}

	public function isRequiredProp(string $prop): bool
	{
		try {
			$parameter = new ReflectionParameter([$this->class, '__construct'], $prop);
			return $parameter->isOptional() === false;
		} catch (Throwable) {
			return false;
		}
	}

	public function propClassReflection(ReflectionProperty $prop): ?ReflectionClass
	{
		try {
			return new ReflectionClass($this->propType($prop));
		} catch (Throwable) {
			return null;
		}
	}

	public function propComment(ReflectionProperty $prop): ?string
	{
		$comment = $prop->getDocComment();

		if (empty($comment) === true) {
			if ($classReflection = $this->propClassReflection($prop)) {
				$comment = $this->comment($classReflection->getDocComment());
			}
		}

		return $this->comment($comment);
	}

	public function propType(ReflectionProperty $prop): ?string
	{
		if ($prop->hasType() === false) {
			return null;
		}

		$type = $prop->getType();

		if (is_a($type, ReflectionUnionType::class) === true) {
			return $type->getTypes()[0]->getName();
		}

		return $type->getName();
	}

	public function props(): array
	{
		$props = [];

		foreach ($this->reflection->getProperties() as $prop) {
			$info = [
				'comment'  => $this->propComment($prop),
				'name'     => $name = $prop->getName(),
				'required' => $this->isRequiredProp($name),
				'type'     => $this->propType($prop),
			];

			$props[$name] = $info;
		}

		ksort($props);

		return $props;
	}
}
