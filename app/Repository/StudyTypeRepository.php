<?php

namespace App\Repository;

use App\Models\StudyType;

class StudyTypeRepository extends Repository
{
    function findById($id) {
        return StudyType::find($id);
    }

    function findAll() {
        return StudyType::all();
    }
}
