<?php

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
        Schema::create('containers', function (Blueprint $table) {

            $table->bigIncrements("id");
            $table->string("name")->nullable();
            $table->string("categorie_of_container")->nullable();

            $table->bigInteger("claim_id")->unsigned()->nullable();
            $table->foreign('claim_id')->references('id')->on('claims')->onDelete('cascade');

            $table->bigInteger("type_of_equipment_id")->unsigned()->nullable();
            $table->foreign('type_of_equipment_id')->references('id')->on('type_of_equipments')->onDelete('cascade');


            $table->bigInteger("nature_of_damage_id")->unsigned()->nullable();
            $table->foreign('nature_of_damage_id')->references('id')->on('nature_of_damages')->onDelete('cascade');

            $table->bigInteger('department_id')->unsigned()->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');

            $table->bigInteger('shipping_line_id')->unsigned()->nullable();
            $table->foreign('shipping_line_id')->references('id')->on('shipping_lines')->onDelete('cascade');

            $table->string("status")->nullable();
            $table->string("concerned_internal_department")->nullable();

            // new attr
            $table->string("containerType")->nullable();
            $table->bigInteger("containerID")->nullable();
            $table->bigInteger("nombre_of_containers")->nullable();
            //

            $table->string("cause_damage")->nullable();
            $table->string("Liability_letter_number")->nullable();
            $table->double('amount', 20, 4)->nullable();
            $table->string("currency")->nullable();
            $table->string("comment_third_party")->nullable();
            $table->string("reinvoiced")->nullable();
            $table->string("currency_Insurance")->nullable();
            $table->integer("Invoice_number")->nullable();
            $table->date("date_of_reimbursement")->nullable();
            $table->double('reimbursed_amount', 20, 4)->nullable();
            $table->date("date_of_declaration")->nullable();
            $table->date("date_of_feedback")->nullable();
            $table->string("comment_Insurance")->nullable();
            $table->string("Indemnification_of_insurer")->nullable();
            $table->date("Indemnification_date")->nullable();
            $table->string("currency_indemnisation")->nullable();
            $table->double('deductible_charge_TAT', 20, 4)->nullable()->default(5000);
            $table->string("damage_caused_by")->nullable();
            $table->string("comment_nature_of_damage")->nullable();
            $table->string("TAT_name_persons")->nullable();
            $table->string("outsourcer_company_name")->nullable();
            $table->string("thirdparty_company_name")->nullable();
            $table->string("thirdparty_Activity_comments")->nullable();
            $table->string("incident_report")->nullable();
            $table->string("liability_letter")->nullable();
            $table->string("insurance_declaration")->nullable();

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
        Schema::dropIfExists('container');
    }
};
