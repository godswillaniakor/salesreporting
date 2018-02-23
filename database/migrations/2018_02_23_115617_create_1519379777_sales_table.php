<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1519379777SalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('sales')) {
            Schema::create('sales', function (Blueprint $table) {
                $table->increments('id');
                $table->datetime('system_date_time')->nullable();
                $table->double('volume_sold', 15, 2)->nullable();
                $table->double('volume_before_sales', 15, 2)->nullable();
                $table->double('volume_after_sales', 15, 2)->nullable();
                $table->double('amount', 15, 2)->nullable();
                $table->double('price_per_liter', 15, 2)->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
