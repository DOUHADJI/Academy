<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        return view("user.student-exams");
    }
    

    /**
     * Professor section
     */

     public function p_index()
     {
        return view("professor.add-exam");
     }
}