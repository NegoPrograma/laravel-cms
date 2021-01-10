<?php



/**
 * Abaixo um exemplo de migration em laravel.
 * 
 * Considere as migrações como um "git" para databases,
 * cada migration conta com um método "up" e "down", que são exatamente isso,
 * o que a migração deve fazer se ela for executada normalmente e o down
 * para o caso de ser um rollback. é basicamente o ato de vc criar algo na
 * estrutura do seu banco, mas também ter um meio de jogar fora essa estrutura
 * caso por alguma razão você precise que seu sistema volte a um estado anterior.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * 
     * Abaixo, o método up, que diz o que vai ter de novo na estrutura do DB após essa migration ser executada.
     * 
     * Essa migration em particular usa a função create, ou seja, uma tabela nova será criada.
     * 
     * esse método tem 2 parâmetros, o nome da table (users) e uma função de callback
     * cujo parâmetro é uma varivável do tipo Blueprint, que é a classe que define os valores
     * de cada coluna dessa nova table. Cada método de uma instancia Blueprint equivale a uma
     * coluna, o nome do metodo sendo o tipo de dado, e os parametros os nomes das colunas.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     * 
     * 
     * Abaixo, um método down, que ao contrário do up (duhhh) serve pra quando vc quer desfazer
     * as alterações que vc faz no up. como nesse up em específico criamos a table users,
     * basta chamarmos o método de dropar uma table, passando o nome users como parâmetro para identificar
     * a tabela a ser excluída.
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
