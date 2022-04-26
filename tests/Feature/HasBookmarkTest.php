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

        //ユーザーと記事が存在
        //ユーザーが記事をブックマークしている
        $user = User::factory()->create();
        
        $article = Article::factory()->create();
        $user->bookmark_articles()->attach($article->id);
        //あるユーザーとある記事に対してis_bookmarkを実行
        $actual = $user->is_bookmark($article->id);
        //is_bookmarkの戻り値がture
        $this->assertEquals(true,$actual);
    }

    //TODO:is_bookmarkがtureのパターン

    //TODO:is_bookmarkがfalseのパターン

}
