<script setup>
import CategoryCard from '@/components/CategoryCard.vue';
import HeroBanner from '@/components/HeroBanner.vue';
import ProductCard from '@/components/ProductCard.vue';


const props = defineProps({
  categories:{
    type:Array,
    required:true
  },
  products: {
    type:Array,
    required:true,
  },
  isHome: {
    type:Boolean,
    default:true,
  },
  initialSearch: {
    type:String,
    default:'',
  },
  initialCategory:{
    type:String,
    default:'',
  }
})

</script>


<template>
  <div>
    <head>
      <meta charset="utf-8" />
      <meta content="width=device-width, initial-scale=1" name="viewport" />
      <meta
        content="Bienvenue chez Awa — maquette pédagogique Teranga Market, HTML et CSS sans JavaScript."
        name="description"
      />
      <title>Bienvenue chez Awa | Teranga Market</title>
      <link href="/logo.svg" rel="icon" type="image/svg+xml" />
      <link href="/css/styles.css" rel="stylesheet" />
      <link href="/css/template.css" rel="stylesheet" />
    </head>

    <!--
    TERANGA MARKET — TEMPLATE ÉTUDIANT — M. Aly Tall Niang
    Demandes associées : 01, 02, 05, 06, 07, 18, 19
    Aucune bibliothèque et aucun JavaScript n'est chargé.
    Les liens servent à visiter les maquettes. Les boutons data-action restent à programmer.
    Les commentaires DEMANDE et data-component indiquent les futurs composants Vue.
    -->
    <!-- DEMANDE 01 / 06 / 11 — À PROGRAMMER : Extraire AppHeader dans le layout. Remplacer les liens HTML par la navigation Vue Router. -->
    <a class="skip-link" href="#main-content"> Aller au contenu </a>
    <div class="topbar">
      Le marché du quartier, à votre rythme.
      <span> Castors · Dakar · Démonstration </span>
    </div>
    <header class="site-header" data-component="AppHeader">
      <div class="container header-inner">
        <a
          aria-label="Teranga Market — Accueil"
          class="brand"
          href="index.html"
        >
          <img alt="" height="42" src="/images/logo.svg" width="42" />
          <span>
            teranga
            <b> market. </b>
          </span>
        </a>
        <nav aria-label="Navigation principale">
          <a class="is-active" href="boutique.html"> Le marché </a>
          <a href="suivre.html"> Suivre ma commande </a>
          <a href="admin/index.html"> Espace Awa </a>
        </nav>
        <div class="header-actions">
          <a
            aria-label="Aperçu de la recherche"
            class="icon-button"
            href="#recherche-apercu"
          >
            <svg
              aria-hidden="true"
              class="icon"
              fill="none"
              height="20"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="1.7"
              viewbox="0 0 24 24"
              width="20"
            >
              <path d="m21 21-5-5M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0"></path>
            </svg>
          </a>
          <a
            aria-label="Voir la variante de thème"
            class="icon-button"
            href="exemples/theme-sombre.html"
          >
            <svg
              aria-hidden="true"
              class="icon"
              fill="none"
              height="20"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="1.7"
              viewbox="0 0 24 24"
              width="20"
            >
              <path d="M21 13A9 9 0 0 1 11 3a9 9 0 1 0 10 10Z"></path>
            </svg>
          </a>
          <a
            aria-label="Aperçu du panier, 4 unités"
            class="btn small-btn"
            href="#panier-apercu"
          >
            <svg
              aria-hidden="true"
              class="icon"
              fill="none"
              height="20"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="1.7"
              viewbox="0 0 24 24"
              width="20"
            >
              <path d="M6 7h12l2 14H4L6 7Zm3 0V5a3 3 0 0 1 6 0v2"></path>
            </svg>
            <span> Mon panier </span>
            <b class="cart-count"> 4 </b>
          </a>
        </div>
      </div>
    </header>
    <main id="main-content" tabindex="-1">
      <div class="container page-space">
        <!-- DEMANDE 01 — À PROGRAMMER : Lier le nom, le slogan, le logo et les images avec les données de la boutique. -->
        <HeroBanner 
          v-if="props.isHome"
          title="Teranga Market"
          slogan="Le marchee autrement"
          logo="/logo.svg"
        />
        <section class="categories-section">
          <div class="section-heading">
            <div>
              <p class="overline">À CHAQUE ENVIE, SON RAYON</p>
              <h2>De quoi se régaler</h2>
            </div>
          </div>
          <!-- DEMANDE 01 / 03 — À PROGRAMMER : Utiliser les catégories de l’API pour les images, la couleur CSS et le filtre. -->
        <CategoryCard :categories="props.categories" />
        </section>
        <ProductCard :products="props.products"/>
        <section class="loyalty-banner mt">
          <div>
            <p class="overline">LES PETITS GESTES QUI COMPTENT</p>
            <h2>Un panier généreux, une attention en plus.</h2>
            <p>
              5 % de réduction dès 25 000 FCFA. Avec TERANGA10, profitez de 10
              % : seule la meilleure remise est retenue.
            </p>
          </div>
          <span class="coupon">
            TERANGA10
            <small> Votre code de démonstration </small>
          </span>
        </section>
        <section class="promise-strip">
          <div>
            <svg
              aria-hidden="true"
              class="icon"
              fill="none"
              height="20"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="1.7"
              viewbox="0 0 24 24"
              width="20"
            >
              <path d="M6 7h12l2 14H4L6 7Zm3 0V5a3 3 0 0 1 6 0v2"></path>
            </svg>
            <strong> Votre marché, à votre rythme </strong>
            <span> Préparez votre panier depuis chez vous. </span>
          </div>
          <div>
            <svg
              aria-hidden="true"
              class="icon"
              fill="none"
              height="20"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="1.7"
              viewbox="0 0 24 24"
              width="20"
            >
              <path
                d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Zm-5 0a3 3 0 1 1-6 0 3 3 0 0 1 6 0"
              ></path>
            </svg>
            <strong> Au cœur du quartier </strong>
            <span> Retrait à Castors ou livraison à domicile. </span>
          </div>
          <div>
            <svg
              aria-hidden="true"
              class="icon"
              fill="none"
              height="20"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="1.7"
              viewbox="0 0 24 24"
              width="20"
            >
              <path d="M20 3C8 2 2 8 5 15s17 4 15-12ZM5 20l10-10"></path>
            </svg>
            <strong> Le plaisir de partager </strong>
            <span> Des essentiels et des saveurs bien de chez nous. </span>
          </div>
        </section>
        <p class="template-note">
          <svg
            aria-hidden="true"
            class="icon"
            fill="none"
            height="16"
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="1.7"
            viewbox="0 0 24 24"
            width="16"
          >
            <path d="m8 6-6 6 6 6m8-12 6 6-6 6M14 3l-4 18"></path>
          </svg>
          <span>
            Les données sont des exemples fixes. Les actions métier seront
            programmées par les étudiants.
          </span>
        </p>
      </div>
    </main>
    <footer class="container site-footer" data-component="AppFooter">
      <div>
        <strong>
          teranga
          <span> market. </span>
        </strong>
        <p>Une boutique de quartier. Toute la teranga.</p>
      </div>
      <div class="footer-links">
        <a href="sommaire.html"> Tous les écrans </a>
        <a href="guide.html"> Guide étudiant </a>
        <a href="exemples/composants.html"> Composants UI </a>
      </div>
      <p>
        Template HTML/CSS · Données fictives
        <br />
        M. Aly Tall Niang · Projet Vue 3
      </p>
    </footer>
    <!-- DEMANDE 06 — À PROGRAMMER : Extraire BaseDrawer : slots header/default/footer, prop open et événement close. Ce tiroir utilise uniquement la cible CSS. -->
    <section
      aria-labelledby="drawer-title"
      class="static-overlay drawer-overlay"
      id="panier-apercu"
      role="dialog"
      tabindex="-1"
    >
      <a aria-label="Fermer le panier" class="overlay-dismiss" href="#page-top">
      </a>
    </section>
    <!-- DEMANDE 18 — À PROGRAMMER : Extraire SearchDialog ; ouvrir/fermer avec Vue et appliquer v-focus après rendu. -->
    <section
      aria-labelledby="search-dialog-title"
      class="static-overlay modal-overlay"
      id="recherche-apercu"
      role="dialog"
      tabindex="-1"
    >
      <a
        aria-label="Fermer la recherche"
        class="overlay-dismiss"
        href="#page-top"
      >
      </a>
    </section>
  </div>
</template>