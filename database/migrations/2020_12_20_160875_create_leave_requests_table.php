<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('leave_requests', function (Blueprint $table) {

		$table->increments('id');
		$table->integer('employee_id')->unsigned();
		$table->integer('group_id')->unsigned();
		$table->integer('approval_id')->unsigned();
		$table->bigInteger('count_available');
		$table->bigInteger('count_utilized');
		$table->bigInteger('count_remaining');
		$table->bigInteger('count_requesting');
		$table->date('data_start_date');
		$table->date('data_report_back');
		$table->string('data_contact_address');
		$table->string('data_contact_phone');
		$table->string('data_backup_staff');
		$table->string('data_remarks');
		$table->timestamps();
		$table->timestamp('deleted_at')->nullable();
		$table->char('uuid',36);
		$table->integer('company_id')->unsigned();
		$table->enum('status',['active','declined','approved'])->default('active');
		$table->integer('type_id')->unsigned();
		$table->string('rejection_comments')->nullable();
		$table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    public function down()
    {
        Schema::dropIfExists('leave_requests');
    }
}