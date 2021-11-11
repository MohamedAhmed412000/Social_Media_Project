<?php
if(isset($_POST['save'])) {
    $id = $_SESSION['userid'];
    $p_id = $post['id'];
    $sv = 1;
    $sql = "INSERT INTO saveshare (post_id,save) VALUES ($p_id,$sv) WHERE saveshare.user = $id";
    echo "<meta http-equiv='refresh' content='0'>";
    $s = $db->prepare($sql);
    $s->execute();
    header("Refresh:0");
}
if(isset($_POST['share'])) {
    $id = $_SESSION['userid'];
    $p_id = $post['id'];
    $sv = 1;
    $sql = "INSERT INTO saveshare (post_id,share) VALUES ($p_id,$sv) WHERE saveshare.user = $id";
    echo "<meta http-equiv='refresh' content='0'>";
    $s = $db->prepare($sql);
    $s->execute();
    header("Refresh:0");
}
if(isset($_POST['comm'])) {
    $id = $_SESSION['userid'];
    $p_id = $post['id'];
    $sql = "INSERT INTO comments (body,comment_time,comment_by,post_id) VALUES ($comm,NOW(),$id,$p_id)";
    echo "<meta http-equiv='refresh' content='0'>";
    $s = $db->prepare($sql);
    $s->execute();
    header("Refresh:0");
}
?>