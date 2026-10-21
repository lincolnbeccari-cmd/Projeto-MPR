<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
    {
      Schema::create('historico_chamados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chamado_id');
            $table->foreign('chamado_id')->references('id')->on('chamados')->onDelete('cascade');
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->string('status_anterior', 30)->nullable();
            $table->string('status_novo')->nullable();
            $table->string('observacao')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('historico_chamados', function (Blueprint $table) {
            $table->dropForeign(['chamado_id']);
            $table->dropColumn('chamado_id');
            $table->dropForeign(['usuario_id']);
            $table->dropColumn('usuario_id');
        });
        Schema::dropIfExists('historico_chamados');
    }
};
