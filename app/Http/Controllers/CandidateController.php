<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\SkillSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\controller;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Candidate::with('job','skillSet.skill')->get();
        return $this->responseSuccessWithData('success', $data);
    }

    /**
    * Store a newly created resource in storage.
    */ 
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "job_id" => "required|integer|exists:jobs,id",
                "name" => "required|string",
                "email" => "required|email|unique:candidates,email",
                "phone" => "required|numeric|unique:candidates,phone",
                "year" => "required|integer",
                "skill_ids" => "required|array",
                "skill_ids.*" => "integer|exists:skills,id"
            ]
        );

        if ($validator->fails()) {
            return $this->responseFailValidation($validator->errors());
        }

        $validData = $validator->validated();

        try {
            $data = Candidate::create($validData);

            foreach ($request->skill_ids as $skill){
               SkillSet::create([
                    'candidate_id' => $data->id,
                    'skill_id' => $skill
                ]);
            }

            $data['skill_set'] = SkillSet::where('candidate_id',$data->id)->get();

        } catch (QueryException $e) {
            return $this->responseError("Internal Server Error", 500, $e->errorInfo);
        }

        return $this->responseSuccessWithData('success', $data);
    }

    
}
