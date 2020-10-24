<?php 

        $conn = mysqli_connect('localhost', 'dumb', 'dumbways', 'dumb_library');

        if(!$conn){
            echo mysqli_connect_error();
        }

        if(isset($_POST['delbtn'])){
            $delete = mysqli_real_escape_string($conn, $_POST['delete']);

            $sql = "DELETE FROM book_tb WHERE id = $delete";

            if(mysqli_query($conn, $sql)){
                header('Location: 4.php');
            }
        }

        if(isset($_GET['id'])){
            $id = mysqli_real_escape_string($conn, $_GET['id']);
            $sql = "SELECT * FROM book_tb WHERE id = $id";

            $result = mysqli_query($conn, $sql);
            $books = mysqli_fetch_assoc($result);

            mysqli_free_result($result);
            mysqli_close($conn);

        }

?>

<?php include('4header.php'); ?>

<div class="container center">
        <?php if($books): ?>
            <h4><?php echo $books['name']; ?></h4>
            <p><?php echo $books['writer']; ?></p>
            <p><?php echo $books['category']; ?></p>

            <form action="4detail.php" method="POST">
                <input type="hidden" name="delete" value="<?php echo $books['id']; ?>">
                <input type="submit" value="Delete" name="delbtn" class="btn brand">
            </form>

            <a href="4edit.php?id=<?php echo $books['id']; ?>" class="btn brand">Edit</a>

            

        <?php else: ?>
        <?php endif; ?>
</div>

<!-- <section class="container grey-text white">
    <h4 class="center">Details</h4>
</section> -->