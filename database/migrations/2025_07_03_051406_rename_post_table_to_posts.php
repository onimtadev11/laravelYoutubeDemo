<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class RenamePostTableToPosts extends Migration
{
    public function up()
    {
        Schema::rename('post', 'posts');
    }

    public function down()
    {
        Schema::rename('posts', 'post');
    }
}

