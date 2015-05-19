<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table) {
			$table->increments('id');
			$table->string('fbId')->unique()->default('');
			$table->string('firstName')->default('');
			$table->string('lastName')->default('');
			$table->integer('ratingScore')->unsigned()->default(0);
			$table->string('cellPhone')->default('');
			$table->string('homePhone')->default('');
			$table->timestamps();
		});

		Schema::create('userAddress', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('addressLine1')->default('');
			$table->string('addressLine2')->default('');
			$table->string('addressLine3')->default('');
			$table->string('city')->default('');
			$table->string('zipcode')->default('');
			$table->string('state')->default('');
			$table->string('country')->default('');
			$table->integer('userId')->unsigned()->default(0);
			$table->foreign('userId')->references('id')->on('user')->onDelete('cascade');
			$table->timestamps();
		});

		Schema::create('travelInformation', function(Blueprint $table)
		{
			$table->increments('id');
			$table->dateTime('departureDate');
			$table->dateTime('arrivalDate');
			$table->string('departureCity')->default('');
			$table->string('arrivalCity')->default('');
			$table->integer('flightNo')->unsigned();
			$table->integer('stayDuration');
			$table->integer('carrierId')->unsigned()->default(0);
			$table->foreign('carrierId')->references('id')->on('user')->onDelete('cascade');
			$table->timestamps();
		});

		Schema::create('bidPool', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('carrierId')->unsigned()->default(0);
			$table->foreign('carrierId')->references('id')->on('user')->onDelete('cascade');
			$table->integer('productRequestId')->unsigned()->default(0);
			$table->timestamps();
		});

		Schema::create('productRequest', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('productLink')->default('');
			$table->string('desiredSpeedScore');
			$table->string('desiredTrustScore');
			$table->string('desiredQualityScore');
			$table->dateTime('requestDate');
			$table->integer('buyerId')->unsigned()->default(0);
			$table->foreign('buyerId')->references('id')->on('user')->onDelete('cascade');
			$table->integer('carrierId')->unsigned()->default(0);
			$table->foreign('carrierId')->references('id')->on('user')->onDelete('cascade');
			$table->timestamps();
		});

		Schema::create('userBuyerScore', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('buyerId')->unsigned()->default(0);
			$table->foreign('buyerId')->references('id')->on('user')->onDelete('cascade');
			$table->integer('buyerScore')->unsigned()->default(0);
			$table->timestamps();
		});

		Schema::create('userCarrierScore', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('carrierId')->unsigned()->default(0);
			$table->foreign('carrierId')->references('id')->on('user')->onDelete('cascade');
			$table->integer('speedScore')->unsigned()->default(0);
			$table->integer('qualityScore')->unsigned()->default(0);
			$table->integer('deliveryTimeMetCount')->unsigned()->default(0);
			$table->timestamps();
		});

		Schema::create('degOfSep', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('fromFbId')->default('');
			$table->foreign('fromFbId')->references('fbId')->on('user')->onDelete('cascade');
			$table->string('toFbId')->default('');
			$table->foreign('toFbId')->references('fbId')->on('user')->onDelete('cascade');
			$table->integer('separationDeg')->unsigned()->default(0);
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
		Schema::drop('degOfSep');
		Schema::drop('userCarrierScore');
		Schema::drop('userBuyerScore');
		Schema::drop('productRequest');
		Schema::drop('bidPool');
		Schema::drop('travelInformation');
		Schema::drop('userAddress');
		Schema::drop('user');
	}

}
