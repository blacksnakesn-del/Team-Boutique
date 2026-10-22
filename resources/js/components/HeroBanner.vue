<script setup>

const props = defineProps(
    {
        title:{
        type:String,
        },
        logo:{
            type:String
        },
        slogan:{
            type:String
        }
    }
);
    

</script>

<template>

    <div>
        <section class="hero">
          <div class="hero-copy">
            <p class="eyebrow">
              <span> </span>
              {{ title }}
            </p>
            <h1>
               {{ slogan }}
              <br />
              <em> À portée de main. </em>
            </h1>
            <p>
              Du riz pour le ceebu jën, du bissap à partager… Retrouvez vos
              essentiels chez Awa, avec toute la teranga.
            </p>
            <a class="btn" href="boutique.html">
              Faire mon marché
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
                <path d="M5 12h14m-5-5 5 5-5 5"></path>
              </svg>
            </a>
            <div class="hero-proof">
              <span>
                <svg
                  aria-hidden="true"
                  class="icon"
                  fill="none"
                  height="15"
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="1.7"
                  viewbox="0 0 24 24"
                  width="15"
                >
                  <path d="M20 3C8 2 2 8 5 15s17 4 15-12ZM5 20l10-10"></path>
                </svg>
                Une sélection de proximité
              </span>
              <span>
                <svg
                  aria-hidden="true"
                  class="icon"
                  fill="none"
                  height="15"
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="1.7"
                  viewbox="0 0 24 24"
                  width="15"
                >
                  <path
                    d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Zm-5 0a3 3 0 1 1-6 0 3 3 0 0 1 6 0"
                  ></path>
                </svg>
                Castors, Dakar
              </span>
            </div>
          </div>
          <div aria-hidden="true" class="hero-art">
            <span class="hero-stamp">
              LE GOÛT
              <br />
              DU PARTAGE
            </span>
            <img
              alt=""
              class="hero-rice"
              height="280"
              src="/images/riz.svg"
              width="250"
            />
            <img
              alt=""
              class="hero-veg"
              height="205"
              src="/images/tomates.svg"
              width="205"
            />
            <div class="hero-note">
              Ñu bokk, ñu partage.
              <small> Un marché fait pour vous. </small>
            </div>
          </div>
        </section>
    </div>

</template>