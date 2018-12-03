<?php

namespace Tests\Feature;

use App\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreatePostsTest extends TestCase
{
    use DatabaseMigrations;

    public function testCanCreatePost()
    {
        /**
         * @group create-post
         */
        $response = $this->post('/store-post', [
            'title' => 'new post title',
            'body' => 'new post body'
        ]);

        $this->assertDatabaseHas('posts', [
            'title' => 'new post title',
            'body' => 'new post body'
        ]);

        $post = Post::find(1);

        $this->assertEquals('new post title', $post->title);
        $this->assertEquals('new post body', $post->body);
    }

    /**
     * @group title-req
     */
    public function testTitleIsRequiredToCreatePost()
    {
        $response = $this->post('/store-post', [
            'title' => null,
            'body' => 'new post body'
        ]);

        $response->assertSessionHasErrors('title');
    }

    /**
     * @group body-req
     */
    public function testBodyIsRequiredToCreatePost()
    {
        $response = $this->post('/store-post', [
            'title' => 'new post title',
            'body' => null
        ]);

        $response->assertSessionHasErrors('body');
    }
}
