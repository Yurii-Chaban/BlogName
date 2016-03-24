<?php
if ($action = 'add'){
    $storage = "data.json";
    $data = json_decode($_POST['formdata'], true);
    $json = json_decode(file_get_contents($storage), true);
    $json['lastid'] = $data['id'];
    $json[$data['id']] = array(
        'text' => $data['text']
    );
    file_put_contents($storage, json_encode($json));
}
?>