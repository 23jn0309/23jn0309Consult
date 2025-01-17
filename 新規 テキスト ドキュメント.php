<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 入力データを取得
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
    
    // CSVファイルに保存
    $file = 'inquiries.csv';
    $data = [$name, $email, $message, date('Y-m-d H:i:s')];
    
    $fileHandle = fopen($file, 'a');
    if ($fileHandle !== false) {
        fputcsv($fileHandle, $data);
        fclose($fileHandle);
    }

    // 完了メッセージを返す
    echo 'お問い合わせありがとうございました。内容を受け付けました。';
} else {
    echo '無効なリクエストです。';
}
?>
