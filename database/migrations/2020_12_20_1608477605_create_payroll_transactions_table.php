<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('payroll_transactions', function (Blueprint $table) {

		$table->increments('id');
		$table->char('uuid',36);
		$table->integer('company_id')->unsigned();
		$table->integer('employee_id')->unsigned();
		$table->integer('run_id')->unsigned()->nullable();
		$table->string('amount');
		$table->tinyInteger('status')->default(1);
		$table->enum('status_type',['one_time','repeat']);
		$table->enum('amount_type',['deduction','addition']);
		$table->string('remarks');
		$table->date('end_time')->nullable();
		$table->timestamps();
		$table->tinyInteger('isPaid')->default(0);
		$table->foreign('company_id')->references('id')->on('companies');		$table->foreign('run_id')->references('id')->on('payroll_runs');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payroll_transactions');
    }
}