<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnFkCardIdToInvoiceHeaders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoice_headers', function (Blueprint $table) {
            //
            $table->integer('card_id')->nullable()->after('phone_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_headers', function (Blueprint $table) {
            //
            $table->dropColumn('card_id');
        });
    }
}
