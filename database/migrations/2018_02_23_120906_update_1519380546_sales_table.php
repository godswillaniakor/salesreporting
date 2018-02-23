<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1519380546SalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            if(Schema::hasColumn('sales', 'system_date_time')) {
                $table->dropColumn('system_date_time');
            }
            if(Schema::hasColumn('sales', 'volume_sold')) {
                $table->dropColumn('volume_sold');
            }
            if(Schema::hasColumn('sales', 'volume_before_sales')) {
                $table->dropColumn('volume_before_sales');
            }
            if(Schema::hasColumn('sales', 'volume_after_sales')) {
                $table->dropColumn('volume_after_sales');
            }
            if(Schema::hasColumn('sales', 'amount')) {
                $table->dropColumn('amount');
            }
            if(Schema::hasColumn('sales', 'price_per_liter')) {
                $table->dropColumn('price_per_liter');
            }
            
        });
Schema::table('sales', function (Blueprint $table) {
            
if (!Schema::hasColumn('sales', 'system_date_time')) {
                $table->datetime('system_date_time')->nullable();
                }
if (!Schema::hasColumn('sales', 'volume_sold')) {
                $table->double('volume_sold', 15, 2)->nullable();
                }
if (!Schema::hasColumn('sales', 'volume_before_sales')) {
                $table->double('volume_before_sales', 15, 2)->nullable();
                }
if (!Schema::hasColumn('sales', 'volume_after_sales')) {
                $table->double('volume_after_sales', 15, 2)->nullable();
                }
if (!Schema::hasColumn('sales', 'amount')) {
                $table->double('amount', 15, 2)->nullable();
                }
if (!Schema::hasColumn('sales', 'price_per_liter')) {
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
        Schema::table('sales', function (Blueprint $table) {
            $table->dropColumn('system_date_time');
            $table->dropColumn('volume_sold');
            $table->dropColumn('volume_before_sales');
            $table->dropColumn('volume_after_sales');
            $table->dropColumn('amount');
            $table->dropColumn('price_per_liter');
            
        });
Schema::table('sales', function (Blueprint $table) {
                        $table->datetime('system_date_time')->nullable();
                $table->double('volume_sold', 15, 2)->nullable();
                $table->double('volume_before_sales', 15, 2)->nullable();
                $table->double('volume_after_sales', 15, 2)->nullable();
                $table->double('amount', 15, 2)->nullable();
                $table->double('price_per_liter', 15, 2)->nullable();
                
        });

    }
}
