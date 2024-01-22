<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OwnerTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_the_group_owner_service_returns_a_successful_response(){

        $input = ["insurance.txt" => "Company A", "letter.docx" => "Company A", "Contract.docx" => "Company B"];

        $response = $this->
        postJson('/api/group',$input);

        $response->assertJson(
            [
                "Company A"=> [
                    "insurance.txt",
                    "letter.docx"
                ],
                "Company B"=> [
                    "Contract.docx"
                ]
            ]
        );
        $response->assertStatus(200);
    }
}
