// <?php 
// include("class_poi.php"); 
// $poi = new POI();
// $poi->show_by_fieldname();

// ?>
<?php
include_once 'class_poi.php';
$db = new DB();
$poi = new POI();
$result= $poi->show_all_poi();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>POI Update and Delete</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<script type="text/javascript">
function del_id(id)
{
	if(confirm('Sure to delete this record ?'))
	{
		window.location='delete_data.php?delete_id='+id
	}
}
function edit_id(id)
{
	if(confirm('Sure to edit this record ?'))
	{
		window.location='edit_data.php?edit_id='+id
	}
}
</script>
</head>
<body>
<center>
<div id="header">
	<div id="content">
    <label>POI Update and Delete</label>
    </div>
</div>
<div id="body">
	<div id="content">
    <table align="center">
    <tr>
    <th>Name</th>
    <th>Provider Name</th>
    <th>Designers</th>
    <th>Description</th>
    <th>Design year</th>
    <th>Height</th>
    <th>Tags</th>
    <th>Credit</th>
    <th>Style Definition</th>
    <th>Arch_comp</th>
    <th>Latitude</th>
    <th>Longitude</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Website URL</th>
    <th colspan="2">edit/delete</th>
    </tr>
    <?php
	while($row = $poi->fetch_rows())
	{
			?>
            <tr>
            <td><?php echo $row[]; ?></td>
            <td><?php echo $row[]; ?></td>
            <td><?php echo $row[]; ?></td>
            <td><?php echo $row[]; ?></td>
            <td><?php echo $row[]; ?></td>
            <td><?php echo $row[]; ?></td>
            <td><?php echo $row[]; ?></td>
            <td><?php echo $row[]; ?></td>
            <td><?php echo $row[]; ?></td>
            <td><?php echo $row[]; ?></td>
            <td><?php echo $row[]; ?></td>
            <td><?php echo $row[]; ?></td>
            <td><?php echo $row[]; ?></td>
            <td><?php echo $row[]; ?></td>
            <td align="center"><a href="javascript:edit_id(<?php echo $row[0]; ?>)"><img src="b_edit.png" alt="EDIT" /></a></td>
            <td align="center"><a href="javascript:del_id(<?php echo $row[0]; ?>)"><img src="b_drop.png" alt="DELETE" /></a></td>
            </tr>
            <?php
	}
	?>
    </table>
    </div>
</div>

<div id="footer">
	<div id="content">
    <hr /><br/>
    <label></label>
    </div>
</div>

</center>
</body>
</html>