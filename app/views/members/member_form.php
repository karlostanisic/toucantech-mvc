<?php

$member = $data['member'];
if(isset($member->memberID)) {
    $title = 'Update';
} else {
    $title = 'Create';
    $member->memberID = "";
}
$memberSchools = $data['memberSchools'];
$allSchools = $data['allSchools'];
?>
        <h4><?php echo "$title Member"; ?></h4>
        <form name="member" action="/toucantech-mvc/public/members/member_form/" method="post" style="margin-top: 2em;">
            <div class="input-field">
                <input type='hidden' name='memberID' value='<?php echo $member->memberID ?>'/>
            </div>
            
            <div class="input-field">
                <input type="text" id="frm-input-name" name="name" value="<?php echo $member->name; ?>" placeholder="Name">
                <label for="frm-input-name">Name:</label>
            </div>
            
            <div class="input-field">
                <input type="text" id="frm-input-emailAddress" name="emailAddress" value="<?php echo $member->emailAddress; ?>" placeholder="Email Address">
                <label for="frm-input-emailAddress">Email Addres:</label>
            </div>
            
            <fieldset>
                <legend>Schools</legend>
                <label for="frm-input-schoolID">Add school:</label>
                <select name="schoolID" id="frm-input-schoolID" class="browser-default">
                    <option value="0" selected="">--</option>
<?php

if($allSchools !== FALSE) {
    for ($i = 0; $i < count($allSchools); $i++) {
        echo "<option value='" . $allSchools[$i]["SchoolID"] . "'>" . $allSchools[$i]["Name"] . "</option>";
    }
}
echo "</select>";

// If member is associated to at least one school, offer options for removing association
if (count($memberSchools) > 0) {
    echo "<fieldset>";
    echo "<legend>Remove school(s)</legend>";
    
    // Array of checkboxes
    for ($i = 0; $i < count($memberSchools); $i++) {
        echo "<div>";
            echo "<input type='checkbox' name='removeSchoolID[]' id='frm-remove-school-" . $memberSchools[$i]["SchoolID"] . "' value='" . $memberSchools[$i]["SchoolID"] . "'>";
            echo "<label for='frm-remove-school-" . $memberSchools[$i]["SchoolID"] . "'>" . $memberSchools[$i]["Name"] . "</label>";
        echo "</div>";
    }
    echo "</fieldset>";
}
echo "</fieldset>";
echo "<div class='input-field'>";
echo "<input type='submit' value='$title Member' style='margin-right:.3em;' class='waves-effect waves-light btn'/>";
echo "<a href='javascript:history.go(-1)' class='waves-effect waves-light btn'>Cancel</a>";
echo "</div>";
echo "</form>";