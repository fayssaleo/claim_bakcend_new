<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Modules\Brand\Models\Brand;
use App\Modules\Department\Models\Department;
use App\Modules\EquipmentMatricule\Models\EquipmentMatricule;
use App\Modules\Fonction\Models\Fonction;
use App\Modules\NatureOfDamage\Models\NatureOfDamage;
use App\Modules\TypeOfEquipment\Models\TypeOfEquipment;
use App\Modules\User\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $department=new Department();
        $department->name="IT";
        $department->save();

        $department=new Department();
        $department->name="OPERATIONS";
        $department->save();

        $department=new Department();
        $department->name="QHSSE";
        $department->save();

        $department=new Department();
        $department->name="TECHNICAL";
        $department->save();

        $department=new Department();
        $department->name="FINANCIAL";
        $department->save();










        $brand=new Brand();
        $brand->name="KONECRANES";
        $brand->categorie="Equipment";
        $brand->save();

        $brand=new Brand();
        $brand->name="Liebherr";
        $brand->categorie="Equipment";
        $brand->save();

        $brand=new Brand();
        $brand->name="DOOSAN";
        $brand->categorie="Equipment";
        $brand->save();

        $brand=new Brand();
        $brand->name="YALE";
        $brand->categorie="Equipment";
        $brand->save();

        $brand=new Brand();
        $brand->name="BROMMA";
        $brand->categorie="Equipment";
        $brand->save();

        $brand=new Brand();
        $brand->name="FABRISEM";
        $brand->categorie="Equipment";
        $brand->save();

        $brand=new Brand();
        $brand->name="TERBERG";
        $brand->categorie="Equipment";
        $brand->save();

        $brand=new Brand();
        $brand->name="SEACOM AG";
        $brand->categorie="Equipment";
        $brand->save();

        $brand=new Brand();
        $brand->name="COMATO";
        $brand->categorie="Equipment";
        $brand->save();

        $brand=new Brand();
        $brand->name="TEC Container";
        $brand->categorie="Equipment";
        $brand->save();












//---------------------------------------------------------------------------------------

        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="Ship to shores";
        $type_of_equipment->categorie="Equipment";
        $type_of_equipment->save();

        $equipment_matricule = new EquipmentMatricule();
        $equipment_matricule->id_equipment="01";
        $equipment_matricule->matricule="CC2114";
        $equipment_matricule->equipment="Ship to shores";
        $equipment_matricule->brand="Liebherr";
        $equipment_matricule ->save();


        $equipment_matricule = new EquipmentMatricule();
        $equipment_matricule->id_equipment="02";
        $equipment_matricule->matricule="CC2115";
        $equipment_matricule->equipment="Ship to shores";
        $equipment_matricule->brand="Liebherr";
        $equipment_matricule ->save();

//---------------------------------------------------------------------------------------


        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="RTGs";
        $type_of_equipment->categorie="Equipment";
        $type_of_equipment->save();

        $equipment_matricule = new EquipmentMatricule();
        $equipment_matricule->id_equipment="01";
        $equipment_matricule->matricule="G2439";
        $equipment_matricule->equipment="RTGs";
        $equipment_matricule->brand="KONECRANES";
        $equipment_matricule ->save();

        $equipment_matricule = new EquipmentMatricule();
        $equipment_matricule->id_equipment="02";
        $equipment_matricule->matricule="G2440";
        $equipment_matricule->equipment="RTGs";
        $equipment_matricule->brand="KONECRANES";
        $equipment_matricule ->save();

//---------------------------------------------------------------------------------------
        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="Tablet";
        $type_of_equipment->categorie="Equipment";
        $type_of_equipment->save();
//---------------------------------------------------------------------------------------
        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="Reach stackers";
        $type_of_equipment->categorie="Equipment";
        $type_of_equipment->save();

        $equipment_matricule = new EquipmentMatricule();
        $equipment_matricule->id_equipment="01";
        $equipment_matricule->matricule="M12560";
        $equipment_matricule->equipment="Reach stackers";
        $equipment_matricule->brand="KONECRANES";
        $equipment_matricule ->save();


        $equipment_matricule = new EquipmentMatricule();
        $equipment_matricule->id_equipment="02";
        $equipment_matricule->matricule="M12561";
        $equipment_matricule->equipment="Reach stackers";
        $equipment_matricule->brand="KONECRANES";
        $equipment_matricule ->save();

//---------------------------------------------------------------------------------------

        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="Forklifts";
        $type_of_equipment->categorie="Equipment";
        $type_of_equipment->save();


        $equipment_matricule = new EquipmentMatricule();
        $equipment_matricule->id_equipment="FK 01";
        $equipment_matricule->matricule="M12618";
        $equipment_matricule->equipment="Forklifts";
        $equipment_matricule->brand="KONECRANES";
        $equipment_matricule ->save();

        $equipment_matricule = new EquipmentMatricule();
        $equipment_matricule->id_equipment="FK 02";
        $equipment_matricule->matricule="M12619";
        $equipment_matricule->equipment="Forklifts";
        $equipment_matricule->brand="KONECRANES";
        $equipment_matricule ->save();

        $equipment_matricule = new EquipmentMatricule();
        $equipment_matricule->id_equipment="FL01";
        $equipment_matricule->matricule="FDB04-1130-03181  type D";
        $equipment_matricule->equipment="Forklifts";
        $equipment_matricule->brand="Doosan";
        $equipment_matricule ->save();

