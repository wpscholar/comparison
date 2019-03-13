<?php
/**
 * A PHP library to make dynamic comparisons easy.
 *
 * @package wpscholar;
 */

namespace wpscholar;

/**
 * Class Comparison
 *
 * @package wpscholar
 */
class Comparison {

	/**
	 * Internal storage of operators.
	 *
	 * @var Container
	 */
	protected $operators;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->operators = new Container();
		$this->register_operators();
	}

	/**
	 * Compare two values.
	 *
	 * @param mixed  $a The first, or leftmost value.
	 * @param string $operator The operator to use.
	 * @param mixed  $b The last, or rightmost value.
	 * @return bool
	 */
	public function compare( $a, $operator, $b ) {
		return call_user_func( $this->operators->get( $operator ), $a, $b );
	}

	/**
	 * Register operators.
	 */
	protected function register_operators() {

		$this->operators->set(
			'==',
			function ( $a, $b ) {
				return $a == $b; // phpcs:ignore -- Loose comparison is intentional
			}
		);

		$this->operators->set(
			'===',
			function ( $a, $b ) {
				return $a === $b;
			}
		);

		$this->operators->set(
			'!=',
			function ( $a, $b ) {
				return $a != $b; // phpcs:ignore -- Loose comparison is intentional
			}
		);

		$this->operators->set(
			'!==',
			function ( $a, $b ) {
				return $a !== $b;
			}
		);

		$this->operators->set(
			'<>',
			function ( $a, $b ) {
				return $a <> $b; // phpcs:ignore -- Loose comparison is intentional
			}
		);

		$this->operators->set(
			'>',
			function ( $a, $b ) {
				return $a > $b;
			}
		);

		$this->operators->set(
			'>=',
			function ( $a, $b ) {
				return $a >= $b;
			}
		);

		$this->operators->set(
			'<',
			function ( $a, $b ) {
				return $a < $b;
			}
		);

		$this->operators->set(
			'<=',
			function ( $a, $b ) {
				return $a <= $b;
			}
		);

		$this->operators->set(
			'<=>',
			function ( $a, $b ) {
				return $a <=> $b; // phpcs:ignore -- Incompatible with PHP5.6 or earlier
			}
		);

	}

}
