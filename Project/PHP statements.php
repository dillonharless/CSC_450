/*** This places an image inside a database ***/

$imgData = file_get_contents($filename);
$size = getimagesize($filename);
mysql_connect("localhost", "$username", "$password");
mysql_select_db ("$dbname");

$sql = sprintf("INSERT INTO tablename
    (image_type, image, image_size, image_name)
    VALUES
    ('%s', '%s', '%d', '%s')",
    mysql_real_escape_string($size['mime']),
    mysql_real_escape_string($imgData),
    $size[3],
    mysql_real_escape_string($_FILES['userfile']['name'])
    );
mysql_query($sql);

/*** This displays an image from a database on a webpage ***/

$link = mysql_connect("localhost", "username", "password");
mysql_select_db("testblob");
$sql = "SELECT image FROM testblob WHERE image_id=0";
$result = mysql_query("$sql");
header("Content-type: image/jpeg");
echo mysql_result($result, 0);
mysql_close($link);