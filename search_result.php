<?php 
include "./includes/header.php";
include "./includes/db.php"; 
global $connection;
?>
<body>

    <?php include("./includes/navigation.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php
                   if(isset($_POST['search'])){
                        $search =  $_POST['search'];
                        $query = "SELECT * FROM professionals WHERE (professional_name LIKE '%$search%' AND professional_status = 'Approved') LIMIT 20";
                        $search_query = mysqli_query($connection, $query);
                        echo "<h1>QUERY : \"$search\"</h1>";
                        if(!$search_query){
                            die("QUERY FAILED". mysqli_error($connection));
                        }
                        $count = mysqli_num_rows($search_query);
                        if($count == 0){
                            echo "<h1>NO RESULT</h1>";
                        }else{
                            while($row = mysqli_fetch_assoc($search_query)){
                ?>

                <!-- First Blog Post -->
                <h2>
                <a href="professional.php?prof_id=<?php echo $row['professional_id'] ?>"><?php echo $row['professional_name'] ?></a>
            </h2>
            <p class="lead">
                <!-- by <a href="index.php"><?php #echo $row['post_author'] ?></a> -->
                <h3 style="color:DeepPink;"><?php echo $row['professional_organization'] ?></h3>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $row['add_date'] ?></p>
            <hr>
            <img class="img-responsive" src="images/<?php echo $row['professional_image']; ?>" alt="<?php echo $row['professional_name']; ?>">
            <hr>
            <p><?php echo $row['professional_description'] ?></p>
            
            <hr/>
                <?php
                        }
                    }
                }else{
                    die("<h1>BAD QUERY</h1>");
                }
                ?>

            </div>

           <?php include "./includes/side_bar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>


        
<?php include "./includes/footer.php"; ?>