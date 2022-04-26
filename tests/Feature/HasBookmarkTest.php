<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class HasBookmarkTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_ユーザがブックマークしている時true()
    {


        $user = User::factory()->create();
        $article = Article::factory()->create();
        $user->bookmark_articles()->attach($article->id);

        $actual = $user->is_bookmark($article->id);

        $this->assertEquals(true,$actual);
    }

    public function test_ユーザがブックマークしていない時false()
    {

        $user = User::factory()->create();
        $article = Article::factory()->create();

        $actual = $user->is_bookmark($article->id);

        $this->assertEquals(false,$actual);
    }

}
