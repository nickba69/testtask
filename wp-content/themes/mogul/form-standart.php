 	<!-- Standart form to add review, contact or book appointment -->
    <form method = "post" action="<?=get_permalink();?>">
        <input type="text" name="namee">
        <input type="email" name="email">
        <input type="text" name="number">
        <textarea type="textarea" name="cont"></textarea>

        <input type="submit" name="<?= $inserted_post_type?>">
    </form>