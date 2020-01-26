<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('site_name')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('posts_per_page')->nullable();//number of posts on home and other pages archives search categories archieves etc
            $table->text('site_meta_info')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->text('map')->nullable();
            $table->boolean('show_pinned_post_section')->default('0')->nullable();
            $table->boolean('show_tags')->default('0')->nullable();
            $table->boolean('show_main_footer')->default('0')->nullable();
            $table->boolean('show_footer_bottom')->default('0')->nullable();
            $table->text('about_section_text')->nullable();
            $table->text('newsletter_section_text')->nullable();
            $table->text('footer_bottom')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site');
    }
}
