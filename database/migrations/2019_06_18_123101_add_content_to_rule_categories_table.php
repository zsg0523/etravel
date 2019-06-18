<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContentToRuleCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rule_categories', function (Blueprint $table) {
            $table->string('rule_category_name')->nullable()->change();
            $table->text('content')->after('rule_category_name')->nullable()->comment('团队守则内容');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rule_categories', function (Blueprint $table) {
            $table->dropColumn('content');
            $table->string('rule_category_name')->change();
        });
    }
}
