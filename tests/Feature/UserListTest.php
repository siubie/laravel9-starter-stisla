<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserListTest extends TestCase
{
    use RefreshDatabase;

    public function setup(): void
    {
        # code...
        parent::setUp();
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_superadmin_can_see_user_list()
    {
        //login superadmin
        $this->actingAs(User::find(1));

        //buka halaman user
        $response = $this->get('/user-management/user');

        //pastikan response 200
        $response->assertStatus(200);

        //assert ada variabel users
        $response->assertViewHas('users');

        $response->assertSeeText('superadmin@gmail.com');
    }

    public function test_superadmin_can_see_paging_user_list()
    {
        //login superadmin
        $this->actingAs(User::find(1));

        User::factory()->count(10)->create();

        //buka halaman user
        $response = $this->get('/user-management/user');

        //pastikan response 200
        $response->assertStatus(200);

        //assert ada variabel users
        $response->assertViewHas('users');

        //ada superadmin nya
        $response->assertSeeText('superadmin@gmail.com');

        //ada keliatan text paging nya
        $response->assertSeeTextInOrder(["1", "2"]);

        //buka halaman selanjutnya
        $response = $this->get('/user-management/user?page=2');

        //keliatan paging 11
        $response->assertSeeText("11");
    }

    public function test_user_can_search_and_result_shown_in_list()
    {

        $this->actingAs(User::find(1));
        $response = $this->get("user-management/user", [
            "name" => "user"
        ]);

        $response->assertStatus(200);
        $response->assertSeeText("user");
        $response->assertSeeText("user@gmail.com");

        $response = $this->get("user-management/user", [
            "name" => "SuperAdmin"
        ]);

        $response->assertStatus(200);
        $response->assertSeeText("SuperAdmin");
        $response->assertSeeText("superadmin@gmail.com");
    }

    public function test_user_can_search_and_result_shown_in_list_with_paging()
    {
        //login admin
        $this->actingAs(User::find(1));

        //generate 15 user
        for ($i = 0; $i < 15; $i++) {
            User::create(
                [
                    "name" => "user" . $i,
                    'email' => "user" . $i . "@email.com",
                    'password' => Hash::make('password'),
                    'email_verified_at' => now(),
                ]
            );
        }

        //response nya di search
        $response = $this->get("user-management/user", [
            "name" => "user"
        ]);

        $response->assertStatus(200);
        $response->assertSeeText("user");
        $response->assertSeeText("user@gmail.com");

        // harusnya keliatan halaman paging nya
        $response->assertSeeTextInOrder(["1", "2"]);

        //dicek ke halaman 2
        $response = $this->get("user-management/user", [
            "name" => "user",
            "page" => "2"
        ]);
        //harusnya masi ada paging nya
        $response->assertSeeTextInOrder(["1", "2"]);

        //dicek ke halaman3
        $response = $this->get("user-management/user", [
            "name" => "user",
            "page" => "3"
        ]);
        //harusnya masi ada paging nya
        $response->assertDontSeeText("<");
    }
}
