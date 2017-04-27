<?php require_once('Connections/upload.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_upload, $upload);
$query_Recordset1 = "SELECT * FROM upload ORDER BY ID DESC";
$Recordset1 = mysql_query($query_Recordset1, $upload) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>
<script>
function check()
{
if (!confirm("確認刪除!"))
return false;
}
</script>
<body>
<table width="50%" border="0" align="center">
  <tr>
    <td align="right"><a href="upload.php">新增檔案</a></td>
  </tr>
</table>
<?php do { ?>
  <table width="50%" border="1" align="center">
    <tr>
      <td width="10%">名稱</td>
      <td><?php echo $row_Recordset1['UserFilename']; ?></td>
      <td width="10%">大小</td>
      <td><?php echo $row_Recordset1['Size']; ?></td>
      <td width="10%"><a href="download.php?UserFilename=<?php echo $row_Recordset1['UserFilename']; ?>&ServerFilename=<?php echo $row_Recordset1['SeverFilename']; ?>">下載</a> <a href="<?php echo $row_Recordset1['ID']; ?>&ServerFilename=<?php echo $row_Recordset1['SeverFilename']; ?>" onClick="return check();">刪除</a></td>
    </tr>
    <tr>
      <td width="10%">說明</td>
      <td colspan="4"><?php echo $row_Recordset1['Comment']; ?></td>
    </tr>
  </table>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
