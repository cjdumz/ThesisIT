
<h2>Update users</h2>

<table>
  <thead>
    <tr>
      <th>#</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email Address</th>
      <th>Age</th>
      <th>Location</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($result as $row) : ?>
    <tr>
      <td><?php echo escape($row["id"]); ?></td>
      <td><?php echo escape($row["firstname"]); ?></td>
      <td><?php echo escape($row["lastname"]); ?></td>
      <td><?php echo escape($row["middlename"]); ?></td>
      <td><?php echo escape($row["email"]); ?></td>
      <td><?php echo escape($row["mnumber"]); ?></td>
      <td><?php echo escape($row["telnumber"]); ?></td>
  </tr>
  <?php endforeach; ?>
  </tbody>
</table>