//---------------------------------------------------------------------------------------
        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="Spreaders STS";
        $type_of_equipment->categorie="Equipment";
        $type_of_equipment->save();

        $equipment_matricule = new EquipmentMatricule();
        $equipment_matricule->id_equipment="01";
        $equipment_matricule->matricule="30994";
        $equipment_matricule->equipment="Spreaders STS";
        $equipment_matricule->brand="BROMMA";
        $equipment_matricule ->save();
//---------------------------------------------------------------------------------------
        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="Spreaders RTG";
        $type_of_equipment->categorie="Equipment";
        $type_of_equipment->save();

        $equipment_matricule = new EquipmentMatricule();
        $equipment_matricule->id_equipment="01";
        $equipment_matricule->matricule="31357";
        $equipment_matricule->equipment="Spreaders RTG";
        $equipment_matricule->brand="BROMMA";
        $equipment_matricule ->save();

//---------------------------------------------------------------------------------------
        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="Trucks";
        $type_of_equipment->categorie="Equipment";
        $type_of_equipment->save();

        $equipment_matricule = new EquipmentMatricule();
        $equipment_matricule->id_equipment="RR 01";
        $equipment_matricule->matricule="XLWRT2230L8369212";
        $equipment_matricule->equipment="Trucks";
        $equipment_matricule->brand="TERBERG";
        $equipment_matricule ->save();


        $equipment_matricule = new EquipmentMatricule();
        $equipment_matricule->id_equipment="RR 02";
        $equipment_matricule->matricule="XLWRT2230L8369211";
        $equipment_matricule->equipment="Trucks";
        $equipment_matricule->brand="TERBERG";
        $equipment_matricule ->save();

//---------------------------------------------------------------------------------------
        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="Trailers";
        $type_of_equipment->categorie="Equipment";
        $type_of_equipment->save();

        $equipment_matricule = new EquipmentMatricule();
        $equipment_matricule->id_equipment="RR 02";
        $equipment_matricule->matricule="XLWRT2230L8369211";
        $equipment_matricule->equipment="Trucks";
        $equipment_matricule->brand="TERBERG";
        $equipment_matricule ->save();
//---------------------------------------------------------------------------------------
        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="Goosenecks";
        $type_of_equipment->categorie="Equipment";
        $type_of_equipment->save();




//---------------------------------------------------------------------------------------
        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="Lashing cages";
        $type_of_equipment->categorie="Equipment";
        $type_of_equipment->save();
//---------------------------------------------------------------------------------------
        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="Test Weightlifting frame";
        $type_of_equipment->categorie="Equipment";
        $type_of_equipment->save();
//---------------------------------------------------------------------------------------
        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="Hook Beam";
        $type_of_equipment->categorie="Equipment";
        $type_of_equipment->save();
//---------------------------------------------------------------------------------------
        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="Hook Frame";
        $type_of_equipment->categorie="Equipment";
        $type_of_equipment->save();
//---------------------------------------------------------------------------------------
        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="infrastructures";
        $type_of_equipment->categorie="Equipment";
        $type_of_equipment->save();
//---------------------------------------------------------------------------------------




        $nature_of_damage=new NatureOfDamage();
        $nature_of_damage->name="Machinery breakdown";
        $nature_of_damage->categorie="Equipment";
        $nature_of_damage->save();

        $nature_of_damage=new NatureOfDamage();
        $nature_of_damage->name="Glass breakage";
        $nature_of_damage->categorie="Equipment";
        $nature_of_damage->save();

        $nature_of_damage=new NatureOfDamage();
        $nature_of_damage->name="Damage to infrastructure";
        $nature_of_damage->categorie="Equipment";
        $nature_of_damage->save();



        $nature_of_damage=new NatureOfDamage();
        $nature_of_damage->name="Machinery breakdown";
        $nature_of_damage->categorie="Automobile";
        $nature_of_damage->save();

        $nature_of_damage=new NatureOfDamage();
        $nature_of_damage->name="Glass breakage";
        $nature_of_damage->categorie="Automobile";
        $nature_of_damage->save();

        $nature_of_damage=new NatureOfDamage();
        $nature_of_damage->name="Damage to infrastructure";
        $nature_of_damage->categorie="Automobile";
        $nature_of_damage->save();








































        $fonction=new Fonction();
        $fonction->name="Engineer";
        $fonction->department_id=$department->id;
        $fonction->save();

        $user=new User();
        $user->username="test";
        $user->lastName="abdous";
        $user->firstName="hamza";
        $user->email="test";
        $user->password="test";
        $user->phoneNumber="test";
        $user->fonction_id=$fonction->id;
        $user->save();

    }
}
