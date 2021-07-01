<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeToBranchToNullableInShipments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shipments', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('from_branch_id')->nullable()->change();
            $table->foreign('from_branch_id')->references('id')->on('table_branches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('branch_to_nullable_in_shipments', function (Blueprint $table) {
            //
        });
    }
}
