<?php

if (class_exists(\PHPUnit\Framework\TestCase::class)) {
    abstract class TestCase extends PHPUnit\Framework\TestCase { } // @codingStandardsIgnoreLine
} else { /* compatibility with PHPUnit < 5.7 */
    abstract class TestCase extends PHPUnit_Framework_TestCase { } // @codingStandardsIgnoreLine
}
?>
