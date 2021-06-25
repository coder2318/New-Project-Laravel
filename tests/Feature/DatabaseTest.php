<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDatabase()
    {
       $this->assertDatabaseHas('products', [
          'name' => 'kivi'
       ]);
    }

    public function testStoreDatabase()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMjMxYzMzMDdlNjRlYTkyZWQ3YzdiZDYxYmVhZjMyN2IzNWIzZTNkZWIyYzIyODUwNzg0Mzg0MDVkZDk4ZTI5YzdhMTc3NjA1NDFhNTI2ZjQiLCJpYXQiOjE2MjQ0NjI0OTgsIm5iZiI6MTYyNDQ2MjQ5OCwiZXhwIjoxNjU1OTk4NDk4LCJzdWIiOiIxMSIsInNjb3BlcyI6W119.z8KZbohEUy6wWNgAYf7yhwR9G1V9OtVwKI3qKku-F4Ibp3SzJBXKzoFG7SoJWKTeb1CxxFb6g4F-b300HZF4ATKBHaJ1QLcK8miv-PHv5qafZByDCLbeFu9xf8YothXdGDAx68t2aoBygWp78XmNY2eIoTFQt2HN9629WM96u5ISOXZYeyuqPOiE1tkNcu5-D3YIj21FKQu4ZZN74ulSoK9yY24Mp5Kr4LKseYcpesqTH6fjlBkPh41vUblwTJFd_VLjpxVXA6GE59E7q9QZr1kBPcIrSMohYlLHeHUSTZi8KHBms26Y_NVwe8txT3EyrzivY3j0KhDJgKPq80EePB_TrrGHn-i-t0i_S_oJaGrWEz6qYOErfJ7ow2p_oAMuDP2eE3biD2QWJogpzbPi4lMfdCR1sdGf66bgi4EnlfqrTkVzCxluT5fdtFeGnecLwfBwWrF0FG7OVPq0UmOGZksPs-1DjsQAgrZGhB6SDJZhIM3FOLqq1Gq6G9DfRsuYfFaPZUlly1iygUG5zocjDRTsjQyhm_rdE1i2Kn1cmEgMXWd-QGfDpc2a0wiTL4cFxjOUTtL8S4xhEX0ruhBVOJflKDS36MJqqdVOh4XfDeAIY07jdS8UrsDB-bRa0LPgTbHOQh797fGqcOppZjicX7MovrB9-q6fsmjwkGF7MXg'
        ])->json('POST', '/api/products', [
           'name' => 'test name',
           'price' => 15000,
            'quantity' => 121,
            'category_id' => 1
        ]);

        $response->assertStatus(200);
    }

    public function testUpdateDatabase()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMjMxYzMzMDdlNjRlYTkyZWQ3YzdiZDYxYmVhZjMyN2IzNWIzZTNkZWIyYzIyODUwNzg0Mzg0MDVkZDk4ZTI5YzdhMTc3NjA1NDFhNTI2ZjQiLCJpYXQiOjE2MjQ0NjI0OTgsIm5iZiI6MTYyNDQ2MjQ5OCwiZXhwIjoxNjU1OTk4NDk4LCJzdWIiOiIxMSIsInNjb3BlcyI6W119.z8KZbohEUy6wWNgAYf7yhwR9G1V9OtVwKI3qKku-F4Ibp3SzJBXKzoFG7SoJWKTeb1CxxFb6g4F-b300HZF4ATKBHaJ1QLcK8miv-PHv5qafZByDCLbeFu9xf8YothXdGDAx68t2aoBygWp78XmNY2eIoTFQt2HN9629WM96u5ISOXZYeyuqPOiE1tkNcu5-D3YIj21FKQu4ZZN74ulSoK9yY24Mp5Kr4LKseYcpesqTH6fjlBkPh41vUblwTJFd_VLjpxVXA6GE59E7q9QZr1kBPcIrSMohYlLHeHUSTZi8KHBms26Y_NVwe8txT3EyrzivY3j0KhDJgKPq80EePB_TrrGHn-i-t0i_S_oJaGrWEz6qYOErfJ7ow2p_oAMuDP2eE3biD2QWJogpzbPi4lMfdCR1sdGf66bgi4EnlfqrTkVzCxluT5fdtFeGnecLwfBwWrF0FG7OVPq0UmOGZksPs-1DjsQAgrZGhB6SDJZhIM3FOLqq1Gq6G9DfRsuYfFaPZUlly1iygUG5zocjDRTsjQyhm_rdE1i2Kn1cmEgMXWd-QGfDpc2a0wiTL4cFxjOUTtL8S4xhEX0ruhBVOJflKDS36MJqqdVOh4XfDeAIY07jdS8UrsDB-bRa0LPgTbHOQh797fGqcOppZjicX7MovrB9-q6fsmjwkGF7MXg'
        ])->json('PUT', '/api/products/68', [
            'name' => 'test name udpate 22',
            'price' => 15000,
            'quantity' => 121,
            'category_id' => 2
        ]);

        $response->assertStatus(200)->assertJson(['message' => 'Ok', 'success' => true]);
    }
}
