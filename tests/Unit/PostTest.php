<?php

namespace Tests\Unit;

use App\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PostTest extends TestCase
{
    use DatabaseMigrations;

    public function testCanGetCreatedAtFormattedDate()
    {
        $post = Post::create([
            'title' => 'A simple title',
            'body' => 'A simple body'
        ]);

        $formattedDate = $post->createdAt();

        $this->assertEquals($post->created_at->toFormattedDateString(), $formattedDate);
    }
}
