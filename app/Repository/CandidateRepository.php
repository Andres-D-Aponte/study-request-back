<?php

namespace App\Repository;

use App\Models\Candidate;

class CandidateRepository extends Repository
{
    function findById($id) {
        return Candidate::find($id);
    }

    function findAll() {
        return Candidate::all();
    }
}
