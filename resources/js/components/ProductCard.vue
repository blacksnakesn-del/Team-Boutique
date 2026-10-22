<script setup>
import { Link } from "@inertiajs/vue3";
import { discountPercentage, effectivePrice, money } from "@/utils/domain";

const props = defineProps({
  products: {
    type: Array,
    required: true,
  },
});
</script>

<template>
  <section id="catalogue"> 
    <div class="section-heading">
      <div>
        <p class="overline">LA SÉLECTION D’AWA</p>
        <h2>Nos produits du moment</h2>
      </div>
      <a class="text-button" href="boutique.html">
        Tout le marché
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
          <path d="M5 12h14m-5-5 5 5-5 5"></path>
        </svg>
      </a>
    </div>
    <div v-if="props.products.length !== 0" class="product-grid">
      <article
        v-for="product in props.products"
        :key="product.id"
        class="product-card"
        data-component="ProductCard"
        :data-product-id="product.id"
      >
        <div class="product-media">
          <a aria-label="Voir Riz brisé parfumé" href="produits/01-riz.html">
            <img :alt="product.name" loading="lazy" :src="product.image" />
          </a>
          <span
            v-if="discountPercentage(product) > 0"
            class="promo-tag"
          >
           Promo -{{ discountPercentage(product) }} %
          </span>
        </div>
        <div class="product-body">
          <p class="overline">{{ product.origin }}</p>
          <h3>
            <Link :href="`/boutique`"> {{ product.name }} </Link>
          </h3>
          <p class="muted small">
            {{ product.unit }} · {{ product.stock }}
            {{ product.stock > 1 ? "disponibles" : "disponible" }}
          </p>
          <span
            class="stock"
            :class="{ empty: product.stock === 0, low: product.stock > 0 && product.stock < 5 }"
          >
            <span aria-hidden="true"> </span>
            {{ product.stock > 0 ? "Disponible" : "Épuisé" }}
          </span>
          <div class="product-bottom">
            <div>
              <del v-if="discountPercentage(product) > 0">
                {{ money(product.price) }}
              </del>
              <strong>{{ money(effectivePrice(product)) }}</strong>
            </div>
            <button
              aria-label="Ajouter Riz brisé parfumé au panier"
              class="add-button"
              data-action="ajouter-panier"
              type="button"
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
                <path d="M12 5v14M5 12h14"></path>
              </svg>
            </button>
          </div>
        </div>
      </article>
    </div>
    <div v-else>
        <p>Aucun produit n'est disponible!</p>
    </div>
  </section>
</template>
 