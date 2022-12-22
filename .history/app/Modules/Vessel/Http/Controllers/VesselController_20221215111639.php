<?php

namespace App\Modules\Vessel\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Libs\UploadTrait;
use App\Modules\Brand\Models\Brand;
use App\Modules\Vessel\Models\Vessel;
use App\Modules\File\Models\File;
use App\Modules\NatureOfDamage\Models\NatureOfDamage;
use App\Modules\ShippingLine\Models\ShippingLine;
use App\Modules\TypeOfEquipment\Models\TypeOfEquipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\Array_;

class EquipmentController extends Controller
{
    use UploadTrait;
    public function createOrUpdateEquipment(Request $request){
        if($request->id==0){

            $validator = Validator::make($request->all(), [
              //  "name" => "required:brand,name",
            ]);
            if ($validator->fails()) {
                return [
                    "payload" => $validator->errors(),
                    "status" => "406_2"
                ];
            }

            $vessel=Vessel::make($request->all());

            if($request->nature_of_damage["id"]==0){
                if($request->nature_of_damage["name"]!=null || $request->nature_of_damage["name"]!=""){
                    $nature_of_damage_returnedValue=$this->nature_of_damage_confirmAndSave($request->nature_of_damage);
                        if($nature_of_damage_returnedValue["IsReturnErrorRespone"]){
                            return [
                                "payload" => $nature_of_damage_returnedValue["payload"],
                                "status" => $nature_of_damage_returnedValue["status"]
                            ];
                        }
                        $vessel->nature_of_damage_id=$nature_of_damage_returnedValue["payload"]->id;
                }

            } else {
                $nature_of_damage_returnedValue=$this->nature_of_damage_confirmAndUpdate($request->nature_of_damage);
                $vessel->nature_of_damage_id=$request->nature_of_damage["id"];

                if($nature_of_damage_returnedValue["IsReturnErrorRespone"]){
                    return [
                        "payload" => $nature_of_damage_returnedValue["payload"],
                        "status" => $nature_of_damage_returnedValue["status"]
                    ];
                }
            }



            if($request->shippingLine["id"]==0){
                if($request->shippingLine["name"]!=null || $request->shippingLine["name"]!=""){
                    $shippingLine_returnedValue=$this->shippingLine_confirmAndSave($request->shippingLine);
                    if($shippingLine_returnedValue["IsReturnErrorRespone"]){
                        return [
                            "payload" => $shippingLine_returnedValue["payload"],
                            "status" => $shippingLine_returnedValue["status"]
                        ];
                    }
                    $vessel->shippingLine_id=$shippingLine_returnedValue["payload"]->id;
                }
            }
            else{
                $shippingLine_returnedValue=$this->shippingLine_confirmAndUpdate($request->shippingLine);
                $vessel->shippingLine_id=$request->shippingLine["id"];

                if($shippingLine_returnedValue["IsReturnErrorRespone"]){
                    return [
                        "payload" => $shippingLine_returnedValue["payload"],
                        "status" => $shippingLine_returnedValue["status"]
                    ];
                }
            }

            if($request->file()) {
                if($request->incident_reportFile!=null){
                    $file=$request->incident_reportFile;
                    $filename=time()."_".$file->getClientOriginalName();
                    $this->uploadOne($file, config('cdn.vessels.path'),$filename,"public_uploads_equipments_incident_report");
                    $vessel->incident_report=$filename;
                }
                if($request->liability_letterFile!=null){
                    $file=$request->liability_letterFile;
                    $filename=time()."_".$file->getClientOriginalName();
                    $this->uploadOne($file, config('cdn.vessels.path'),$filename,"public_uploads_equipments_liability_letter");
                    $vessel->liability_letter=$filename;
                }
                if($request->insurance_declarationFile!=null){
                    $file=$request->insurance_declarationFile;
                    $filename=time()."_".$file->getClientOriginalName();
                    $this->uploadOne($file, config('cdn.vessels.path'),$filename,"public_uploads_equipments_insurance_declaration");
                    $vessel->insurance_declaration=$filename;
                }
            }

            $vessel->save();

            return [
                "payload" => $vessel,
                "status" => "200"
            ];
        }
        else {

            $validator = Validator::make($request->all(), [
            ]);
            if ($validator->fails()) {
                return [
                    "payload" => $validator->errors(),
                    "status" => "406_2"
                ];
            }

            $vessel=Vessel::find($request->id);
            if (!$vessel) {
                return [
                    "payload" => "The searched row does not exist !",
                    "status" => "404_3"
                ];
            }

            $vessel->name=$request->name;
            $vessel->deductible_charge_TAT=$request->deductible_charge_TAT;
            $vessel->status=$request->status;
            $vessel->incident_date=$request->incident_date;
            $vessel->claim_date=$request->claim_date;
            $vessel->ClaimOrIncident=$request->ClaimOrIncident;
            $vessel->concerned_internal_department=$request->concerned_internal_department;
            $vessel->vessel_number=$request->vessel_number;
            $vessel->cause_damage=$request->cause_damage;
            $vessel->Liability_letter_number=$request->Liability_letter_number;
            $vessel->amount=$request->amount;
            $vessel->currency=$request->currency;
            $vessel->comment_third_party=$request->comment_third_party;
            $vessel->reinvoiced=$request->reinvoiced;
            $vessel->currency_Insurance=$request->currency_Insurance;
            $vessel->Invoice_number=$request->Invoice_number;
            $vessel->date_of_reimbursement=$request->date_of_reimbursement;
            $vessel->reimbursed_amount=$request->reimbursed_amount;
            $vessel->date_of_declaration=$request->date_of_declaration;
            $vessel->date_of_feedback=$request->date_of_feedback;
            $vessel->comment_Insurance=$request->comment_Insurance;
            $vessel->Indemnification_of_insurer=$request->Indemnification_of_insurer;
            $vessel->Indemnification_date=$request->Indemnification_date;
            $vessel->currency_indemnisation=$request->currency_indemnisation;
            $vessel->deductible_charge_TAT=$request->deductible_charge_TAT;
            $vessel->damage_caused_by=$request->damage_caused_by;
            $vessel->comment_nature_of_damage=$request->comment_nature_of_damage;
            $vessel->TAT_name_persons=$request->TAT_name_persons;
            $vessel->outsourcer_company_name=$request->outsourcer_company_name;
            $vessel->thirdparty_company_name=$request->thirdparty_company_name;
            $vessel->thirdparty_Activity_comments=$request->thirdparty_Activity_comments;
            $vessel->incident_report=$request->incident_report;
            $vessel->liability_letter=$request->liability_letter;
            $vessel->insurance_declaration=$request->insurance_declaration;


            if($request->nature_of_damage["id"]==0){
                if($request->nature_of_damage["name"]!=null || $request->nature_of_damage["name"]!=""){
                    $nature_of_damage_returnedValue=$this->nature_of_damage_confirmAndSave($request->nature_of_damage);
                        if($nature_of_damage_returnedValue["IsReturnErrorRespone"]){
                            return [
                                "payload" => $nature_of_damage_returnedValue["payload"],
                                "status" => $nature_of_damage_returnedValue["status"]
                            ];
                        }
                        $vessel->nature_of_damage_id=$nature_of_damage_returnedValue["payload"]->id;
                }

            } else {
                $nature_of_damage_returnedValue=$this->nature_of_damage_confirmAndUpdate($request->nature_of_damage);
                $vessel->nature_of_damage_id=$request->nature_of_damage["id"];

                if($nature_of_damage_returnedValue["IsReturnErrorRespone"]){
                    return [
                        "payload" => $nature_of_damage_returnedValue["payload"],
                        "status" => $nature_of_damage_returnedValue["status"]
                    ];
                }
            }



            if($request->shippingLine["id"]==0){
                if($request->shippingLine["name"]!=null || $request->shippingLine["name"]!=""){
                    $shippingLine_returnedValue=$this->shippingLine_confirmAndSave($request->shippingLine);
                    if($shippingLine_returnedValue["IsReturnErrorRespone"]){
                        return [
                            "payload" => $shippingLine_returnedValue["payload"],
                            "status" => $shippingLine_returnedValue["status"]
                        ];
                    }
                    $vessel->shippingLine_id=$shippingLine_returnedValue["payload"]->id;
                }
            }
            else{
                $shippingLine_returnedValue=$this->shippingLine_confirmAndUpdate($request->shippingLine);
                $vessel->shippingLine_id=$request->shippingLine["id"];

                if($shippingLine_returnedValue["IsReturnErrorRespone"]){
                    return [
                        "payload" => $shippingLine_returnedValue["payload"],
                        "status" => $shippingLine_returnedValue["status"]
                    ];
                }
            }

            if($request->file()) {
                if($request->incident_reportFile!=null && $request->incident_reportFile!=""){
                    $file=$request->incident_reportFile;
                    $filename=time()."_".$file->getClientOriginalName();
                    $this->uploadOne($file, config('cdn.vessels.path'),$filename,"public_uploads_equipments_incident_report");
                    $vessel->incident_report=$filename;
                }
                if($request->liability_letterFile!=null && $request->liability_letterFile!=""){
                    $file=$request->liability_letterFile;
                    $filename=time()."_".$file->getClientOriginalName();
                    $this->uploadOne($file, config('cdn.vessels.path'),$filename,"public_uploads_equipments_liability_letter");
                    $vessel->liability_letter=$filename;



                }
                if($request->insurance_declarationFile!=null && $request->insurance_declarationFile!=""){
                    $file=$request->insurance_declarationFile;
                    $filename=time()."_".$file->getClientOriginalName();
                    $this->uploadOne($file, config('cdn.vessels.path'),$filename,"public_uploads_equipments_insurance_declaration");
                    $vessel->insurance_declaration=$filename;

                }
            }

            $vessel->save();

            return [
                "payload" => $vessel,
                "status" => "200"
            ];

        }
    }
    public function allClaim(){
        $vessel=Vessel::select()->where('ClaimOrIncident', "Claim")->with("typeOfEquipment")
        ->with("brand")
        ->with("natureOfDamage")
        ->with("department")
        //->with("estimate")
        ->get();
            return [
                "payload" => $vessel,
                "status" => "200_1"
            ];
    }
    public function allIncident(){
        $vessels=Vessel::select()->where('ClaimOrIncident', "Incident")->with("typeOfEquipment")
        ->with("brand")
        ->with("natureOfDamage")
        ->with("department")
        //->with("estimate")
        ->get();

            return [
                "payload" => $vessels,
                "status" => "200_1"
            ];
    }
    public function delete(Request $request){
        $vessel=Vessel::find($request->id);
        if(!$vessel){
            return [
                "payload" => "The searched row does not exist !",
                "status" => "404_4"
            ];
        }
        else {
            $vessel->delete();
            return [
                "payload" => "Deleted successfully",
                "status" => "200_4"
            ];
        }
    }
    public function nature_of_damage_confirmAndSave($NatureOfDamage){
        $validator = Validator::make($NatureOfDamage, [
            //"name" => "required:nature_of_damages,name",
        ]);
        if ($validator->fails()) {
            return [
                "payload" => $validator->errors(),
                "status" => "406_2",
                "IsReturnErrorRespone" => true
            ];
        }
        $natureOfDamage=NatureOfDamage::make($NatureOfDamage);
        $natureOfDamage->save();
        return [
            "payload" => $natureOfDamage,
            "status" => "200",
            "IsReturnErrorRespone" => false

        ];
    }
    public function nature_of_damage_confirmAndUpdate($NatureOfDamage){
        $natureOfDamage=NatureOfDamage::find($NatureOfDamage['id']);
            if(!$natureOfDamage){
                return [
                    "payload"=>"nature Of Damage is not exist !",
                    "status"=>"404_2",
                    "IsReturnErrorRespone" => true
                ];
            }
            else if ($natureOfDamage){
                //$natureOfDamage->name=$NatureOfDamage['name'];
                $natureOfDamage->save();
                return [
                    "payload"=>$natureOfDamage,
                    "status"=>"200",
                    "IsReturnErrorRespone" => false
                ];
            }
    }
    public function shippingLine_confirmAndSave($ShippingLine){
        $validator = Validator::make($ShippingLine, [
            //"name" => "required:nature_of_damages,name",
        ]);
        if ($validator->fails()) {
            return [
                "payload" => $validator->errors(),
                "status" => "406_2",
                "IsReturnErrorRespone" => true
            ];
        }
        $shippingLine=ShippingLine::make($ShippingLine);
        $shippingLine->save();
        return [
            "payload" => $shippingLine,
            "status" => "200",
            "IsReturnErrorRespone" => false

        ];
    }
    public function shippingLine_confirmAndUpdate($ShippingLine){
        $shippingLine=ShippingLine::find($ShippingLine['id']);
            if(!$shippingLine){
                return [
                    "payload"=>"nature Of Damage is not exist !",
                    "status"=>"404_2",
                    "IsReturnErrorRespone" => true
                ];
            }
            else if ($shippingLine){
                //$shippingLine->name=$ShippingLine['name'];
                $shippingLine->save();
                return [
                    "payload"=>$shippingLine,
                    "status"=>"200",
                    "IsReturnErrorRespone" => false
                ];
            }
    }
    public function brand_confirmAndSave($Brand){
        $validator = Validator::make($Brand, [
            //"name" => "required:brands,name",
        ]);

        if ($validator->fails()) {
            return [
                "payload" => $validator->errors(),
                "status" => "406_2"
            ];
        }

        $brand=Brand::make($Brand);
        $brand->save();

        return [
            "payload" => $brand,
            "status" => "200",
            "IsReturnErrorRespone" => false
        ];
    }
    public function brand_confirmAndUpdate($Brand){
        $brand=Brand::find($Brand['id']);
            if(!$brand){
                return [
                    "payload"=>"brand is not exist !",
                    "status"=>"404_2",
                    "IsReturnErrorRespone" => true
                ];
            }
            else if ($brand){
                //$brand->name=$Brand['name'];
                $brand->save();
                return [
                    "payload"=>$brand,
                    "status"=>"200",
                    "IsReturnErrorRespone" => false
                ];
            }
    }
    public function type_of_equipment_confirmAndSave($Type_of_equipment){
        $validator = Validator::make($Type_of_equipment, [
            //"name" => "required:type_of_equipments,name",
        ]);

        if ($validator->fails()) {
            return [
                "payload" => $validator->errors(),
                "status" => "406_2"
            ];
        }
        $type_of_equipemnt=TypeOfEquipment::make($Type_of_equipment);
        $type_of_equipemnt->save();

        return [
            "payload" => $type_of_equipemnt,
            "status" => "200",
            "IsReturnErrorRespone" => false
        ];
    }
    public function type_of_equipment_confirmAndUpdate($Type_of_equipment){
        $type_of_equipment=TypeOfEquipment::find($Type_of_equipment['id']);
            if(!$type_of_equipment){
                return [
                    "payload"=>"type_of_equipment is not exist !",
                    "status"=>"404_2",
                    "IsReturnErrorRespone" => true
                ];
            }
            else if ($type_of_equipment){
              //  $type_of_equipment->name=$Type_of_equipment['name'];
                $type_of_equipment->save();
                return [
                    "payload"=>$type_of_equipment,
                    "status"=>"200",
                    "IsReturnErrorRespone" => false
                ];
            }
    }
    public function getIncidentReportsFilePath(){
        return [
            "payload" => asset("/storage/cdn/vessels/incident_report"),
            "status" => "200_1"
        ];
    }
}
