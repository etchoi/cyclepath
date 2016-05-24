y7y6<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Search Results</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" href="/assets/css/header.css">
  <link rel="stylesheet" href="/assets/css/style.css">
</head> 

<?php $this->load->view('header') ?>

  <div id="main_container">
    <div id="sub_container">
    <h2>Your Search Results!</h2>

    <div class="panel panel-default">
     <div class="panel-heading"><h4>Your Search returned <?= count($results) ?> results!</h4></div>

   <div class="search_results">
      <table class="table">
        <tr>
          <th>Image </th>
          <th>Category Name </th>
          <th>Item Name </th>
          <th>Description </th>
          <th>Price </th>
        </tr>
        <?php foreach ($results as $list_item) {?>
        <tr class="search_results">
            <td>
              <a href="/item_page/<?= $list_item['id'] ?>"><img src="<?=$list_item['link'] ?>" width="100" height="100"></a>
            </td>

      		  <td><?= $list_item['category_name'] ?></td>
            <td><?= $list_item['item_name'] ?></td>
            <td><?= $list_item['description'] ?></td>
            <td><?= $list_item['price'] ?></td>
        </tr>
        <?php } ?>
      </table>
    </div>
    </div>
  </div>

</body>
</html>