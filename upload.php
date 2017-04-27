<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
<style type="text/css">

</style>
</head>

<body>
<form action="add.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="50%" border="0" align="center">
    <tr>
      <td><p>選擇上傳檔案
          <input name="post_max_size" type="hidden" id="post_max_size" value="800000">
      </p>
        <p>
          <label for="myfile"></label>
          <input type="file" name="myfile" id="myfile">
          <input name="button" type="submit"id="button" value="送出" >
      </p></td>
    </tr>
  </table>
</form>
</body>
</html>