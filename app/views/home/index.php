<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($data['users'] as $user) : ?>
        <tr>
            <th scope="row"><?= $i; ?></th>
            <td><?= $user['name']; ?></td>
            <td><?= $user['email']; ?></td>
            <td><?= $user['phone']; ?></td>
        </tr>
        <?php $i++; endforeach; ?>
    </tbody>
</table>