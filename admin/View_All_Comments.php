<div class="col-xs-12"></div>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
		<th>Id</th>
        <th>Author</th>
        <th>Comment</th>
        <th>Email</th>
        <th>Status</th>
        <th>In respone to</th>
        <th>Date</th>
        <th>Approve</th>
        <th>Unapprove</th>
        <th>Delete</th>
		</tr>
	</thead>

	<tbody>
		<?php

$query = "SELECT * FROM comments ";
$comments_query = mysqli_query($connection,$query);
while ($row = mysqli_fetch_Assoc($comments_query)) {
    $comments_id = $row['comments_id'];
    $comments_author = $row['comments_author'];
    $comments_posts_id = $row['comments_posts_id'];
    
    $comments_content = $row['comments_content'];
    $comments_email = $row['comments_email'];
    $comments_status = $row['comments_status'];
    $comments_date = $row['comments_date'];



	echo "<tr>";
 	echo "<td>{$comments_id}</td>";
    echo "<td>{$comments_author}</td>";
    echo "<td>{$comments_content}</td>";
    echo "<td>{$comments_email}</td>";
    
    echo "<td>{$comments_status}</td>";

    $query = "SELECT * FROM posts WHERE posts_id = '{$comments_posts_id}' ";
    $title_query = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($title_query)) {
        $posts_id = $row['posts_id'];
        $posts_title = $row['posts_title'];

        echo "<td><a href= './blog.php?p_id=$posts_id'></a>$posts_title</td>";
    }

    echo "<td>{$comments_date}</td>";
    echo "<td><a href ='comments.php?Approve=$comments_id'>Approve</a></td>";
    echo "<td><a href ='comments.php?Unapprove=$comments_id' >Unapprove</a></td>";
    echo "<td><a href ='comments.php?Delete=$comments_id'>Delete</a></td>";

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


if (isset($_GET['Approve'])) {
	$the_comments_id = $_GET['Approve'];

	$query = "UPDATE comments SET comments_status = 'Approved' WHERE comments_id = $the_comments_id ";
	$update_query = mysqli_query($connection,$query);
	header("Location:comments.php");
	# code...
}
?>
