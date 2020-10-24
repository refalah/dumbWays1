<?php 

        $conn = mysqli_connect('localhost', 'dumb', 'dumbways', 'dumb_library');

        if(!$conn){
            echo mysqli_connect_error();
        }

        if(isset($_POST['editbtn'])){
            
            $edit = mysqli_real_escape_string($conn, $_POST['edit']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $category = mysqli_real_escape_string($conn, $_POST['category']);
            $author = mysqli_real_escape_string($conn, $_POST['author']);
            $pubyear = mysqli_real_escape_string($conn, $_POST['pubyear']);

            
            $sql = "UPDATE book_tb(name, category,writer,publication_year) SET ('$title','$category','$author','$pubyear') WHERE id = $edit";

            if(mysqli_query($conn,$sql)){
                header('Location: 4.php');
            } else {
                echo mysqli_error($conn);
            }

           
           
        }

?>

<?php include('4header.php'); ?>

<section class="container grey-text white">
        <h4 class="center">Add a Book</h4>
        <form action="" method="post">
            <label>Title:</label>
            <input type="text" name="title">

            <label>Category:</label>
            <input type="text" name="category">

            <label>Author:</label>
            <input type="text" name="author">

            <label>Publication Year:</label>
            <input type="number" name="pubyear">

            <form action="4edit.php" method="POST">
                <input type="hidden" name="edit" value="<?php echo $books['id']; ?>">
                <input type="submit" value="Edit" name="editbtn" class="btn brand">
            </form>

            <!-- <div class="center">
                <input type="submit" value="Submit" name="submit" class="btn brand">
            </div> -->
        </form>
    </section>