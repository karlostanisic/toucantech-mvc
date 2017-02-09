<?php

class Members extends Controller {
    protected $DBconn;
    
    public function __construct($db) {
        $this->DBconn = $db;
    }
    
    public function index($memberID = null) {
        $member = $this->model('Member', $this->DBconn);
        
        if (!is_null($memberID)) {
            $member->memberID = $memberID;
            $member->delete();
        }
        
        $allMembers = $member->readAll();
        
        for ($i = 0; $i < count($allMembers); $i++) {
            $member->memberID = $allMembers[$i]["MemberID"];
            $memberSchools = $member->retrieveSchools();
            $allMembers[$i]['schools'] = $memberSchools;
        }

        $this->view('members/index', ['allMembers' => $allMembers]);
    }
    
    public function member_form($memberID = null) {
        $member = $this->model('Member', $this->DBconn);
        
        if(isset($_POST['name'])) {
            $member->name = $_POST['name'];
            $member->emailAddress = $_POST['emailAddress'];
            if($_POST['memberID'] === "") {
                $member->create();
            } else {
                $member->memberID = $_POST['memberID'];
                $member->update();
                
                if (isset($_POST['removeSchoolID'])) {
                    $removeSchoolID = $_POST['removeSchoolID'];
                    for ($i = 0; $i < count($removeSchoolID); $i++) {
                        $member->removeSchool($removeSchoolID[$i]);
                    }
                }
            }
            
            $schoolID = $_POST['schoolID'];
            if ($schoolID !== "0") {
                $member->addSchool($schoolID);
            }
            
            $allMembers = $member->readAll();
        
            for ($i = 0; $i < count($allMembers); $i++) {
                $member->memberID = 
                $schools = $allMembers[$i]["MemberID"];
                $memberSchools = $member->retrieveSchools();
                $allMembers[$i]['schools'] = $memberSchools;
            }

            $this->view('members/index', ['allMembers' => $allMembers]);
        } else {
            $memberSchools = [];
            if(!is_null($memberID)) {
                $member->memberID = $memberID;
                $member->read();
                $memberSchools = $member->retrieveSchools();
            }
            
            $school = $this->model('School', $this->DBconn);
            $allSchools = $school->readAll();

            $this->view('members/member_form', ['member' => $member, 'memberSchools' => $memberSchools, 'allSchools' => $allSchools]);
        }
    }
}
