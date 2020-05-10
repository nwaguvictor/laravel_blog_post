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
        // For user's Role
        factory(User::class)->create([
            'role_id' => factory(Role::class)
        ]);

        $role = factory(Role::class)->create([
            'id' => 2,
            'name' => 'author'
        ]);

        factory(User::class, 2)->create([
            'role_id' => $role->id
        ]);

        factory(Role::class)->create([
            'id' => 3,
            'name' => 'subscriber'
        ]);


        // Users
        factory(User::class, 5)->create()->each(function ($user) {
            // Posts for each of the users
            factory(Post::class, 2)->create([
                'user_id' => $user->id,
                'category_id' => 2
            ]);
        });

        // General Seeds
        factory(User::class, 4)->create()->each(function ($user) {
            $category = factory(Category::class)->create();
            factory(Post::class, 10)->create(['category_id' => $category->id])->each(function ($post) {
                factory(Comment::class, 5)->create(['post_id' => $post->id, 'user_id' => 3]);
            });
        });
    }
}
