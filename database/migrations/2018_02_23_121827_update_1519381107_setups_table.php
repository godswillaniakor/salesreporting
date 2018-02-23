<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1519381107SetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('setups', function (Blueprint $table) {
            if(Schema::hasColumn('setups', 'cvd')) {
                $table->dropColumn('cvd');
            }
            if(Schema::hasColumn('setups', 'price_per_liter')) {
                $table->dropColumn('price_per_liter');
            }
            
        });
Schema::table('setups', function (Blueprint $table) {
            
if (!Schema::hasColumn('setups', 'cvd')) {
                $table->double('cvd', 15, 2)->nullable();
                }
if (!Schema::hasColumn('setups', 'price_per_liter')) {
                $table->double('price_per_liter', 15, 2)->nullable();
                }
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('setups', function (Blueprint $table) {
            $table->dropColumn('cvd');
            $table->dropColumn('price_per_liter');
            
        });
Schema::table('setups', function (Blueprint $table) {
                        $table->double('cvd', 15, 2)->nullable();
                $table->double('price_per_liter', 15, 2)->nullable();
                
        });

    }
}
