<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl">
<head>
    <title>Simple Translator</title>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="" type="text/css" />
    <script type="text/javascript" src=""></script>

    <style type="text/css">

    /* Reset ================================================================================= */
    * { margin:0; padding:0; }

    body          { background:#fff; font:13px/2 Arial, Helvetica, sans-serif; color:#000; text-align:center; }

    img           { border:0; vertical-align:top; }

    a             { color:#05c; text-decoration:underline; }
    a:hover       { text-decoration:none; }

    /* Headings */
    h1            { font-size:20px; font-weight:bold; line-height:1.15; }
    h2            { font-size:18px; font-weight:bold; line-height:1.25; }
    h3            { font-size:16px; font-weight:bold; line-height:1.25; }
    h4            { font-size:14px; font-weight:bold; }
    h5            { font-size:12px; font-weight:bold; }
    h6            { font-size:11px; font-weight:bold; }

    /* Forms */
    form          { display:inline; }
    fieldset      { border:0; }
    legend        { display:none; }

    /* Table */
    table         { border:0; border-collapse:collapse; border-spacing:0; empty-cells:show; font-size:100%; }
    caption,th,td { vertical-align:top; text-align:left; font-weight:normal; }

    /* Content */
    strong        { font-weight:bold; }
    address       { font-style:normal; }
    cite          { font-style:normal; }
    q,
    blockquote    { quotes:none; }
    q:before,
    q:after       { content:''; }
    small,big     { font-size:0.75em; }
    sup           { font-size:1em; vertical-align:top; }

    /* Lists */
    ul,ol         { list-style:none; }

    /* Tools */
    .hidden       { display:block !important; border:0 !important; margin:0 !important; padding:0 !important; font-size:0 !important; line-height:0 !important; width:0 !important; height:0 !important; overflow:hidden !important; }
    .nobr         { white-space:nowrap !important; }
    .wrap         { white-space:normal !important; }
    .a-left       { text-align:left !important; }
    .a-center     { text-align:center !important; }
    .a-right      { text-align:right !important; }
    .v-top        { vertical-align:top; }
    .v-middle     { vertical-align:middle; }
    .f-left,
    .left         { float:left !important; }
    .f-right,
    .right        { float:right !important; }
    .f-none       { float:none !important; }
    .f-fix        { float:left; width:100%; }
    .no-display   { display:none; }
    .no-margin    { margin:0 !important; }
    .no-padding   { padding:0 !important; }
    .no-bg        { background:none !important; }
    /* ======================================================================================= */


    body {padding:100px}
    table.csv td{padding:2px 10px;}

    input.input-text {padding:2px; height:24px; line-height: 24px; width:600px; border:1px solid #ccc; font-size:13px}
    input.input-text.search {width:300px}
        .label {text-align: right; color:#999; border:none}
    button.button {padding:10px}
    a.searchresult {color:#999; text-decoration: none}
    a.searchresult:hover {color:#999;text-decoration: underline}

    .select-box {padding:20px; border:1px solid #ddd; display: inline-block;}
    .select-box h2 {margin-bottom:20px}

    .search-box {padding:20px; border:1px solid #ddd; float:left}
    .search-box h2 {margin-bottom:20px}

    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript"></script>
</head>
<body>


<?php
?>


<div class="search-box">
    <h2>Zoek door alle bestanden</h2>
    <div>
        <input type="text" name="keyword" id="keyword" class="input-text search" />
        <button type="submit" class="button" id="search">Zoeken</button>
    </div>

    <?php

    $dir = './app/locale/nl_NL/';
    $di = new RecursiveDirectoryIterator($dir);
    $count = 0;
    $matches = array();
    $searchthis = false;
    if (isset($_GET["keyword"])){
        $searchthis = $_GET["keyword"];
    }

    foreach (new RecursiveIteratorIterator($di) as $filename) {
        if(strstr($filename,'.csv',true)){
            $handle = @fopen($filename, "r");
            if ($handle)
            {
                while (!feof($handle))
                {
                    $buffer = fgets($handle);

                    if($searchthis && strpos($buffer, $searchthis) !== false)
                        $matches[] = str_replace($dir,'',$filename);
                }
                fclose($handle);
            }
        }
    }

    foreach (array_unique($matches) as $filename) {
        echo '<a href="#" class="searchresult" rel="'.$dir.$filename.'">'.$filename.'</a><br/>';
    }

    ?>
</div>


<script type="text/javascript">

    $(document).ready(function(){

        $('#file').change(function() {
            var file = $(this).find("option:selected").val();

            location.href = file;
        });

        $('.searchresult').live("click", function(){
            var file = $(this).attr('rel');
            console.log(file);
        });


        $('#search').click(function(){
            var keyword = $('#keyword').val();
            console.log(keyword);
        });




    });
</script>


<?php
$file = "";
if (isset($_GET["translate-file"])){
    $file = $_GET["translate-file"];
}
?>

<div class="select-box">
    <h2>Selecteer het te vertalen bestand</h2>
    <select id="file">
        <option value="">-- Selecteer bestand --</option>
        <?php
        $di = new RecursiveDirectoryIterator($dir);
        $count = 0;
        foreach (new RecursiveIteratorIterator($di) as $filename) {
            if(strstr($filename,'.csv',true)){

                $selected = basename($filename) == $file ? 'selected' : '';

                echo '<option '.$selected.' value="?translate-file='.basename($filename).'">'.str_replace($dir,'',$filename).' ('.$count.')</option>';
                $count++;
            }
        }
        ?>
    </select>


    <?php if (isset($_GET["translate-file"])): ?>
    <div>
        <?php if (isset($_GET['ou']) && $_GET['ou'] == '1' ): ?>
        Untranslated Strings <small><label><a href="?translate-file=<?php echo $file; ?>&ou=0">Show all strings</a></label></small>
        <?php else: ?>
        All Strings <small><label><a href="?translate-file=<?php echo $file; ?>&ou=1">Show only untranslated strings</a></label></small>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</div>


<?php if($_SERVER['REQUEST_METHOD'] == "POST"): ?>
	<?php

	$fp = fopen($dir.$file, 'w');
	foreach($_POST['strings'] as $data)
	{
        $data['input'] = stripslashes($data['input']);
        $data['output'] = stripcslashes($data['output']);

		$row = array('"'.$data['input'].'"','"'.$data['output'].'"');
		fwrite($fp, implode(',',$row) . "\n");
	}
	
	fclose($fp);
	?>
<?php endif; ?>


<form method="post" name="translation" >
<?php
$row = 1;

if ($file && ($handle = fopen($dir.$file, "r")) !== FALSE) {
?>


<table border='0' cellpadding="4" cellspacing="1" class="csv">
    
    <tr><td>&nbsp;</td><td class="a-right"><button type="submit" class="button">Opslaan</button></td></tr>

<?php
    while (($data = fgets($handle)) !== FALSE) {

        $data = trim($data,' ');
        $data = str_replace("\n", "", $data);
        $data = str_replace("\r", "", $data);
        $data = substr($data, 1,-1);
        $data = str_replace('", "','","',$data);
        $data = explode('","',$data);
        $num = count($data);
        ?>
        <tr <?php if($row==1){echo "";} else {echo "";} ?>>

        <?php
        for ($c=0; $c < $num; $c++) {
            ?>

            <?php if($c==0):?>
            <td>
                <input type="hidden" name='strings[<?php echo $row; ?>][input]' value='<?php echo htmlentities($data[0],ENT_QUOTES,$encoding = 'UTF-8'); ?>' />
                <div class="label"><?php echo htmlentities($data[0],ENT_QUOTES,$encoding = 'UTF-8'); ?>
            </td>
            <?php elseif (isset($_GET['ou']) && $_GET['ou'] == '1'): ?>
                <?php if ($data[0] == $data[1] || $data[1] == ''): ?>
                    <td>
                        <input type="text" class="input-text" name='strings[<?php echo $row; ?>][output]' value='<?php echo htmlentities($data[1],ENT_QUOTES,$encoding = 'UTF-8'); ?>' />
                    </td>
                <?php else: ?>
                    <td>
                        <input type="hidden" class="input-text" name='strings[<?php echo $row; ?>][output]' value='<?php echo htmlentities($data[1],ENT_QUOTES,$encoding = 'UTF-8'); ?>' />
                        <div class="label" style="text-align: left;"><?php echo htmlentities($data[1],ENT_QUOTES,$encoding = 'UTF-8'); ?></div>
                    </td>
                <?php endif; ?>

            <?php else: ?>
            <td><input type="text" class="input-text" name='strings[<?php echo $row; ?>][output]' value='<?php echo htmlentities($data[1],ENT_QUOTES,$encoding = 'UTF-8'); ?>' /></td>
            <?php endif; ?>
            <?php
        }
        ?>

        </tr>
        <?php
         $row++;
    }
    fclose($handle);
    ?>
    <tr><td>&nbsp;</td><td class="a-right"><button type="submit" class="button">Opslaan</button></td></tr>

</table>


    <?php
}
?>


</form>


</body>
</html>