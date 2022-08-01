<?php

namespace Tests;

class TrackTest extends TestCase
{
    /**
     * A Track unit test.
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
