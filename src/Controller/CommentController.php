<?php

namespace App\Controller;

use App\Model\Repository\CommentRepository;

class CommentController
{
    public function actionInsert($postId, $comment, $user_id)
    {
        $commentManager = new CommentRepository();

        $comments = $commentManager->insert($postId, $comment, $user_id);

        if (false === $comments) {
            throw new \Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post.show&id='.$postId);
        }
    }

    public function actionModify($commentId)
    {
        $commentManager = new CommentRepository();
        $comment = $commentManager->get($commentId);
        require '../src/View/comment.modify.php';
    }

    public function actionUpdate($commentId, $author, $comment)
    {
        $commentManager = new CommentRepository();
        $comment = $commentManager->update($commentId, $author, $comment);
        require '../src/View/comment.update.php';
    }

    public function actionDelete($commentId)
    {
        $commentManager = new CommentRepository();
        $comment = $commentManager->delete($commentId);
        require '../src/View/comment.delete.php';
    }

    public function actionShow()
    {
        $commentManager = new CommentRepository();
        $comments = $commentManager->getAllByStatus(1);
        require '../src/View/comment.admin.php';
    }

    public function actionValid($commentId)
    {
        $commentManager = new CommentRepository();
        $comment = $commentManager->updateStatus($commentId);
        header('Location: index.php?action=comment.admin');
    }
}
