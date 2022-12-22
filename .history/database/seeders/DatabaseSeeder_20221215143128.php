<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Modules\Department\Models\Department;
use App\Modules\Fonction\Models\Fonction;
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
























        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="Ship to shores";
        $type_of_equipment->save();

        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="RTGs";
        $type_of_equipment->save();

        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="Reach stackers";
        $type_of_equipment->save();

        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="RTGs";
        $type_of_equipment->save();

        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="Forklifts";
        $type_of_equipment->save();

        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="Spreaders STS";
        $type_of_equipment->save();

        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="Spreaders RTG";
        $type_of_equipment->save();

        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="Trucks";
        $type_of_equipment->save();

        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="Trailers";
        $type_of_equipment->save();

        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="Goosenecks";
        $type_of_equipment->save();

        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="Lashing cages";
        $type_of_equipment->save();

        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="Test Weightlifting frame";
        $type_of_equipment->save();

        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="Hook Beam";
        $type_of_equipment->save();

        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="Hook Frame";
        $type_of_equipment->save();

        $type_of_equipment=new TypeOfEquipment();
        $type_of_equipment->name="infrastructures";
        $type_of_equipment->save();





































        $fonction=new Fonction();
        $fonction->name="Engineer";
        $fonction->department_id=$department->id;
        $fonction->save();

        $user=new User();
        $user->username="test";
        $user->lastName="test";
        $user->firstName="test";
        $user->email="test";
        $user->password="test";
        $user->phoneNumber="test";
        $user->fonction_id=$fonction->id;
        $user->save();

    }
}
