<?php $title = 'Modifier un commentaire'; ?>

<?php ob_start(); ?>
<h1>Modifier un commentaire</h1>
<form action="?action=comment.update&id=<?php echo $comment->id; ?>" method='post'>
    <textarea name="comment" cols="30" rows="10"><?php echo $comment->comment; ?></textarea><br>
    <input type="submit" value="Envoyer">
</form>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php';
