<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_statuses', function ($table) {
            $table->char('id', 26)->primary();
            $table->string('name');
        });

        Schema::create('event_categories', function ($table) {
            $table->char('id', 26)->primary();
            $table->string('name');
        });

        Schema::create('ticket_statuses', function ($table) {
            $table->char('id', 26)->primary();
            $table->text('name');
        });

        Schema::create('reserved_tickets', function ($table) {
            $table->char('id', 26)->primary();
            $table->string('ticket_id');
            $table->string('event_id');
            $table->integer('quantity_reserved');
            $table->datetime('expires');
            $table->nullableTimestamps();
        });

        Schema::create('accounts', function ($table) {
            $table->char('id', 26)->primary();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');

            $table->string('name')->nullable();
            $table->timestamp('last_login_date')->nullable();

            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postal_code')->nullable();
            
            $table->boolean('is_active')->default(false);
            $table->boolean('is_banned')->default(false);
            $table->boolean('is_beta')->default(false);

            $table->nullableTimestamps();
            $table->softDeletes();
        });

        Schema::create('users', function ($table) {

            $table->char('id', 26)->primary();
            $table->string('account_id')->index();
            
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('confirmation_code');
            $table->boolean('is_registered')->default(false);
            $table->boolean('is_confirmed')->default(false);
            $table->boolean('is_parent')->default(false);
            $table->string('remember_token', 100)->nullable();
            $table->datetime('email_verified_at');

            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->nullableTimestamps();
            $table->softDeletes();
        });

        Schema::create('admins', function ($table) {

            $table->char('id', 26)->primary();
            $table->string('account_id')->index();
            
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('confirmation_code');
            $table->boolean('is_registered')->default(false);
            $table->boolean('is_confirmed')->default(false);
            $table->string('remember_token', 100)->nullable();

            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->nullableTimestamps();
            $table->softDeletes();
        });

        Schema::create('agents', function ($table) {
            $table->char('id', 26)->primary();
            $table->string('account_id')->index();
            
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('confirmation_code');
            $table->boolean('is_registered')->default(false);
            $table->boolean('is_confirmed')->default(false);
            $table->string('remember_token', 100)->nullable();

            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->nullableTimestamps();
            $table->softDeletes();
        });

        Schema::create('organisers', function ($table) {

            $table->char('id', 26)->primary()->index();
            $table->string('account_id')->index();

            $table->string('name');
            $table->text('about');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->char('confirmation_key', 26);
            $table->string('facebook');
            $table->string('twitter');
            $table->string('logo_path')->nullable();
            $table->boolean('is_email_confirmed')->default(0);

            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->nullableTimestamps();
            $table->softDeletes();
        });


        Schema::create('events', function ($table) {
            $table->char('id', 26)->primary();

            $table->string('title');
            $table->string('location')->nullable();
            $table->string('bg_type', 15)->default('color'); # BGType.image, BGType.color 
            $table->string('bg_color')->default('#FFF');
            $table->string('bg_image_path')->nullable();
            $table->text('description');

            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();

            $table->dateTime('on_sale_date')->nullable();

            $table->string('account_id')->index();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');

            $table->string('event_category_id')->index();
            $table->foreign('event_category_id')->references('id')->on('event_categories')->onDelete('cascade');

            $table->decimal('sales_volume', 13, 2)->default(0);
            $table->decimal('organiser_fees_volume', 13, 2)->default(0);
            $table->decimal('organiser_fee_fixed', 13, 2)->default(0);
            $table->decimal('organiser_fee_percentage', 4, 3)->default(0);

            $table->integer('quantity_available')->nullable();
            $table->integer('quantity_sold')->default(0);

            $table->string('organiser_id');
            $table->foreign('organiser_id')->references('id')->on('organisers');

            $table->string('venue_name');
            $table->string('venue_name_full')->nullable();
            $table->string('location_address', 355)->nullable();
            $table->string('location_address_line_1', 355);
            $table->string('location_address_line_2', 355);
            $table->string('location_country')->nullable();
            $table->string('location_country_code')->nullable();
            $table->string('location_state')->nullable();
            $table->string('location_post_code')->nullable();
            $table->string('location_street_number')->nullable();
            $table->string('location_lat')->nullable();
            $table->string('location_long')->nullable();

            $table->unsignedInteger('ask_for_all_attendees_info')->default(false);

            $table->text('pre_order_display_message')->nullable();

            $table->text('post_order_display_message')->nullable();

            $table->text('social_share_text')->nullable();
            $table->boolean('social_show_facebook')->default(true);
            $table->string('social_link_facebook');
            $table->boolean('social_show_linkedin')->default(true);
            $table->string('social_link_linkedin');
            $table->boolean('social_show_twitter')->default(true);
            $table->string('social_link_twitter');

            $table->boolean('is_live')->default(false);

            $table->nullableTimestamps();
            $table->softDeletes();
        });


        Schema::create('coupons', function ($table) {
            $table->char('id', 26)->primary();
            $table->string('code');
            $table->float('percent');
            $table->date('start_of_coupon');
            $table->date('end_of_coupon');
            $table->string('event_id')->index();
            $table->integer('using_time')->default(0);
            $table->boolean('ask_using_time')->default(false);
            $table->boolean('is_active')->default(false);
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->nullableTimestamps();
        });

        Schema::create('orders', function ($table) {
            $table->char('id', 26)->primary();
            $table->string('account_id')->index();
            $table->string('order_status_id');
            
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('ticket_pdf_path', 155)->nullable();

            $table->char('order_reference', 26);
            $table->char('transaction_id', 26)->nullable();

            $table->decimal('discount', 8, 2)->nullable();
            $table->decimal('booking_fee', 8, 2)->nullable();
            $table->decimal('organiser_booking_fee', 8, 2)->nullable();
            $table->date('order_date')->nullable();

            $table->text('notes')->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->boolean('is_cancelled')->default(false);
            $table->boolean('is_partially_refunded')->default(false);
            $table->boolean('is_refunded')->default(false);

            $table->decimal('amount', 13, 2);
            $table->decimal('amount_refunded', 13, 2)->nullable();

            $table->string('event_id')->index();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->foreign('order_status_id')->references('id')->on('order_statuses')->onDelete('no action');
            $table->nullableTimestamps();
            $table->softDeletes();
        });

        Schema::create('coupon_orders', function ($table) {
            $table->char('id', 26)->primary();
            $table->string('coupon_id');
            $table->string('order_id');
            $table->nullableTimestamps();
            $table->softDeletes();
        });

        Schema::create('tickets', function ($table) {
            $table->char('id', 26)->primary();
            
            $table->string('edited_by_user_id')->nullable();
            $table->string('account_id')->index();
            $table->string('order_id')->nullable();

            $table->string('event_id')->index();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

            $table->string('title');
            $table->text('description');
            $table->decimal('price', 13, 2);

            $table->integer('max_per_person')->nullable();
            $table->integer('min_per_person')->nullable();

            $table->decimal('organiser_fees_volume', 13, 2)->default(0);

            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('edited_by_user_id')->references('id')->on('users');

            $table->char('public_id', 26)->index();

            $table->string('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->nullableTimestamps();
            $table->softDeletes();
        });

        Schema::create('order_items', function ($table) {
            $table->char('id', 26)->primary();
            $table->string('title', 255);
            $table->integer('quantity');
            $table->decimal('unit_price', 13, 2);
            $table->decimal('unit_booking_fee', 13, 2)->nullable();
            $table->string('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->softDeletes();
        });

        Schema::create('event_questions', function($table) {
            $table->char('id', 26)->primary();

            $table->string('title', 255);
            $table->string('body', 255);
            
            $table->string('event_id')->index();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

            $table->nullableTimestamps();
            $table->softDeletes();
        });

        Schema::create('event_answers', function($table) {
            $table->char('id', 26)->primary();

            $table->string('event_question_id')->index();
            $table->foreign('event_question_id')->references('id')->on('event_questions')->onDelete('cascade');

            $table->text('answer');
        });


        Schema::create('questions', function($table) {
            $table->char('id', 26)->primary();

            $table->string('title', 255);
            $table->nullableTimestamps();
            $table->softDeletes();
        });

        Schema::create('answers', function($table) {
            $table->char('id', 26)->primary();

            $table->string('question_id')->index();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');

            $table->text('answer');
        });

        Schema::create('ticket_orders', function ($table) {
            $table->char('id', 26)->primary();
            $table->string('order_id')->index();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->string('ticket_id')->index();
            $table->foreign('ticket_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('event_stats', function ($table) {
            $table->char('id', 26)->primary()->index();
            $table->date('date');
            $table->integer('views')->default(0);
            $table->integer('unique_views')->default(0);
            $table->integer('tickets_sold')->default(0);

            $table->decimal('sales_volume', 13, 2)->default(0);
            $table->decimal('organiser_fees_volume', 13, 2)->default(0);

            $table->string('event_id')->index();

            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });

        Schema::create('attendees', function ($table) {
            $table->char('id', 26)->primary();
            $table->string('order_id')->index();
            $table->string('event_id')->index();
            $table->string('ticket_id')->index();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');

            $table->string('reference', 20);
            $table->char('private_reference_number', 26)->index();

            $table->boolean('is_cancelled')->default(false);
            $table->boolean('has_arrived')->default(false);
            $table->dateTime('arrival_time')->nullable();

            $table->string('account_id')->index();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');

            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

            $table->nullableTimestamps();
            $table->softDeletes();
        });

        Schema::create('event_images', function ($table) {

            $table->char('id', 26)->primary();
            $table->string('image_path');

            $table->string('event_id');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

            $table->string('account_id');
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');

            $table->string('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tables = [
            'order_statuses',
            'event_categories',
            'ticket_statuses',
            'reserved_tickets',
            'accounts',
            'users',
            'admins',
            'agents',
            'organisers',
            'events',
            'coupons',
            'orders',
            'coupon_orders',
            'tickets',
            'order_items',
            'event_questions',
            'event_answers',
            'questions',
            'answers',
            'ticket_orders',
            'event_stats',
            'attendees',
            'event_images',
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        foreach($tables as $table) {
            Schema::dropIfExists($table);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}