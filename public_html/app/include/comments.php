<div class="cpl-md-12 col-12 comments">

    <h3>Оставить комментарий</h3>
    <form action="app/controllers/commentaries.php" method="post">
        <input hidden name="post" value="<?=$post['id']?>">
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Ваш комментарий</label>
            <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="mb-12 col-12 col-md-12 err">
            <?php include "app/helps/error_info.php"; ?>
        </div>
        <div class="col-12">
            <button type="submit" name="goComment" class="btn btn-primary">Отправить</button>
        </div>

    </form>

    <div class="row all-comments">
        <h3 class="col-12">Комментарии к записи</h3>
        <?php
        $comments = showComments('comments', $post['id']);
        foreach ($comments as $comment){
            ?>
            <div class="one-comment col-12">
                <span><?=$comment['username']?></span>
                <span><?=$comment['created_date']?></span>
                <div class="col-12 text">
                    <?=$comment['comment']?>
                </div>
            </div>
            <?php
        }
        ?>
    </div>


</div>


