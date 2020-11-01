<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
                         // カラム名img_pathをカラム名pr_longの後ろに追加する
            $table->string('img_path')->after('pr_long');
            $table->increments('id');
            $table->string('name');
            $table->string('name_kana')->nullable();
            $table->string('address');
            $table->string('opentime');
            $table->string('holiday');
            $table->string('category');
            $table->string('note');
            $table->string('pr_short');
            $table->string('pr_long');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
        $table->dropColumn(['img_path']);
    }
}
