<?php
$page = "";
$title = "";
$file = array();

$epage = "";
$etitle = "";
$efile = "";

if(isset($_POST['submit']))
{
    $page = $_POST['page'];
    $title = $_POST['title'];
    $file = $_FILES['file'];
    
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
    if($file['name'] == "")
    {
        $er++;
        $efile = '<span class = "error">*Required</span>';
    }
/*================= File && image validation... =========================*/
    else
    {
        $a = explode(".", $file['name']);
        if(is_array($a) && count($a)>1)
        {
            $ext = strtolower($a[count($a)-1]);
            if($ext == "doc" || $ext == "docx" || $ext == "pdf")
            {
                if($file['size'] > (5*1024*1024))
                {
                    $er++;
                    $efile = '<span class = "error">*file size must be less than 5MB</span>';
                }
            }
            else
            {
                $er++;
                $efile = '<span class = "error">*Only doc, docx and pdf format is allowed</span>';
            }
        }
        else
        {
            $er++;
            $efile = '<span class = "error">*Invalid file format</span>';
        }
    }
    
    if($er == 0)
    {
        $sql = "insert into pagefile (pageId, title, file) values (".ms(strip_tags($page)).", '".ms(strip_tags($title))."', '".ms(strip_tags($file['name']))."')";
        if(mysqli_query($cn, $sql))
        {
            
/*=================== For upload file on folder in project...=====================*/
            $sp = $file['tmp_name'];
            $dp = "uploads/files/".mysqli_insert_id($cn)."_".$file['name'];
            move_uploaded_file($sp, $dp);
            
            print '<span class= "successMessage">Data saved</span>';
            $page = "";
            $title = "";
            $file = array();
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

            <p><label for="file">file</label><?php print $efile; ?></p>
            <p><input type="file" name="file" value=""></p>

            <p><input type="submit" name="submit" value="Upload"></p>
        </form>
    </div>
</div>
