<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('idcard_id');
            $table->text('id_no');
            $table->text('philhealth')->nullable();
            $table->text('pwd')->nullable();
            $table->text('lastname');
            $table->text('firstname');
            $table->text('middlename');
            $table->text('suffixname')->nullable();
            $table->text('contact_no')->nullable();
//            $table->text('address')->nullable();
            $table->foreignId('region_id');
            $table->foreignId('province_id');
            $table->foreignId('municipality_id');
            $table->foreignId('barangay_id');
            $table->text('sex');
            $table->date('birthday');
            $table->text('consent')->nullable();
            $table->longText('reason')->nullable();
            $table->foreignId('question_id')->nullable();
            $table->text('deferral')->nullable();
            $table->date('date_vaccinated')->nullable();
            $table->time('time_vaccinated')->nullable();
            $table->text('vaccine_manufacturer')->nullable();
            $table->text('batch_no')->nullable();
            $table->text('lot_no')->nullable();
            $table->foreignId('vaccinator_id')->nullable();
            $table->text('first_dose')->nullable();
            $table->text('second_dose')->nullable();
//            $table->time('time_vaccinated');
//            $table->date('date_vaccinated');
//            $table->text('vaccine_type');
            $table->boolean('print')->default(1);
            $table->foreignId('user_id');
//            $table->foreignId('civilstatus_id');
//            $table->foreignId('employmentstatus_id');
//            $table->foreignId('profession_id');
//            $table->boolean('interaction_covid')->default(0);
//            $table->foreignId('employer_id')->nullable();
//            $table->boolean('pregnancy_status')->default(0);
//            $table->boolean('drugallergy')->default(0);
//            $table->boolean('foodallergy')->default(0);
//            $table->boolean('insectallergy')->default(0);
//            $table->boolean('latexallergy')->default(0);
//            $table->boolean('moldallergy')->default(0);
//            $table->boolean('petallergy')->default(0);
//            $table->boolean('comorbity')->default(0);
//            $table->boolean('hypertension')->default(0);
//            $table->boolean('heartdisease')->default(0);
//            $table->boolean('kidneydisease')->default(0);
//            $table->boolean('diabetes')->default(0);
//            $table->boolean('asthma')->default(0);
//            $table->boolean('immunodeficiency')->default(0);
//            $table->boolean('cancer')->default(0);
//            $table->text('others')->nullable();
//            $table->boolean('diagnosed_covid')->default(0);
//            $table->date('dateofresult')->nullable();
//            $table->foreignId('covidclass_id')->nullable();
//            $table->boolean('prov_eic')->default(0);
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
        Schema::dropIfExists('patients');
    }
}
