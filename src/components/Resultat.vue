<template>
  <section class="main">
    <div class="back-date">
      <div class="station">
        <h2>Nom de la station</h2>
      </div>
      <div class="test">
        <h2>Date de l'épreuve</h2>
      </div>
    </div>

    <div class="category">
      <div>
        <h3>Photo</h3>
        <img src="<?= $affichage->getPhoto() ?>" alt="" />
      </div>
      <span>|</span>
      <h3>Nom</h3>
      <span>|</span>
      <h3>Prénom</h3>
      <span>|</span>
      <h3>Catégorie</h3>
      <span>|</span>
      <h3>Dossard</h3>
      <span>|</span>
      <h3>Temps</h3>
      <span>|</span>
      <h3>Classement</h3>

      <div class="participants">
        <img src="<?= $affichage->getPhoto() ?>" alt="" />
        <div class="participant"></div>
        <a
          href="<?= $router->generate('delete', array('id' => $affichage->getIdParticipants())); ?>"
          >Supprimer</a
        >
      </div>
    </div>
  </section>
</template>
