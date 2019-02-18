<?php 

if(isset($_GET['likeId']))
	makeLike();

if(isset($_GET['unlikeId']))
	makeunLike();

		$sql = "select page.id, page.title, page.tag, page.dateTime,(select name from users where userId = id) as name, category.name as category, page.count, (select count(id) from pagecomments where pageId = page.id) as comments from page left join category on page.categoryId = category.id";

		if(isset($_GET['ctg']))
		{
			$a[] = $_GET['ctg'];
			
			subCategory($a, $_GET['ctg']);		
			$sql .= " where category.id in(".implode(", ", $a).")";
		}

		$table = mysqli_query($cn, $sql);

		print '<div class= "row con-flex">';
		while($row = mysqli_fetch_assoc($table))
		{
            $likeUserNames = array();
	        $likeUserIds = array();
            
			print '<div class= "col-md-4">';
			print '<div class="single-article-area">';
            
			print '<div class= "news-img">';
            findImage($row['id']);
            print '</div>';
            
			print '<a href="?p=article_details&id='.$row["id"].'" class="news-title"><h3>'.substr(htmlentities($row["title"]), 0, 60).'</h3></a>';
			
			print '<span class= "tag"> Tag: '.$row["tag"].'</span>';
			
			print '<b class = "category"> Category: '.$row["category"].'</b>';
			
			print '<span id="dt"> Date Time: '.$row["dateTime"].', Page Hit: '.$row["count"].'<br> Written by: <i>'.$row['name'].'</i></span>';
			
/*			$fileName = "article/".str_replace(" ", "_", trim($row["title"])).".html";
			$file = fopen($fileName, "r");
			$content = fread($file, filesize($fileName));
			
			print '<div class = "newsText">'.substr(strip_tags($content), 0, 200).'......
			<a href="?p=article_details&id='.$row["id"].'">Read More</a> </div>'; */
            
            
			findLikes($row['id'], $likeUserNames, $likeUserIds);
            
			print '<div class = "like-comment" >';
            if(!isset($_SESSION['type']))
            {
                $_SESSION['id'] = "";
            }
            if(!in_array($_SESSION['id'], $likeUserIds))
                {
                    print '<a href="?p='.$_GET['p'].'&ctg='.$_GET['ctg'].'&likeId='.$row['id'].'"><i class = "fa fa-thumbs-up ml"></i>Like:</a>';
                }
                else
                {
                    print '<a href="?p='.$_GET['p'].'&ctg='.$_GET['ctg'].'&unlikeId='.$row['id'].'"><i class = "fa fa-thumbs-down ml"></i>UnLike:</a>';
                }
            print '<a href="#" title="'.implode("\n", $likeUserNames).'">'.count($likeUserNames).'</a> | <i class = "fa fa-comments com"></i>Comments: '.$row["comments"].'</div>';
            
            
			print '</div>';
			print '</div>';
			
			
		}
			
			print '</div>';

//========================= For bring all the Sub category...====================
function subCategory(&$a, $ctg)
{
			global $cn;
			$sql = "select id, name from category where categoryId = ".$ctg;
			
			$table = mysqli_query($cn, $sql);
    
			
			while($row = mysqli_fetch_assoc($table))
			{
				$a[] = $row["id"];
				subCategory($a, $row["id"]);
			}
	
}
//======================== For view the likes...============================
function findLikes($pid, &$likeUserNames, &$likeUserIds)
{
	global $cn;
	$sql = "select pl.userId, u.name, pl.dateTime from pagelikes as pl left join users as u on pl.userId = u.id where pl.pageId = ".$pid;
	$table = mysqli_query($cn, $sql);
	while($row = mysqli_fetch_assoc($table))
	{
		$likeUserNames[] = $row["name"];
		$likeUserIds[] = $row["userId"];
	}
}
//======================= For insert the like...============================
function makeLike()
{
	global $cn;
	$sql = "insert into pagelikes(pageId, userId) values(".$_GET['likeId'].", ".$_SESSION['id'].")";
	mysqli_query($cn, $sql);
}
//======================= For delete the like...============================
function makeunLike()
{
	global $cn;
	$sql = "delete from pagelikes where pageId = ".$_GET['unlikeId']." and  userId = ".$_SESSION['id'];
	mysqli_query($cn, $sql);
	
}
//====================== For calling the page iamge...======================
function findImage($pid)
{
    global $cn;
    $sql = "select id, title, image from pageimage where pageId =".$pid. " limit 0, 1";
    $table = mysqli_query($cn, $sql);
    while($row = mysqli_fetch_assoc($table))
    {
        print '<img src="uploads/images/'.$row["id"].'_'.$row["image"].'" title="'.$row['title'].'"/>';
    }
    
}
?>
