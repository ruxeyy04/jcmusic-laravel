<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('userID');
            $table->string('firstname', 20);
            $table->string('midname', 20)->nullable();
            $table->string('lastname', 20);
            $table->string('address', 50);
            $table->string('username', 20);
            $table->string('password', 255);
            $table->string('usertype', 20);
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'userID' => 1420,
                'firstname' => 'Justine',
                'midname' => 'M',
                'lastname' => 'Capapas',
                'address' => 'Poblacion 1, Oroquieta City',
                'username' => 'admin',
                'password' => '$2y$12$0Bk2aTZtfZ9ecweHJLW9L.bU/dAMll8EMFwvutQNu4nID2qSZguqm',
                'usertype' => 'Admin',
            ],
            [
                'userID' => 1423,
                'firstname' => 'Alex',
                'midname' => 'O',
                'lastname' => 'Connor',
                'address' => 'Grayshott, United Kingdom',
                'username' => 'incharge',
                'password' => '$2y$12$0Bk2aTZtfZ9ecweHJLW9L.bU/dAMll8EMFwvutQNu4nID2qSZguqm',
                'usertype' => 'Incharge',
            ],
            [
                'userID' => 1425,
                'firstname' => 'Phoebe',
                'midname' => '',
                'lastname' => 'Buffay',
                'address' => 'Morton Street',
                'username' => 'client',
                'password' => '$2y$12$0Bk2aTZtfZ9ecweHJLW9L.bU/dAMll8EMFwvutQNu4nID2qSZguqm',
                'usertype' => 'Visitor',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
