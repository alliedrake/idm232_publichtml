<?php
$page_title = 'View Recipe';?>

<?php require_once __DIR__  . '/_global/header.php';?>

<?php

if (isset($_GET['id'])) {
    $recipe_id = $_GET['id'];

    // Build Query
    $query = 'SELECT recipe.id, recipe.title, recipe.description, recipe.servings, file.file_path, recipe.prep_time, recipe.cook_time, recipe.servings, recipe.ingredients, recipe.step_1, recipe.step_2, recipe.step_3, recipe.step_4, recipe.step_5, recipe.step_6 ';
    $query .= 'FROM add_recipes AS recipe ';
    $query .= 'INNER JOIN files AS file ';
    $query .= 'ON recipe.file_id = file.id ';
    $query .= 'WHERE recipe.id = ' . $recipe_id;

    $db_results = mysqli_query($db_connection, $query);
    if ($db_results && $db_results->num_rows > 0) {
        // Get row from results and assign to $user variable;
        $recipe = mysqli_fetch_assoc($db_results);
    } else {
        // Redirect user if ID does not have a match in the DB
        redirectTo('/admin/recipes?error=' . mysqli_error($db_connection));
    }
} else {
    // Redirect user if no ID is passed in URL
    redirectTo('/admin/recipes');
}
?>

<div class="recipe-container">

<div class="recipe_header">

    <div class="recipeicons">
    <img src="dist/images/downloadicon.png" alt="download">
    <img src="dist/images/printicon.png" alt="print">
    </div>

    <h1><?php echo $recipe['title']; ?></h1>
    <b><p>Prep Time: <?php echo $recipe['prep_time'];?> | Cook Time: <?php echo $recipe['cook_time'];?> | Servings: <?php echo $recipe['servings'];?></p></b>
    <p><?php echo $recipe['description']; ?></p>
</div>

<div class="recipeimage">
<p><img src=" <?php echo $recipe['file_path']; ?>"img width="600" alt=""></p>
</div>

<div class="text-container">

<div class="ingredients">
    <h2>Ingredients</h2>
    <hr>

<div class="ingredientlist">
<ul><li><?php echo $recipe['ingredients']; ?></li></ul>
</div>
</div>

<div class="directions">
    <h2>Directions</h2>
    <hr>
    <p><b>Step 1: </b><?php echo $recipe['step_1'];?></p>
    <p><b>Step 2: </b><?php echo $recipe['step_2'];?></p>
    <p><b>Step 3: </b><?php echo $recipe['step_3'];?></p>
    <p><b>Step 4: </b><?php echo $recipe['step_4'];?></p>
    <p><b>Step 5: </b><?php echo $recipe['step_5'];?></p>
    <p><b>Step 6: </b><?php echo $recipe['step_6'];?></p>
</div>

</div>

<div class="morerecipescontainer">
    <h2>More Recipes</h2>
    <hr>
</div>

<div class="morerecipes">
<div class='recipe1'>
<img src="dist/images/chickenpiccata.png">
<h3>Quick Chicken Picatta</h3>
</div>

<div class="recipe2">
<img src="dist/images/chickenpiccata.png">
<h3>Quick Chicken Picatta</h3>
</div>

<div class="recipe3">
<img src="dist/images/chickenpiccata.png">
<h3>Quick Chicken Picatta</h3>
</div>

<div class="recipe3">
    <img src="dist/images/chickenpiccata.png">
    <h3>Quick Chicken Picatta</h3>
    </div>
</div>


</div>
</div>
 

<div class="footer">
    <a href="<?php siteUrl('/home.php'); ?>"><img src="../../dist/images/foodie.png" alt="banner"></a>
</div>


</body>
<html>