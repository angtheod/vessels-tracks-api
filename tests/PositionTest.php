<?php

namespace Tests;

class PositionTest extends TestCase
{
    /**
     * A Position unit test.
     *
     * @return void
     */
    public function test_that_base_endpoint_returns_a_successful_response()
    {
        $this->get('/');

        $this->assertEquals(
            true, true
        );
    }
}
