    <?php

        $conn = mysqli_connect('localhost', 'dumb', 'dumbways', 'dumb_library');

        if(!$conn){
            echo mysqli_connect_error();
        }
            if(isset($_POST['submit'])){
                if(empty($_POST['title'])){
                    echo "Please fill in the title";
                } else{
                    echo $_POST['title'];
                }

                if(empty($_POST['category'])){
                    echo "Please fill in the category";
                } else{
                    echo $_POST['category'];
                }

                if(empty($_POST['author'])){
                    echo "Please fill in the author";
                } else{
                    echo $_POST['author'];
                }

                if(empty($_POST['pubyear'])){
                    echo "Please fill in the publication year";
                } else{
                    echo $_POST['pubyear'];
                }

                $title = mysqli_real_escape_string($conn, $_POST['title']);
                $category = mysqli_real_escape_string($conn, $_POST['category']);
                $author = mysqli_real_escape_string($conn, $_POST['author']);
                $pubyear = mysqli_real_escape_string($conn, $_POST['pubyear']);

                $sql = "INSERT INTO book_tb(name, category,writer,publication_year) VALUES ('$title','$category','$author','$pubyear')";

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

            <div class="center"><input type="submit" value="Submit" name="submit" class="btn brand"></div>
        </form>
    </section>