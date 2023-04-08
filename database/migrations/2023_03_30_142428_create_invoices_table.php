<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('invoices', function (Blueprint $table) {
                $table->id();
                $table->integer('patient_id');
                $table->string('patient_name');
                $table->double('amount');
                $table->string('date');
                $table->string('doctor');
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
            Schema::dropIfExists('invoices');
        }
    };
