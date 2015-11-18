<?php
require("classes/dbutils.php");
$pageTitle = "Forum";
require("header.php");
?>

<?php
if (isset($_GET["topicID"])) {
    if (isset($_GET["threadID"])) {
        if (isset($_GET["postID"])) {
            
        } else {
            ?>



            <table class="tableCenter">
                <tr class="topRow">
                    <td class="topicCell">
                        Posted by
                    </td>
                    <td class="latestThCell">
                        Content
                    </td>
                    <td class="threadsCountCell">

                    </td>
                    <td class="postsCountCell">
                        
                    </td>
                </tr>



                <?php
                $sql = "SELECT postID, FK_threadID, email, displayName, post.timeS, content FROM post LEFT JOIN user ON post.FK_userID = user.userID WHERE FK_threadID = " . $_GET["threadID"] . ";";
                $db = new DbUtilities;
                $collectionList = $db->getDataset($sql);
                foreach ($collectionList as &$row) {


                    if ($style == 0) {
                        echo('<tr class="rowStyle1">');
                        $style = 1;
                    } else {
                        echo('<tr class="rowStyle2">');
                        $style = 0;
                    }
                    echo('<td>');
                    echo('<a class="forumLink" href="#">' . $row["displayName"] . '</a>');
                    echo('</td>');
                    echo('<td>');
                    echo($row["content"]);
                    echo('</td>');
                    echo('<td>');
                    echo("");
                    echo('</td>');
                    echo('<td>');
                    echo("");
                    echo('</td>');
                    echo('</tr>');
                }
            }
        } else {
            ?>

            <table class="tableCenter">
                <tr class="topRow">
                    <td class="topicCell">
                        Thread
                    </td>
                    <td class="latestThCell">
                        Description
                    </td>
                    <td class="threadsCountCell">

                    </td>
                    <td class="postsCountCell">
                        Posts
                    </td>
                </tr>



                <?php
                $sql = "SELECT * FROM thread WHERE FK_topicID=" . $_GET["topicID"] . ";";
                $db = new DbUtilities;
                $collectionList = $db->getDataset($sql);
                foreach ($collectionList as &$row) {


                    if ($style == 0) {
                        echo('<tr class="rowStyle1">');
                        $style = 1;
                    } else {
                        echo('<tr class="rowStyle2">');
                        $style = 0;
                    }
                    echo('<td>');
                    echo('<a class="forumLink" href="' . 'forumGUI.php?topicID=' . $row["topicID"] . '&threadID=' . $row["threadID"] . '">' . $row["header"] . '</a>');
                    echo('</td>');
                    echo('<td>');
                    echo($row["description"]);
                    echo('</td>');
                    echo('<td>');
                    echo("");
                    echo('</td>');
                    echo('<td>');
                    echo("");
                    echo('</td>');
                    echo('</tr>');
                }
            }
        } else {
            ?>

            <table class="tableCenter">
                <tr class="topRow">
                    <td class="topicCell">
                        Topic
                    </td>
                    <td class="latestThCell">
                        Description
                    </td>
                    <td class="threadsCountCell">
                        Threads
                    </td>
                    <td class="postsCountCell">
                        Posts
                    </td>
                </tr>

                <?php
                $threadArray = array();
                $postArray = array();
                $threadCount = 0;
                $postCountArray;
                $style = 0;

                $sql = "SELECT * FROM topic";
                $db = new DbUtilities;
                $collectionList = $db->getDataset($sql);

                $newSql = "SELECT * FROM topic JOIN thread ON topic.topicID = thread.FK_topicID JOIN post on thread.threadID = post.FK_threadID;";
                $db2 = new DbUtilities;
                $tCollectionList = $db2->getDataset($newSql);
                foreach ($tCollectionList as &$row2) {
                    if (!in_array($row['threadID'], $threadArray)) { //returns the index of the first substring found. if no index then return -1
                        array_push($threadArray, $row['threadID']);
                        $threadCount += 1;
                    }
                }


                foreach ($collectionList as &$row) {
                    if ($style == 0) {
                        echo('<tr class="rowStyle1">');
                        $style = 1;
                    } else {
                        echo('<tr class="rowStyle2">');
                        $style = 0;
                    }
                    echo('<td>');
                    echo('<a class="forumLink" href="forumGUI.php?topicID=' . $row["topicID"] . '">' . $row["header"] . '</a>');
                    echo('</td>');
                    echo('<td>');
                    echo($row["description"]);
                    echo('</td>');
                    echo('<td>');
                    echo($threadCount);
                    echo('</td>');
                    echo('<td>');
                    echo("");
                    echo('</td>');
                    echo('</tr>');
                }
            }
            ?>
        </table>

        <?php
        require("footer.php");
        ?>