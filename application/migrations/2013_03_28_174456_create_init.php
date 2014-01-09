<?php

class Create_Init
{

    /**
     * Make changes to the database.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("users", function ($table) {
            $table->increments('id');
            $table->string('email');
            $table->string('password', 64);
            $table->timestamps();
        });

        Schema::create("projects", function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('project_key')->unique();
            $table->string('url');
            $table->timestamps();
        });

        Schema::create('user_project', function ($table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->timestamps();

            //foreign key relation between user / project
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('project_id')->references('id')->on('projects');
        });

        Schema::create('exception_logs', function ($table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->string('message');
            $table->string('error_type');
            $table->string('file_name');
            $table->string('line');
            $table->date('date');
            $table->string('priority');
            $table->string('ip');
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects');
        });

    }

    /**
     * Revert the changes to the database.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_project', function ($table) {
            $table->drop_foreign('user_project_user_id_foreign');
            $table->drop_foreign('user_project_project_id_foreign');
        });
        Schema::table('exception_logs', function ($table) {
            $table->drop_foreign('exception_logs_project_id_foreign');
        });
        Schema::drop('users');
        Schema::drop('projects');
        Schema::drop('user_project');
        Schema::drop('exception_logs');
    }

}
