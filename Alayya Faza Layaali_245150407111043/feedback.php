<?php
require_once 'models/Feedback.php';

class FeedbackController
{
    public function showForm()
    {
        include 'views/feedback_form.php';
    }

    public function submit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nama' => $_POST['nama'],
                'kelas' => $_POST['kelas'],
                'nilai' => $_POST['nilai'],
                'komentar' => $_POST['komentar'],
                'mata_pelajaran' => $_POST['mata_pelajaran'],
            ];

            $model = new Feedback();
            if ($model->save($data)) {
                include 'views/feedback_success.php';
            } else {
                $error = "Gagal menyimpan feedback!";
                include 'views/feedback_form.php';
            }
        } else {
            header("Location: index.php?page=feedback");
        }
    }
}
