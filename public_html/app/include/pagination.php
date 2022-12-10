<?php
if(isset($_GET['id_topic'])){
    $id_topic = "&id_topic={$_GET['id_topic']}";
    $total_pages = ceil(countRowTopics('posts', $_GET['id_topic']) / $limit);

}else{
    $id_topic = '';
}
?>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php if($page > 1): ?>
            <li class="page-item"><a class="page-link" href="?page=<?=$page - 1?><?=$id_topic?>">Prev</a></li>
        <?php endif; ?>
        <li>Страница - <?=$page?></li>
        <?php if($page < $total_pages): ?>
            <li class="page-item"><a class="page-link" href="?page=<?=$page + 1?><?=$id_topic?>">Next</a></li>
        <?php endif; ?>

    </ul>
</nav>