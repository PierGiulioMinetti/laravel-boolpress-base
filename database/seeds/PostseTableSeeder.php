<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;  
class PostseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // SE VOGLIAMO ELIMINARE TUTTI I DATI PRECEDENTI QUANDO CREIAMO I SEED
        // Post::truncate(); 

        // BASIC WAY

        $posts = [
            [
                'title'=> 'Lorem number 1',
                'body'=> 'Body number 1  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum culpa nulla in cumque incidunt dolore totam vel quod recusandae deleniti!'
            ],

            [
                'title'=> 'Lorem number 2',
                'body'=> 'Body number 2  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum culpa nulla in cumque incidunt dolore totam vel quod recusandae deleniti!'
            ],

            [
                'title'=> 'Lorem number 3',
                'body'=> 'Body number 3  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum culpa nulla in cumque incidunt dolore totam vel quod recusandae deleniti!'
            ],

        ]; 

        foreach($posts as $post){
            // Creazione istanza da modello
            $newPost = new Post();

            // Popolazione proprietà dell'istanza (col DB)
            $newPost->title = $post['title'];
            $newPost->body = $post['body'];
            $newPost->slug = Str::slug($post['title'], '-');

            // Salvataggio record istanza nel DB
            $newPost->save();
        }
        
        /**
         * BASIC WAY
         */
    }
}
