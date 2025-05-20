<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddActiveToPartnersTable extends Migration
{
    public function up()
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->boolean('active')->default(true); // Adiciona a coluna 'active' com valor padrão 'true'
        });
    }

    public function down()
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->dropColumn('active'); // Remove a coluna 'active' caso seja necessário reverter
        });
    }
}
