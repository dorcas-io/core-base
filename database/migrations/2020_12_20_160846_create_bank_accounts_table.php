<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankAccountsTable extends Migration
{
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {

			$table->increments('id');
			$table->char('uuid',50);
			$table->char('bankable_type',80);
			$table->bigInteger('bankable_id')->unsigned();
			$table->char('account_number',30);
			$table->char('account_name',80);
			$table->string('json_data',700)->nullable();
			$table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('bank_accounts');
    }
}