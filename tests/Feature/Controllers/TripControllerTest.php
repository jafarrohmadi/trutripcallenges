<?php

namespace Tests\Feature\Controllers;

use App\Models\Trip;
use App\Models\User;
use Tests\TestCase;

class TripControllerTest extends
    TestCase
{
    public function testTripShowAllSuccessfully()
    {
        $user = User::factory()->create([
            'email'    => 'sample@test.com',
            'password' => bcrypt('sample123'),
        ]);

        $this->actingAs($user, 'api');

        Trip::factory()->create([
            'user_id'       => $user->id,
            'title'         => 'vacation',
            'origin'        => 'jakarta',
            'destination'   => 'bali',
            'start_date'    => '2022-01-05',
            'end_date'      => '2022-01-07',
            'type_of_trip'  => 'vacation',
            'description'   => 'for healty life',
            'how_many_days' => '3',
        ]);

        Trip::factory()->create([
            'user_id'       => $user->id,
            'title'         => 'vacation2',
            'origin'        => 'jakarta',
            'destination'   => 'bali',
            'start_date'    => '2022-01-05',
            'end_date'      => '2022-01-09',
            'type_of_trip'  => 'vacation',
            'description'   => 'for healty life',
            'how_many_days' => '4',
        ]);

        $this->json('GET', 'api/trip', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "data"    => [
                    [
                        "id"            => 1,
                        'title'         => 'vacation',
                        'origin'        => 'jakarta',
                        'destination'   => 'bali',
                        'start_date'    => '2022-01-05',
                        'end_date'      => '2022-01-07',
                        'type_of_trip'  => 'vacation',
                        'description'   => 'for healty life',
                        'how_many_days' => '3',
                    ],
                    [
                        "id"            => 2,
                        'title'         => 'vacation2',
                        'origin'        => 'jakarta',
                        'destination'   => 'bali',
                        'start_date'    => '2022-01-05',
                        'end_date'      => '2022-01-09',
                        'type_of_trip'  => 'vacation',
                        'description'   => 'for healty life',
                        'how_many_days' => '4',
                    ],
                ],
                "message" => "Success",
                "status"  => "true",
            ]);
    }

    public function testTripCreatedSuccessfully()
    {
        $user = User::factory()->create([
            'email'    => 'sample@test.com',
            'password' => bcrypt('sample123'),
        ]);

        $this->actingAs($user, 'api');

        $tripData = [
            'title'        => 'vacation',
            'origin'       => 'jakarta',
            'destination'  => 'bali',
            'start_date'   => '2022-01-05',
            'end_date'     => '2022-01-07',
            'type_of_trip' => 'vacation',
            'description'  => 'for healty life',
        ];

        $this->json('POST', 'api/trip', $tripData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "status"  => 'true',
                "message" => "Success",
                "data"    => [],
            ]);
    }

    public function testTripShowSuccessfully()
    {
        $user = User::factory()->create([
            'email'    => 'sample@test.com',
            'password' => bcrypt('sample123'),
        ]);

        $this->actingAs($user, 'api');

        Trip::factory()->create([
            'user_id'       => $user->id,
            'title'         => 'vacation',
            'origin'        => 'jakarta',
            'destination'   => 'bali',
            'start_date'    => '2022-01-05',
            'end_date'      => '2022-01-07',
            'type_of_trip'  => 'vacation',
            'description'   => 'for healty life',
            'how_many_days' => '3',
        ]);


        $this->json('GET', 'api/trip/1', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "data"    => [
                    "id"            => 1,
                    'title'         => 'vacation',
                    'origin'        => 'jakarta',
                    'destination'   => 'bali',
                    'start_date'    => '2022-01-05',
                    'end_date'      => '2022-01-07',
                    'type_of_trip'  => 'vacation',
                    'description'   => 'for healty life',
                    'how_many_days' => '3',

                ],
                "message" => "Success",
                "status"  => "true",
            ]);
    }

    public function testTripUpdateSuccessfully()
    {
        $user = User::factory()->create([
            'email'    => 'sample@test.com',
            'password' => bcrypt('sample123'),
        ]);

        $this->actingAs($user, 'api');

        Trip::factory()->create([
            'user_id'       => $user->id,
            'title'         => 'vacation',
            'origin'        => 'jakarta',
            'destination'   => 'bali',
            'start_date'    => '2022-01-05',
            'end_date'      => '2022-01-07',
            'type_of_trip'  => 'vacation',
            'description'   => 'for healty life',
            'how_many_days' => '3',
        ]);

        $tripData = [
            'title'        => 'vacation',
            'origin'       => 'jakarta',
            'destination'  => 'bali',
            'start_date'   => '2022-01-05',
            'end_date'     => '2022-01-10',
            'type_of_trip' => 'vacation',
            'description'  => 'for healty life',
        ];

        $this->json('PUT', 'api/trip/1', $tripData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "status"  => 'true',
                "message" => "Success",
                "data"    => [],
            ]);
    }

    public function testTripDeleteSuccessfully()
    {
        $user = User::factory()->create([
            'email'    => 'sample@test.com',
            'password' => bcrypt('sample123'),
        ]);

        $this->actingAs($user, 'api');

        Trip::factory()->create([
            'user_id'       => $user->id,
            'title'         => 'vacation',
            'origin'        => 'jakarta',
            'destination'   => 'bali',
            'start_date'    => '2022-01-05',
            'end_date'      => '2022-01-07',
            'type_of_trip'  => 'vacation',
            'description'   => 'for healty life',
            'how_many_days' => '3',
        ]);

        $this->json('DELETE', 'api/trip/1', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "status"  => 'true',
                "message" => "Success",
                "data"    => [],
            ]);
    }
}
