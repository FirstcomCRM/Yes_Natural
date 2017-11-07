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
        <th>IC No</th>
        <th>Phone No</th>
        <th>Email ID</th>
        <th>Address</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($dataProvider->query->all() as $key => $value): ?>

          <tr>
            <td><?php echo $value->ic_no ?></td>
            <td><?php echo $value->phone_no ?></td>
            <td><?php echo $value->email_id ?></td>
            <td><?php echo $value->address ?></td>
          </tr>

      <?php endforeach; ?>
    </tbody>

  </table>
</div>
