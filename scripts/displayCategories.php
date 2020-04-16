<!-- displayCategories.php -->
<?php
$query = "SELECT * FROM my_product_categories
  ORDER BY department_name DESC";
$categories = mysqli_query($db, $query);
$num_rows = mysqli_num_rows($categories);
$categoryCount = 0;
$currentDepartment = "";
echo
"<table style=\"width:100%\"><tr><td><ul>";
if ($categories->num_rows > 0) {
    while($row = $categories->fetch_assoc()) {
      if($currentDepartment != $row['department_name']){
        if ($currentDepartment != "") {
          echo "</ol></li>"; 
        }
        if ($categoryCount > $num_rows/2) {
          echo "</ul></td>\r\n<td class='AlignToTop'><ul>";
          $categoryCount = 0;
        }
        $currentDepartment = $row['department_name'];
        echo "<li>$currentDepartment<ol>";
      }
      $catCode = urlencode($row['product_category_code']);
      $catDesc = $row['product_category_description'];
      $url = "pages/category.php?categoryCode=$catCode";
      echo "<li><a href='$url'>$catDesc</a></li>\r\n";
      $categoryCount++;
    }
} else {
    echo "0 results";
}
echo
"</ol></li></ul></td></tr></table>";
mysqli_close($db);
?>