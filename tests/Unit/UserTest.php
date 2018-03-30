<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function a_user_can_fetch_the_most_recent_reply ()
    {
        $user = create('App\User');
        $reply = create('App\Reply', [ 'user_id' => $user->id ]);

        $this->assertEquals($reply->id, $user->lastReply->id);
    }

    /** @test */
    public function a_user_can_determain_their_avater_path ()
    {
        $user = create('App\User');

        $this->assertEquals(asset('images/avatar/profile.png'), $user->avatar_path);

        $user->avatar_path = 'avatars/me.jpg';

        $this->assertEquals(asset('storage/avatars/me.jpg'), $user->avatar_path);
    }

}
