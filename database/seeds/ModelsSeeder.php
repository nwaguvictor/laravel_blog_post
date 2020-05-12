<?php

use App\Category;
use App\Comment;
use App\Post;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class ModelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Helper function 
        // For Post comments
        function addComments($post)
        {
            factory(Comment::class)->create(['post_id' => $post->id, 'user_id' => 3]);
            factory(Comment::class)->create(['post_id' => $post->id, 'user_id' => 4]);
            factory(Comment::class)->create(['post_id' => $post->id, 'user_id' => 5]);
        }

        // For users and their roles

        // Admin
        factory(User::class)->create([
            'role_id' => factory(Role::class),
            'name' => 'admin',
            'email' => 'admin@admin.com'
        ]);

        // authors

        $author = factory(Role::class)->create([
            'id' => 2,
            'name' => 'author'
        ]);

        factory(User::class, 2)->create([
            'role_id' => $author->id
        ]);

        // Subscribers
        $subscriber = factory(Role::class)->create([
            'id' => 3,
            'name' => 'subscriber'
        ]);

        factory(User::class, 2)->create([
            'role_id' => $subscriber->id
        ]);

        // General Post Seeds
        factory(Category::class, 4)->create()->each(function ($category) {
            // first Author's posts (id: 2)
            factory(Post::class, 2)->create(['category_id' => $category->id, 'user_id' => 2])->each(function ($post) {
                addComments($post);
            });
            // second Author's post (id: 3)
            factory(Post::class, 2)->create(['category_id' => $category->id, 'user_id' => 3])->each(function ($post) {
                addComments($post);
            });
        });
    }
}
