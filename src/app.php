<?php

use App\Controller\CommentController;
use App\Controller\HomeController;
use App\Controller\PostController;
use App\Controller\ContactController;
use App\Controller\UserController;


function getPostId()
{
    if (isset($_GET['id']) && $_GET['id'] > 0) {
        return $_GET['id'];
    } else {
        throw new Exception('Aucun identifiant de billet envoyé');
    }
}
function getPostTitle()
{
    if (isset($_POST['title']) && !empty($_POST['title'])) {
        return $_POST['title'];
    } else {
        throw new Exception('La saisie du titre est obligatoire');
    }
}
function getPostContent()
{
    if (isset($_POST['content']) && !empty($_POST['content'])) {
        return $_POST['content'];
    } else {
        throw new Exception('La saisie du contenu est obligatoire');
    }
}
function getCommentAuthor()
{
    if (isset($_POST['author']) && !empty($_POST['author'])) {
        return $_POST['author'];
    } else {
        throw new Exception('La saisie de l\'auteur est obligatoire');
    }
}
function getCommentId()
{
    if (isset($_GET['id']) && $_GET['id'] > 0) {
        return $_GET['id'];
    } else {
        throw new Exception('Aucun identifiant de commentaire envoyé');
    }
}
function getCommentContent()
{
    if (isset($_POST['comment']) && !empty($_POST['comment'])) {
        return $_POST['comment'];
    } else {
        throw new Exception('La saisie du commentaire est obligatoire');
    }
    function getUserEmail()
{
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        return $_POST['email'];
    } else {
        throw new Exception('La saisie de l\'email est obligatoire');
 
   }
   function getUserPassword()
{
    if (isset($_POST['password']) && !empty($_POST['password'])) {
        return $_POST['password'];
    } else {
        throw new Exception('La saisie du mot de passe est obligatoire');
    }
}
}

}  
    $action = $_GET['action'] ?? 'home';
    try {
        if ($action == 'post.list') {
            $controller = new PostController();
            $controller->actionList();
        } elseif ($action == 'post.show') {
            $controller = new PostController();
            $controller->actionShow(getPostId());
        } elseif ($action == 'post.modify') {
            $controller = new PostController();
            $controller->actionModify(getPostId());
        } elseif ($action == 'post.update') {
            $controller = new PostController();
            $controller->actionUpdate(getPostId(), getPostTitle(), getPostContent());
        } elseif ($action == 'comment.insert') {
            $controller = new CommentController();
            $controller->actionInsert(getPostId(), getCommentAuthor(), getCommentContent());
        } elseif ($action == 'home') {
            $controller = new HomeController();
            $controller->actionHome();
        } elseif ($action == 'post.delete') {
            $controller = new PostController();
            $controller->actionDelete(getPostId());
        } elseif ($action == 'post.create') {
            $controller = new PostController();
            $controller->actionCreate();
        } elseif ($action == 'post.insert') {
            $controller = new PostController();
            $controller->actionInsert(getPostTitle(), getPostContent());
        } elseif ($action == 'comment.modify') {
            $controller = new CommentController();
            $controller->actionModify(getCommentId());
        } elseif ($action == 'comment.update') {
            $controller = new CommentController();
            $controller->actionUpdate(getCommentId(), getCommentAuthor(), getCommentContent());
        } elseif ($action == 'comment.delete') {
            $controller = new CommentController();
            $controller->actionDelete(getCommentId());
        } elseif ($action == 'contact.submit') {
            $controller = new ContactController();
            $controller->actionSubmit();
        } elseif ($action == 'login.form') {
            $controller = new UserController();
            $controller->actionLoginForm();
        } elseif ($action == 'login.submit') {
            $controller = new UserController();
            $controller->actionLoginSubmit(getUserEmail(),getUserPassword()); 
        } else {
            throw new Exception('L\'action demandée n\'existe pas');
        }
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
