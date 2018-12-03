<?php

namespace Tests\Feature;

use Tests\TestCase;

class ViewABlogPostTest extends TestCase
{
    public function testCanViewABlogPost()
    {
        // Arrangement
        //  creating a blog post
        $post = Post::create([
            'title' => 'A simple title',
            'body' => 'A simple body'
        ]);
        // Action
        //  visiting a route
        $response = $this->get("/post/{$post->id}");
        // Assert
        //  assert status code is 200
        $response->assertStatus(200);
        //  assert that we see a post title
        $response->assertSee($post->title);
        //  assert that we see post body
        $response->assertSee($post->body);
        //  assert that we see published date
        $response->assertSee($post->created_at);
    }
}
