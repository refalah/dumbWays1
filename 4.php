<?php 
    $conn = mysqli_connect('localhost', 'dumb', 'dumbways', 'dumb_library');

    if(!$conn){
        echo mysqli_connect_error();
    }

    $sql = 'SELECT * FROM book_tb';
    $result = mysqli_query($conn, $sql);
    $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    mysqli_free_result($result);

    mysqli_close($conn);



?>

<?php include('4header.php'); ?>

    <h4 class="center grey-text">
        <div class="container">
            <div class="row">
                <?php foreach($books as $book){ ?>
                    <div class="col s6 md3">
                        <div class="card">
                            <div class="card-content">
                                <div><?php echo $book['name']; ?></div>
                                <h6><?php echo $book['category']; ?></h6>
                                <h6><?php echo $book['writer']; ?></h6>
                                <h6><?php echo $book['publication_year']; ?></h6>
                            </div>

                            <div class="card-action right-align">
                                <a href="4detail.php?id=<?php echo $book['id'] ?>" class="brand-text">Details</a>
                            </div>

                        </div>                    
                    </div>
                <?php } ?>

            </div>
        </div>
    </h4>

    
</body>
</html>