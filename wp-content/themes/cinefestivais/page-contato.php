<?php
	require_once('header.php');

	if( have_posts() ) 
	{
		while( have_posts() ) 
		{
			the_post(); 
?>

<header class="post-header full bg-img bg-contato"></header>

<article class="content">
    <section class="content-card">
        <h1 class="content-card--title">
			Contato
		</h1>

        <form action="" class="form content-container">

            <div class="form-group w45">
                <label for="name" class="form-group--label">Nome</label>
                <input class="form-group--input" type="text" name="name" id="name">
            </div>

            <div class="form-group w45">
                <label for="email" class="form-group--label">E-mail</label>
                <input class="form-group--input" type="email" name="email" id="email">
            </div>

            <div class="form-group">
                <label for="assunto" class="form-group--label">Assunto</label>
                <input class="form-group--input" type="text" name="assunto" id="assunto">
            </div>

            <div class="form-group">
                <label for="mensagem" class="form-group--label">Mensagem</label>
                <textarea class="form-group--input" name="mensagem" id="mensagem" cols="30" rows="10"></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary btn-small">Enviar</button>  
            </div>

        </form>
    </section>

</article>

<?php 
    include 'templates/newsletter.php';
		}
	} 
	require_once('footer.php');
?>