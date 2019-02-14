<?php 
	
		$sql = "select page.id, page.title, page.tag, page.dateTime, (select name from users where userId = id) as name, category.name as category, page.count, (select count(id) from pagecomments where pageId = page.id) as comments from page left join category on page.categoryId = category.id where page.id =".$_GET['id'];

		$table = mysqli_query($cn, $sql);

		print '<div class= "row">';
		while($row = mysqli_fetch_assoc($table))
		{
			print '<div class= "col-md-10">';
			print '<div class="detail-article-area">';
			
			print '<a href="?p=article_details&id='.$row["id"].'" class="news-title"><h2>'.$row["title"].'</h2></a>';
			
			print '<h6 class= "tag"> Tag: '.$row["tag"].'</h6>';
			
			print '<h6 class = "category"> Category: '.$row["category"].'</h6>';
			
			print '<p id="dt"> Date Time: '.$row["dateTime"].', 
			Page Hit: '.$row["count"].', 
			Written by: <i>'.$row["name"].'</i></p>';
			
			$fileName = "article/".str_replace(" ", "_", trim($row["title"])).".html";
			$file = fopen($fileName, "r");
			$content = fread($file, filesize($fileName));
			
            print '<div class = "details-img">';
            findImage($row['id']);
            print '</div>';            
            print '<div class = "details-file">';
            findFile($row['id']);
            print '</div>';
			print '<div class = "newsText">'.$content.'</div>';
			
			print '<span >Like: 0 | Comments: '.$row["comments"].'</span>';
			print '</div>';
			print '</div>';
			
			
		}
			
			print '</div>';

if(isset($_SESSION['type']))
{
    include('public/comment_new.php');
}
	include("public/comment_dispaly.php");


//=============== For call the page image...=================
function findImage($pid)
{
    global $cn;
    $sql = "select id, title, image from pageimage where pageId =".$pid;
    $table = mysqli_query($cn, $sql);
    while($row = mysqli_fetch_assoc($table))
    {
        print '<img src="uploads/images/'.$row["id"].'_'.$row["image"].'" title="'.$row['title'].'"/>';
    }
    
}

//============= For call the page file...======================
function findFile($pid)
{
    global $cn;
    $sql = "select id, title, file from pagefile where pageId =".$pid;
    $table = mysqli_query($cn, $sql);
    while($row = mysqli_fetch_assoc($table))
    {
        print '<a href="uploads/files/'.$row["id"].'_'.$row["file"].'"<a/>';
    }
    
}
	?>
