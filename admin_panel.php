<?php 
  $title = "Admin Panel";
  include '_HEADER/adm_header.php';

// including class.system.php
  include 'class.system.php';

// including page class.admin.php
   include 'class.admin.php';

// creating object of class.admin.php
   $admins = new Admin();
   $admins->logout();


// if any unauthorized access to this page redirect user
  // login page
  if (empty($admins->login(null,null))) {
    header("Location: admin_login.php");
  }

// creating object of class.system.php
  $view = new NewsAppSystem();
  
  // if the post is set, store user data in database
  if (isset($_POST['post'])) {

    $topic = $_POST['topic'];
    $author = $_POST['author'];
    $newsArticle = $_POST['article'];
    $newsCategory = $_POST['news_category'];
    $newsSummary = $_POST['summary'];

    // creating object of NewsAppSystem
    $post = new NewsAppSystem();
    $post->postNews($topic,$author,$newsArticle,$newsCategory,$newsSummary);
  }

  // for deleting News Post
  if (isset($_GET['delete']) && isset($_GET['id'])) {
    $admins->deletePost($_GET['id']);
    header('Location: admin_panel.php');
    exit();
  }

  // for deleting Subscribers
  if (isset($_GET['delete']) && isset($_GET['sub_id'])) {
    $admins->deleteSubscriber($_GET['sub_id']);
    header("Location: admin_panel.php");  
    exit();
  }

?>


<body>
<div class="container">
  <div class="panel panel-primary" style="margin: 80px auto 0px;" >
    <div class="panel-heading">
      <ul class="list-inline">
        <li><span><strong>Admin Panel</strong></span></li>
        <li class="right"><span class="glyphicon glyphicon-log-out"></span>
          <span id="logout">
            <a href="admin_panel.php?logout=<?php echo md5($admins->login(null,null));?>" style="color: white; text-decoration: none;">Logout</a>
          </span>
        </li>
        <li class="right"><span>Welcome</span>&nbsp;<span style="color: green;">&#9898;</span>
          <span id="on"><?php if (!empty($admins->login(null,null))): ?>
                <?php echo $admins->login(null,null); ?>
          <?php endif ?></span>
        </li>
      </ul>
    </div>
    <div class="panel-body">
      <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#post">View News</a></li>
    <li><a data-toggle="tab" href="#menu1">View Subscribers</a></li>
    <li><a data-toggle="tab" href="#menu2">Post Article</a></li>
  </ul>

  <div class="tab-content">
  <!--Beginning of View Posted News-->
    <div id="post" class="tab-pane fade in active">
      <h3>Posted News</h3>
      <div class="view-headers">
    <h4>News Record</h4>
  </div>

  <div class="view-form">
    
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Topic</th>
            <th>Author</th>
            <th>Article</th>
            <th>Category</th>
            <th>Post Date</th>
            <th>Post Time</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          foreach($view->getPost() as $post) {
              $view_post_id = $post['post_id'];
              $view_post_topic = stripslashes($post['post_topic']);
              $view_post_author = stripslashes($post['post_author']);
              $view_post_article = stripslashes($post['post_article']);
              $view_post_cat = $post['post_cat'];
              $view_post_date = $post['post_date'];
              $view_post_time = $post['post_time'];


              echo 
              "
              <tr>
                <td>$view_post_id</td>
                <td>$view_post_topic</td>
                <td>$view_post_author</td>
                <td>
                <a>
                  
                </a>
                </td>
                <td>$view_post_cat</td>
                <td>$view_post_date</td>
                <td>$view_post_time</td>
                <td>
                <a href=\"admin_panel.php?delete&id=$view_post_id\" class=\"btn btn-danger\">
                  <span class=\"glyphicon glyphicon-trash\" onclick=\"return delete();\"></span>
                  </a>
                </td>
              </tr>
              ";
            }
            ?>
         </tbody>
      </table>
    </div>
  </div>
    </div>
    <!--End of View Posted News-->


    <!--Beginning of View Subscribers-->
    <div id="menu1" class="tab-pane fade">
      <h3>Subscribers</h3>
      <div class="view-headers">
    <h4>Records of Subscribers</h4>
  </div>

  <div class="view-form">
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>News Category</th>
            <th>Post Date</th>
            <th>Post Time</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach ($view->getSubscribers() as $sub) {
              $view_sub_id = $sub['sub_id'];
              $view_sub_name = stripslashes($sub['sub_name']);
              $view_sub_email = stripslashes($sub['sub_email']);
              $view_sub_cat = stripslashes($sub['sub_cat']);
              $view_sub_date = $sub['sub_date'];
              $view_sub_time = $sub['sub_time'];


              echo "
              <tr>
                <td>$view_sub_id</td>
                <td>$view_sub_name</td>
                <td>$view_sub_email</td>
                <td>$view_sub_cat</td>
                <td>$view_sub_date</td>
                <td>$view_sub_time</td>
                <td>
                  <a href=\"admin_panel.php?delete&sub_id=$view_sub_id\" class=\"btn btn-danger\">
                  <span class=\"glyphicon glyphicon-trash\" onclick=\"return delete();\">
                  </span>
                  </a>
                </td>
              </tr>
              ";
            }
          //close mysqli connection
          mysqli_close($view->connect);
           ?>
        </tbody>
      </table>
    </div>
  </div>
    </div>
    <!--End of View Subscribers-->


    <!--Beginning of Post News-->
    <div id="menu2" class="tab-pane fade">
      <h3>Post News</h3>
      <div class="header">
    <h4>Post News</h4>
  </div>
  
  <form class="form" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

    <!-- display error Validation Message -->
    <?php include('posterror.php'); ?>
    
    <!-- validation success Message -->
    <?php if (isset($_SESSION['success_alert'])): ?>
      <div class=" alert alert-success">
        <p><?php echo $_SESSION['success_alert']; ?></p>
          <?php unset($_SESSION['success_alert']); ?>
      </div>
    <?php endif ?>
    
    <div class="input-groups">
      <label>Topic</label>
      <input type="text" name="topic" placeholder="Enter Topic">
    </div>
    <div class="input-groups">
      <label>Author</label>
      <input type="text" name="author" placeholder="Author" value="<?php echo $admins->login(null,null); ?>" >
    </div>
    <div class="input-groups">
      <label>Select News Category</label>
      <select name="news_category">
        <option value="none">(Select choice)</option>
        <option value="entertainment">Entertainment</option>
        <option value="gossips">Gossips</option>
        <option value="politics">Politics</option>
        <option value="sports">Sports</option>
        <option value="science_tech">Science&amp;Technology</option>
      </select>
    </div>
    <div class="input-groups">
      <label>Summary</label>
        <summary>
          <textarea class="form-control" name="summary" rows="2" placeholder="Enter summary"></textarea>
        </summary>
    </div>
    <div class="input-groups form-group">
      <label>News Article</label>
      <textarea class="form-control" name="article" rows="5" placeholder="Enter article" id="myTextarea"></textarea>
    </div>
    <div class="input-groups">
      <button type="submit" name="post" class="btnos">Post</button>
    </div>
  </form>
  </div>
  <!--End of Post News-->


  </div>
    </div>
    <div class="panel-footer" style="background: #337ab7; color: #ddd;">
      <center>Designed by Dexterous</center>
      </div>
  </div>
</div>
</body>
</html>
