<?php
$page = "";
$title = "";
$image = array();

$epage = "";
$etitle = "";
$eimage = "";

if(isset($_POST['submit']))
{
    $page = $_POST['page'];
    $title = $_POST['title'];
    $image = $_FILES['image'];
    
    $er = 0;
    
    if($page == "0")
    {
        $er++;
        $epage = '<span class = "error">*Required</span>';
    }
    if($title == "")
    {
        $er++;
        $etitle = '<span class = "error">*Required</span>';
        
    }
    if($image['name'] == "")
    {
        $er++;
        $eimage = '<span class = "error">*Required</span>';
    }
/*================= File && image validation... =========================*/
    else
    {
        $a = explode(".", $image['name']);
        if(is_array($a) && count($a)>1)
        {
            $ext = strtolower($a[count($a)-1]);
            if($ext == "png" || $ext == "jpg" || $ext == "gif")
            {
                if($image['size'] > (2*1024*1024))
                {
                    $er++;
                    $eimage = '<span class = "error">*Image size must be less than 2MB</span>';
                }
            }
            else
            {
                $er++;
                $eimage = '<span class = "error">*Only png, jpg and gif format is allowed</span>';
            }
        }
        else
        {
            $er++;
            $eimage = '<span class = "error">*Invalid file format</span>';
        }
    }
    
    if($er == 0)
    {
        $sql = "insert into pageImage (pageId, title, image) values (".ms(strip_tags($page)).", '".ms(strip_tags($title))."', '".ms(strip_tags($image['name']))."')";
        if(mysqli_query($cn, $sql))
        {
/*=================== For upload image on folder in project...=====================*/
            $sp = $image['tmp_name'];
            $dp = "uploads/images/".mysqli_insert_id($cn)."_".$image['name'];
            move_uploaded_file($sp, $dp);
            
            print '<span class= "successMessage">Data saved</span>';
            $page = "";
            $title = "";
            $image = array();
        }
        else
        {
            print '<span class="error">'.mysqli_error($cn).'</span>';
        }
    }
    else
    {
        print '<span class="error">*Plaese fill all the field correctly</span>';
    }
}

?>



<div class="row">
    <div class="col-md-7">
        <form action="" method="post" enctype="multipart/form-data">
            <p><label for="page">Page</label><?php print $epage; ?></p>
            <select name="page">
                <option value="0">Select</option>
                <?php
                $sql = "select id, title from page";
                $table = mysqli_query($cn, $sql);
                while($row = mysqli_fetch_assoc($table))
                {
                    print '<option value="'.$row["id"].'">'.$row["title"].'</option>';
                }
                ?>
            </select>

            <p><label for="title">Title</label><?php print $etitle; ?></p>
            <p><input type="text" name="title" value="<?php print $title; ?>"></p>

            <p><label for="image">Image</label><?php print $eimage; ?></p>
            <p><input type="file" name="image" value=""></p>

            <p><input type="submit" name="submit" value="Upload"></p>
        </form>
    </div>
</div>
