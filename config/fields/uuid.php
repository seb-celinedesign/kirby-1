<?php

return [
	'extends' => 'text',
	'props' => [
		/**
		 * Unset inherited props
		 */
		'converter'  => null,
		'counter'    => null,
		'spellcheck' => null,

		/**
		 * Whether to copy UUID or permalink
		 */
		'copy'  => function ($copy = 'uuid') {
			return $copy;
		},

		/**
		 * Changes the icon
		 */
		'icon' => function (string $icon = 'badge') {
			return $icon;
		}
	],
	'computed' => [
		'copy'  => function () {
			if ($this->copy === 'uuid') {
				return $this->model()->uuid();
			}

			if ($this->copy === 'permalink') {
				return $this->model()->permalink();
			}
		},
	]
];
