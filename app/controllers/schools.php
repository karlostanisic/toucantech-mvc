<?php

class Schools extends Controller {
    
    protected $DBconn;
    
    public function __construct($db) {
        $this->DBconn = $db;
    }
    
    public function index() {
        
        $school = $this->model('School', $this->DBconn);
        $allSchools = $school->readAll();
        
        $this->view('schools/index', ['allSchools' => $allSchools]);
    }
    
    public function school_members($schoolID = null) {
        $school = $this->model('School', $this->DBconn);
        $school->schoolID = $schoolID;
        $school->read();
        $schoolMembers = $school->retrieveMembers();
        
        $this->view('schools/school_members', ['school' =>$school, 'schoolMembers' => $schoolMembers]);
    }
}

