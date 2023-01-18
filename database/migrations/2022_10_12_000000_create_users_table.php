<?php

use App\Enums\BanUser;
use App\Enums\Status;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('designations')->nullable();
            $table->text('address')->nullable();
            $table->longText('about')->nullable();
            $table->bigInteger('avatar')->unsigned()->nullable();
            $table->bigInteger('cover_avatar')->unsigned()->nullable();
            $table->longText('permissions')->nullable();
            $table->foreignId('role_id')->nullable()->constrained('roles')->onDelete('cascade');
            $table->unsignedBigInteger('is_ban')->default(BanUser::UNBAN)->comment(BanUser::BAN.'= '.__('banuser.'.BanUser::BAN).','.BanUser::UNBAN.'= '.__('banuser.'.BanUser::UNBAN));
            $table->unsignedBigInteger('status')->default(Status::ACTIVE)->comment(Status::ACTIVE.'= '.__('status.'.Status::ACTIVE).','.Status::INACTIVE.'= '.__('status.'.Status::INACTIVE));
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('email_verified')->nullable();
            $table->string('forgot_token')->nullable();
            $table->string('verify_token')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
