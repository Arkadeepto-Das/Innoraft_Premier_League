<h1>Players</h1>
<h2>Points : </h2>
<table class="list">
  <tr>
    <th>Employee-ID</th>
    <th>Employee name</th>
    <th>Type</th>
    <th>Points</th>
  </tr>
  <?php
    foreach ($playerList as $value) {
  ?>
    <tr>
      <td><?php echo $value["employee_id"];?></td>
      <td><?php echo $value["employee_name"];?></td>
      <td><?php echo $value["type"];?></td>
      <td><?php echo $value["points"];?></td>
      <td>
        <button id="<?php echo $value["employee_id"];?>"></button>
      </td>
    </tr>
  <?php
    }
  ?>
</table>