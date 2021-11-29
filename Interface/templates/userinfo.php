<?php
include "top.php";
$user_data = check_login();
?>

<body>
  <div style="padding:20px;margin-top:30px;height:1500px;">
    <h1>Fixed Top Navigation Bar</h1>
    <h2>Scroll this page to see the effect</h2>
    <h2>The navigation bar will stay at the top of the page while scrolling</h2>

    <p>Some text some text some text some text..</p>
    <p>Some text some text some text some text..</p>
    <p>Some text some text some text some text..</p>
    <p>Some text some text some text some text..</p>
    <p>Some text some text some text some text..</p>
    <p>Some text some text some text some text..</p>
    <p>Some text some text some text some text..</p>
    <p>Some text some text some text some text..</p>
    <p>Some text some text some text some text..</p>
    <p>Some text some text some text some text..</p>
    <p>Some text some text some text some text..</p>
    <p>Some text some text some text some text..</p>
    <p>Some text some text some text some text..</p>
    <p>Some text some text some text some text..</p>
    <p>Some text some text some text some text..</p>
    <p>Some text some text some text some text..</p>
    <p>Some text some text some text some text..</p>
    <p>Some text some text some text some text..</p>
    <p>Some text some text some text some text..</p>
    <p>Some text some text some text some text..</p>
  </div>
  <p>
    <?php if (DEBUG) {
      print_r($user_data);
    }
    ?></p>
</body>