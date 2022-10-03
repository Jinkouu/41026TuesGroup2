<?php

namespace Tests;
use PHPUnit\Framework\TestCase;

class recentTest extends TestCase
{
    public function testRecent(): void
    {
        $response = $this->withSession(['foo' => 'bar'])->get('/');
        $response->assertStatus(200);
    }
}


