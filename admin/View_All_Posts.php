<div class="col-xs-12"></div>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
		<th>Id</th>
        <th>Category</th>
        <th>Title</th>
        <th>Author</th>
        <th>Date</th>
        <th>Image</th>
        <th>Content</th>
        <th>Tag</th>
        <th>Comment_count</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
		</tr>
	</thead>

	<tbody>
		<?php

$query = "SELECT * FROM posts ";
$posts_query = mysqli_query($connection,$query);
while ($row = mysqli_fetch_Assoc($posts_query)) {
	$posts_id = $row['posts_id'];
	$posts_category_id = $row['posts_category_id'];
	$posts_title = $row['posts_title'];
	$posts_author = $row['posts_author'];
	$posts_date = $row['posts_date'];
	$posts_image = $row['posts_image'];
	$my_content = $row['my_content'];
	$posts_tag = $row['posts_tag'];
	$posts_comment_count = $row['posts_comment_count'];
	$posts_status = $row['posts_status'];
	# code...


	echo "<tr>";
echo "<td>$posts_id</td>";
echo "<td>$posts_category_id</td>";
echo "<td>$posts_title</td>";
echo "<td>$posts_author</td>";
echo "<td>$posts_date</td>";
echo "<td><img width = '50' src = '../assets/img/blog/$posts_image' alt = 'image'></td>";
echo "<td>$my_content</td>";
echo "<td>$posts_tag</td>";
echo "<td>$posts_comment_count</td>";
echo "<td>$posts_status</td>";
echo "<td><a href ='posts.php?source=Edit_Posts&p_id={$posts_id}'>Edit</a></td>";
echo "<td><a href = 'posts.php?Delete={$posts_id}'>Delete</a></td>";
	echo "</tr>";
}

		?>

	</tbody>

</table>

<?php 
if (isset($_GET['Delete'])) {
	$the_posts_id = $_GET['Delete'];

	$query = "DELETE FROM posts WHERE posts_id = {$the_posts_id} ";
	$delete_query = mysqli_query($connection,$query);
	header("Location:posts.php");
	# code...

}
?>
