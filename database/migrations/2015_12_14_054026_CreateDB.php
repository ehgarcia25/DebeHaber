<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDB extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
//        Schema::create('countries', function(Blueprint $table)
//        {
//            $table->increments('id');
//            $table->string('name');
//            $table->timestamps();
//        });
//
//        Schema::create('currencies', function(Blueprint $table){
//            $table->increments('id');
//            $table->string('name');
//            $table->string('code');
//        });
//
//        Schema::create('currency_rates', function(Blueprint $table){
//            $table->increments('id');
//            $table->integer('currency_id')->unsigned()->default(0);
//            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade');
//            $table->integer('country_id')->unsigned()->default(0);
//            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
//            $table->integer('company_id')->unsigned()->default(0);
//            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
//            $table->decimal('rate');
//            $table->date('date');
//            $table->timestamps();
//        });
//
//        Schema::create('user_roles', function(Blueprint $table){
//            $table->increments('id');
//            $table->string('name')->default('');
//            $table->timestamps();
//        });
//
//        Schema::create('users', function(Blueprint $table){
//            $table->increments('id');
//            $table->integer('role_id')->unsigned()->default(0);
//            $table->foreign('role_id')->references('id')->on('user_roles')->onDelete('cascade');
//            $table->integer('company_id')->unsigned()->default(0);
//            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
//            $table->string('name')->default('');
//            $table->string('email')->unique();
//            $table->string('password', 60);
//            $table->string('firstlast')->default('');
//            $table->rememberToken();
//            $table->timestamps();
//        });
//
//        Schema::create('app_subscription', function(Blueprint $table){
//            $table->increments('id');
//            $table->string('name');
//            $table->integer('limit_user');
//            $table->integer('limit_company');
//            $table->integer('limit_disk');
//            $table->timestamps();
//        });
//
//        Schema::create('companies', function(Blueprint $table)
//		{
//			$table->increments('id');
//            $table->integer('app_subscription_id')->unsigned()->default(0);
//            $table->foreign('app_subscription_id')->references('id')->on('app_subscription');
//            $table->integer('country_id')->unsigned()->default(0);
//            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
//            $table->integer('accountant_id')->unsigned()->default(0);
//            $table->foreign('accountant_id')->references('id')->on('users');
//            $table->integer('auditor_id')->unsigned()->default(0);
//            $table->foreign('auditor_id')->references('id')->on('users');
//			$table->string('name');
//            $table->string('alias');
//            $table->string('gov_id');
//			$table->timestamps();
//		});
//
//        Schema::create('charts', function(Blueprint $table){
//            $table->increments('id');
//            $table->integer('chart_id')->unsigned()->default(0);
//            $table->foreign('chart_id')->references('id')->on('chart');
//            $table->integer('country_id')->unsigned()->default(0);
//            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
//            $table->integer('company_id')->unsigned()->default(0);
//            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
//            $table->integer('user_id')->unsigned()->default(0);
//            $table->foreign('user_id')->references('id')->on('users');
//            $table->string('code');
//            $table->string('name');
//            $table->integer('chart_type');
//            $table->integer('chart_subtype');
//            $table->integer('level');
//            $table->timestamps();
//        });
//
//        Schema::create('cycles', function(Blueprint $table){
//            $table->increments('id');
//            $table->integer('company_id')->unsigned()->default(0);
//            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
//            $table->integer('user_id')->unsigned()->default(0);
//            $table->foreign('user_id')->references('id')->on('users');
//            $table->string('name');
//            $table->date('date_start');
//            $table->date('date_end');
//            $table->timestamps();
//        });
//
//
//        Schema::create('budget', function(Blueprint $table){
//            $table->increments('id');
//            $table->integer('chart_id')->unsigned()->default(0);
//            $table->foreign('chart_id')->references('id')->on('charts');
//            $table->integer('cycle_id')->unsigned()->default(0);
//            $table->foreign('cycle_id')->references('id')->on('cycles');
//            $table->integer('user_id')->unsigned()->default(0);
//            $table->foreign('user_id')->references('id')->on('users');
//            $table->decimal('value');
//            $table->timestamps();
//        });
//
//        Schema::create('journals', function(Blueprint $table){
//            $table->increments('id');
//            $table->enum('status', ['Pending', 'Approved', 'Rejected']);
//            $table->integer('cycle_id')->unsigned()->default(0);
//            $table->foreign('cycle_id')->references('id')->on('cycles');
//            $table->integer('user_id')->unsigned()->default(0);
//            $table->foreign('user_id')->references('id')->on('users');
//            $table->integer('code');
//            $table->string('trans_comment');
//            $table->timestamps();
//        });
//
//        Schema::create('journal_details', function(Blueprint $table){
//            $table->increments('id');
//            $table->integer('journal_id')->unsigned()->default(0);
//            $table->foreign('journal_id')->references('id')->on('journals');
//            $table->integer('chart_id')->unsigned()->default(0);
//            $table->foreign('chart_id')->references('id')->on('charts');
//            $table->integer('user_id')->unsigned()->default(0);
//            $table->foreign('user_id')->references('id')->on('users');
//            $table->integer('currency_rate_id')->unsigned()->default(0);
//            $table->foreign('currency_rate_id')->references('id')->on('currency_rates');
//            $table->decimal('debit');
//            $table->decimal('credit');
//            $table->timestamps();
//        });
//
//        Schema::create('journal_comments', function(Blueprint $table){
//            $table->increments('id');
//            $table->integer('journal_id')->unsigned()->default(0);
//            $table->foreign('journal_id')->references('id')->on('journals');
//            $table->integer('user_id')->unsigned()->default(0);
//            $table->foreign('user_id')->references('id')->on('users');
//            $table->string('comment');
//            $table->timestamp();
//        });
    }
//
//    /**
//     * Reverse the migrations.
//     *
//     * @return void
//     */
    public function down()
    {
//        Schema::drop('countries');
//        Schema::drop('user_roles');
//        Schema::drop('users');
//        Schema::drop('app_subscription');
        Schema::drop('companies');
    }
}
