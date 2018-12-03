<?php

namespace Tests\Feature;

use App\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ViewAllBlogPostsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @group posts
     */
    public function testCanViewAllBlogPosts()
    {
        $post1 = factory(Post::class)->create();
        $post2 = factory(Post::class)->create();

        $response = $this->get('/posts');

        $response->assertStatus(200);
        $response->assertSee($post1->title);
        $response->assertSee($post2->title);
        $response->assertSee(str_limit($post1->body));
        $response->assertSee(str_limit($post2->body));
    }
}
