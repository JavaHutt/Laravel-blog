<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('category_id')->unsigned()
                    ->comment('Связь с категориями');
            $table->integer('user_id')->unsigned()
                    ->comment('Связь с автором');

            $table->string('slug')->unique()
                    ->comment('Уникальное поле для url');
            $table->string('title')
                    ->comment('Заголовок');

            $table->text('excerpt')
                    ->comment('Выдержка из статьи');

            $table->text('content_raw')
                    ->comment('Контент в сыром виде');
            $table->text('content_html')
                    ->comment('Контент в гипертекстовой разметке');

            $table->boolean('is_published')->default(false)
                    ->comment('Была ли статья опубликована');
            $table->timestamp('published_at')->nullable()
                    ->comment('Дата публикации');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('blog_categories');
            $table->foreign('user_id')->references('id')->on('users');
            $table->index('published_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
}
