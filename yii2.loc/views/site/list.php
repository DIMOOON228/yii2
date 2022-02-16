<table class="table">
    <tr>
        <th>id</th>
        <th>first_name</th>
        <th>last_name</th>
        <th>company_name</th>
        <th>address</th>
        <th>city</th>
        <th>county</th>
        <th>state</th>
        <th>zip</th>
        <th>phone1</th>
        <th>phone2</th>
        <th>email</th>
        <th>web</th>
    </tr>
    <?php foreach ($rows as $row):?>
        <tr>
            <td><?= $row['id']?></td>
            <td><?= $row['first_name'] ?></td>
            <td><?= $row['last_name'] ?></td>
            <td><?= $row['company_name'] ?></td>
            <td><?= $row['address'] ?></td>
            <td><?= $row['city'] ?></td>
            <td><?= $row['county'] ?></td>
            <td><?= $row['state'] ?></td>
            <td><?= $row['zip'] ?></td>
            <td><?= $row['phone1'] ?></td>
            <td><?= $row['phone2'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['web'] ?></td>
        </tr>
    <?php endforeach;?>
</table>