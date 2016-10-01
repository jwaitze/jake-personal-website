<?php

  if (!isset($page_name)) { // redirect to subdirectory if visited directly
    header("Location: ../login");
    exit();
  }

  date_default_timezone_set('EST');

  // submits which are exclusive to logged in users
  if ($logged_in) {
    if (isset($_GET['delete'])) {

      if (DeletePostByURLKey($mysqli, $_GET['delete']))
        $notice_to_display = '<p>Successfully deleted blog post.</p>';
      else
        $notice_to_display = '<p>Failed to delete blog post.</p>';

    } else if (isset($_GET['edit'])) {

      $postrow = GetAllPostDataByUrlKey($mysqli, urldecode($_GET['edit']));
      if ($postrow['author'] == $logged_in_as) {
        $temp1     = urldecode($_GET['edit']);
        $temp2     = $postrow['title'];
        $temp3     = $postrow['content'];
        $temp4     = $postrow['author'];
        $page_name = "blogedit";
      }

    } else if (isset($_POST['update']) && isset($_POST['post'])) {

      $postrow = GetAllPostDataByUrlKey($mysqli, urldecode($_POST['post']));
      if ($postrow['author'] == $logged_in_as) {
        if (UpdateBlogPost($mysqli, urldecode($_POST['post']), $_POST['update'])) {
          $url_filepath      = "../blog/index.php?post=" . basename(urlencode($_POST['post']));
          $notice_to_display = '<p>Successfully updated blog post. It is available at <a class="textUnderline" href="$url_filepath" target="_blank">this link</a>.</p>';
        } else
          $notice_to_display = '<p>Failed to update blog post.</p>';
      }

    } else if (isset($_POST['title']) && isset($_POST['content'])) {

      $urlkey = date("Y-m-d_") . str_replace(' ', '-', $_POST['title']);
      if (!InsertBlogPost($mysqli, $_POST['title'], $urlkey, $_POST['content'], $logged_in_as)) {
        $notice_to_display = '<p>Failed to make blog post.</p>';
        return;
      }

      $url_filepath      = "../blog/index.php?post=" . basename(urlencode($urlkey));
      $notice_to_display = '<p>Successfully made blog post. It is available at <a href="' . $url_filepath . '" target="_blank">this link</a>.</p>';
    }
  }

?>
