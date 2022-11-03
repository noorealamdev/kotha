<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->integer('settings_id')->default(1);
            $table->string('site_title')->nullable();
            $table->text('site_description')->nullable();
            $table->text('google_analytics_id')->nullable();
            $table->string('logo')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('pinterest_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('home_ctaegory_id')->nullable();
            $table->string('sidebar_ctaegory_id')->nullable();
            $table->string('newsletter_text')->nullable();
            $table->string('newsletter_email')->nullable();
            $table->string('homepage_ad_image')->nullable();
            $table->string('homepage_ad_url')->nullable();
            $table->string('sidebar_ad_image')->nullable();
            $table->string('sidebar_ad_url')->nullable();
            $table->string('copyright')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
