<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Console\Command;

class PostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:post {post} {--category=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create custom post';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::factory(1)->create();

        $postName = $this->argument('post');
        $banner = $this->ask('banner');
        $content = $this->ask('write content');
        $featured = $this->confirm('feature?', true);

        $categoryName = $this->option('category');

        $category = Category::create([
            'name' => $categoryName,
            'category_id' => null
        ]);

        $post = Post::create([
            'name' => $postName,
            'banner' => $banner,
            'content' => $content,
            'featured' => $featured,
            'user_id' => 1
        ]);

        $post->categories()->sync($category->id);

        $post ? $this->info('The Post Create Succsessfull.') : $this->error('Something went wrong!');
    }
}
