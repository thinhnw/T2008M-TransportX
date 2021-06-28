<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeFromBranchToFkInShipments extends Migration
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
            $table->unsignedBigInteger('to_branch_id')->nullable()->change();
            $table->foreign('to_branch_id')->references('id')->on('table_branches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('branch_to_fk_in_shipments', function (Blueprint $table) {
            //
        });
    }
}
