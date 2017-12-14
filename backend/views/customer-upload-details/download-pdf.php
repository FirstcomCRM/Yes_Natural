<?php


 ?>

<style>
  table{
    width:100%;
    border-collapse: collapse;
  }
</style>

<div class="wrapper">
  <h2 style="text-align:center">Customer Details</h2>
  <table border=1 cellpadding=5>
    <thead>
      <tr>
        <th>Customer Name</th>
        <th>NRIC</th>
        <th>Mobile No</th>
        <th>Email</th>
        <th>Address</th>
        <th>Date of Birth</th>
        <th>Details</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($dataProvider->query->asArray()->all() as $key => $value): ?>
          <tr>
            <td><?php echo $value['customer_name'] ?></td>
            <td><?php echo $value['nric'] ?></td>
            <td><?php echo $value['mobile_no'] ?></td>
            <td><?php echo $value['email'] ?></td>
            <td><?php echo nl2br($value['address']) ?></td>
            <td><?php echo $value['date_of_birth'] ?></td>
            <td><?php echo nl2br($value['details']) ?></td>
          </tr>
      <?php endforeach; ?>
    </tbody>
k
  </table>
</div>
