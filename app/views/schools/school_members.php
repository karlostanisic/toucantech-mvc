
<?php
$school = $data['school'];
$schoolMembers = $data['schoolMembers'];

echo "<h4>$school->name</h4>";
echo "<h5>School members:</h5>";
?>

<table class="bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email Address</th>
        </tr>
    </thead>
    <tbody>
<?php
for ($i = 0; $i < count($schoolMembers); $i++) {
    echo "<tr>";
        echo "<td>" . $schoolMembers[$i]["MemberID"] . "</td>";
        echo "<td>" . $schoolMembers[$i]["Name"] . "</td>";
        echo "<td>" . $schoolMembers[$i]["EmailAddress"] . "</td>";
    echo "</tr>";
}
?>
    </tbody>
</table>
