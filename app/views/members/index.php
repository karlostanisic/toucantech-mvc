
            <h4>Members</h4>
            
            <table class="hoverable bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th>Schools</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
<?php

$allMembers = $data['allMembers'];

// Loop all members
for ($i = 0; $i < count($allMembers); $i++) {
    echo "<tr>";
        echo "<td>" . $allMembers[$i]["MemberID"] . "</td>";
        echo "<td>" . $allMembers[$i]["Name"] . "</td>";
        echo "<td>" . $allMembers[$i]["EmailAddress"] . "</td>";
        echo "<td>";
        
        for ($j = 0; $j < count($allMembers[$i]['schools']); $j++) {
                // School names are gonna be links to School view page
                echo $allMembers[$i]['schools'][$j]['Name'] . "<br>";
            }
        
        echo "</td>";

        // Links for edit / delete
        echo "<td><a href='/toucantech-mvc/public/members/member_form/" . $allMembers[$i]["MemberID"] . "' class='waves-effect waves-light btn'><i class='material-icons left'>edit</i>Edit</a></td>";
        echo "<td><a href='/toucantech-mvc/public/members/index/" . $allMembers[$i]["MemberID"] . "' class='waves-effect waves-light btn'><i class='material-icons left'>delete</i>Delete</a></td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
echo "<div class='fixed-action-btn'><a class='waves-effect waves-light btn btn-floating btn-large red' href='/toucantech-mvc/public/members/member_form'><i class='large material-icons'>add</i></a></div>";



