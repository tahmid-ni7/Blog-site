<?php
$comment = "";
$ecomment = "";
if(isset($_POST['comment']))
{
    $comment = $_POST['comment'];
    $er = 0;
    if($comment == "")
    {
        $er++;
        $ecomment = '<span class="error">Required</span>';
    }

    if($er == 0)
    {
        $sql = "insert into pagecomments(pageId, userId, comment) values(".$_GET['id'].", ".$_SESSION['id'].", '".$comment."' )";
        if(!mysqli_query($cn, $sql))
        {
            print '<span class="error">'.mysqli_error($cn).'</span>';
        }
    }
}

?>


<div class="comment-area">
    <div class="row">
        <div class="col-md-8">
            <form action="" method="post">
                <?php print $ecomment; ?>
                <p><textarea name="comment" class="comment" placeholder="Your comment here..."></textarea></p>
                <input type="submit" name="submit" class="comment-btn" value="Comment">
            </form>
        </div>
    </div>
</div>
