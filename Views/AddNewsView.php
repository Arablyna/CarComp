
<?php
require_once "Models\GestionNewsModel.php";
require_once "Controllers\ModifyNewsController.php";
class AddNewsView
{
    public  function news()
{
    ?>
<div class='news-management-container'>
        <h1>ajouter News</h1>

        <!-- Formulaire d'ajout de news -->
        <div class='add-news-form'>
<form action="./apirouteController.php" method="post" enctype="multipart/form-data" onsubmit="return confirm('Do you really want to submit the form?');">
    <label for="img_news">News Image:</label>
    <input type="file" name="img_news" required>
    <br>

    <label for="title">Title:</label>
    <input type="text" name="title" required>
    <br>

    <label for="content">Content:</label>
    <textarea name="content" rows="4" required></textarea>
    <br>

    <label for="imageUrl">Image URL:</label>
    <input type="text" name="imageUrl" required>
    <br>

    <label for="date">Date:</label>
    <input type="text" name="date" placeholder="YYYY-MM-DD" required>
    <br>
    <button type='submit' onclick="this.form.submit()" name="newssubmit"  class="btn btn-primary btn-lg btn-block">Ajouter</button>
</form>
</div>
</div>

</body>
</html>
<?php
}
}

