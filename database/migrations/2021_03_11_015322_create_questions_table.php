<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('more_sixteenyrs')->nullable();
            $table->text('has_no_peg_allergies')->nullable();
            $table->text('has_no_allergic_reaction_firstdose')->nullable();
            $table->text('has_no_allergiy_to_food_no_asthma')->nullable();
            $table->text('if_with_allergy_or_asthma')->nullable();
            $table->text('has_no_history_of_bleeding_disorder')->nullable();
            $table->text('if_with_bleeding_disorder')->nullable();
            $table->text('does_not_manifest_symptoms')->nullable();
            $table->text('if_manifest')->nullable();
            $table->text('has_no_history_of_exposure_covid')->nullable();
            $table->text('not_been_treated_covid')->nullable();
            $table->text('not_received_vaccine_twoweeks')->nullable();
            $table->text('not_received_plasma_antibodies')->nullable();
            $table->text('not_pregnant')->nullable();
            $table->text('if_pregnant')->nullable();
            $table->text('does_not_have_terminal_illness')->nullable();
            $table->text('if_with_illness_specify')->nullable();
            $table->text('if_with_illness_has_presented_clearance')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
