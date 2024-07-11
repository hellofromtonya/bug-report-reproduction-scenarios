<?php

namespace Jrf\PHPUnit\Scenario;

class Foo {
	function throwDeprecation() {
		trigger_error('deprecation', E_USER_DEPRECATED);
		return true;
	}

	function throwNotice() {
		trigger_error('notice', E_USER_NOTICE);
		return true;
	}

	function throwWarning() {
		trigger_error('warning', E_USER_WARNING);
		return true;
	}
}
