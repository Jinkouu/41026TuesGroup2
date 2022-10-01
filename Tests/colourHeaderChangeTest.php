<?php

namespace Tests;
use PHPUnit\Framework\TestCase;

class colourHeaderChangeTest extends TestCase
{
    public function testChangeColour(): void
    {
        $colourChange = [];
        $this->assertSame(0, count($colourChange));

        array_push($colourChange, 'foo');
        $this->assertSame('foo', $colourChange[count($colourChange)-1]);
        $this->assertSame(1, count($colourChange));

        $this->assertSame('foo', array_pop($colourChange));
        $this->assertSame(0, count($colourChange));
    }

}

