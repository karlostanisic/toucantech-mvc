        <h4>Schools</h4>
        <table class="hoverable bordered">
            <thead>
                <tr>
                    <th>School ID</th>
                    <th>Name</th>
                    <th>Members</th>
                </tr>
            </thead>
            <tbody>
<?php
$allSchools = $data['allSchools'];

for ($i = 0; $i < count($allSchools); $i++) {
    echo "<tr>";
        echo "<td>" . $allSchools[$i]["SchoolID"] . "</td>";
        echo "<td>" . $allSchools[$i]["Name"] . "</td>";

        // Link to school members page
        echo "<td><a href='/toucantech-mvc/public/schools/school_members/" . $allSchools[$i]["SchoolID"] . "' class='waves-effect waves-light btn'>view members</a></td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
echo "</section>";