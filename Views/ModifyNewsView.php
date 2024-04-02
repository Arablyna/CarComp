<?php
require_once "Models\GestionNewsModel.php";
require_once "Controllers\ModifyNewsController.php";
class ModifyNewsView
{
    public  function news($id)
{  $cntr= new ModifyNewsController();
    $news=($cntr->getNews($id))->fetch(PDO::FETCH_ASSOC);
    ?>
<div class='news-management-container'>
        <h1>Modifier News</h1>

        <!-- Formulaire d'ajout de news -->
        <div class='add-news-form'>
 <form id ="form2" method="post" action="apirouteController.php" enctype="multipart/form-data" >
 <div class="form-group">
        <label for="r-title">Title</label>
        <input required type="text" class="form-control" id="r-title" name="title" value="<?php echo $news['title'] ?>">
    </div>
    <div class="form-group">
    <label for="img_news">News Image:</label>
    <input type="file" name="img_news" value="<?php echo $news['img_news'] ?>">
    </div>
    <div class="form-group">
        <label for="content">Article</label>
        <textarea required class="form-control" rows="10" id="content" name="content"><?php echo $news['content'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="imageUrl">Image URL</label>
        <input required type="text" class="form-control" id="imageUrl" name="imageUrl" value="<?php echo $news['imageUrl'] ?>">
    </div>
    <div class="form-group">
        <label for="date">Date</label>
        <input required type="text" class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" value="<?php echo $news['date'] ?>">
    </div>
  
  <div class="row">
  <button id="submit"  onclick="this.form.submit()" name="modifynewssubmit" value="<?php echo $id ?>" class="btn btn-primary btn-lg btn-block">Submit</button>
 </div>
 </div>
</div>
</form>



    <?php
}
}