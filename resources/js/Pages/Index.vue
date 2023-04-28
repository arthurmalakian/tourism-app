<script setup>
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import TravelCard from "@/Components/TravelCard.vue";
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import { Head, Link } from "@inertiajs/vue3";
import { usePage } from '@inertiajs/vue3'

defineProps({
  stops: {
    type: Array,
  },
  travels: {
    type: Array,
  },
  laravelVersion: {
    type: String,
    required: true,
  },
  phpVersion: {
    type: String,
    required: true,
  },
});

const formatter = ref({
  date: "DD/MM/YYYY",
  month: "MMM",
});

const form = useForm({
  from: "",
  to: "",
  travelDate: "",
});

const searchTravels = () => {
  form.post(route("search"), {
    preserveScroll: true,
    onSuccess: console.log(usePage().props)
  });
};
</script>

<template>
  <Head title="Welcome" />

  <div
    class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
  >
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
      <div class="flex justify-center">
        <svg
          version="1.1"
          id="_x32_"
          xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink"
          viewBox="0 0 512 512"
          xml:space="preserve"
          fill="#FF2D20"
          height="75px"
          width="75px"
        >
          <g>
            <path
              class="st0"
              d="M430.337,231.065H81.674c-29.701,0-53.858,24.16-53.858,53.862v49.884v15.976l15.806,2.262
		c9.135,1.31,16.03,9.258,16.03,18.483c0,9.225-6.891,17.173-16.022,18.482l-15.814,2.262v15.978v49.892
		c0,29.693,24.157,53.854,53.858,53.854h348.663c29.701,0,53.862-24.161,53.862-53.854v-49.558V391l-17.571-0.822
		c-9.982-0.463-17.808-8.655-17.808-18.645c0-9.982,7.826-18.174,17.815-18.646l17.564-0.83v-17.58v-49.55
		C484.199,255.225,460.038,231.065,430.337,231.065z M465.765,334.477c-19.686,0.936-35.371,17.14-35.371,37.056
		c0,19.923,15.685,36.135,35.371,37.055v49.558c0,19.565-15.864,35.428-35.428,35.428H81.674c-19.569,0-35.432-15.863-35.432-35.428
		v-49.892c17.991-2.579,31.836-18.011,31.836-36.722c0-18.703-13.846-34.135-31.836-36.721v-49.884
		c0-19.573,15.863-35.436,35.432-35.436h348.663c19.564,0,35.428,15.863,35.428,35.436V334.477z"
            />
            <rect
              x="133.621"
              y="439.419"
              class="st0"
              width="12.19"
              height="31.8"
            />
            <rect
              x="133.621"
              y="383.564"
              class="st0"
              width="12.19"
              height="31.792"
            />
            <rect
              x="133.621"
              y="327.7"
              class="st0"
              width="12.19"
              height="31.8"
            />
            <rect
              x="133.621"
              y="271.846"
              class="st0"
              width="12.19"
              height="31.799"
            />
            <polygon
              class="st0"
              points="111.245,180.758 100.592,186.68 116.053,214.461 126.702,208.539 	"
            />
            <path
              class="st0"
              d="M497.524,179.025l-24.095-43.311l-8.558-15.36l-15.749,7.826c-8.948,4.442-19.768,1.09-24.617-7.639
		c-4.865-8.721-2.001-19.687,6.492-24.95l14.952-9.266l-8.558-15.368l-24.088-43.294C398.863,1.714,366.006-7.658,340.047,6.79
		L35.374,176.299c-25.955,14.44-35.318,47.305-20.878,73.256l0.875,1.578c3.27-6.394,7.43-12.243,12.324-17.409
		c-4.803-15.643,1.762-33.044,16.636-41.326l304.681-169.51c17.1-9.518,38.674-3.368,48.192,13.732l24.088,43.302
		c-16.751,10.38-22.575,32.182-12.895,49.582c9.681,17.401,31.271,23.942,48.925,15.172l24.095,43.312
		c7.273,13.056,5.337,28.692-3.571,39.601c4.776,3.961,8.989,8.558,12.65,13.569C505.4,224.524,508.979,199.615,497.524,179.025z"
            />
          </g>
        </svg>
      </div>
      <div class="mt-16">
        <div class="grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8">
          <div
            class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex"
          >
            <div>
              <h2
                class="text-xl font-semibold text-gray-900 dark:text-white uppercase"
              >
                Portal de Consulta de Passagens
              </h2>

              <p
                class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed"
              >
                Verifique a disponibilidade de passagens de ônibus
                intermunicipais.
              </p>
              <form @submit.prevent="submit" class="w-full mt-6">
                <datalist id="cities">
                  <option
                    v-for="item in stops"
                    :key="item.id"
                    :data-value="item.id"
                    :value="item.id"
                  >
                    {{ item.name }}
                  </option>
                </datalist>
                <div class="flex flex-wrap -mx-3 mb-2">
                  <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label
                      class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                      for="from"
                    >
                      De
                    </label>
                    <div class="relative">
                      <select
                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="from"
                        list="cities"
                        placeholder="Curitiba - PR"
                        v-model="form.from"
                      >
                        <option
                          v-for="item in stops"
                          :key="item.id"
                          :data-value="item.id"
                          :value="item.id"
                        >
                          {{ item.name }}
                        </option>
                      </select>
                      <p
                        class="text-red-500 text-xs italic mt-2"
                        v-if="form.errors.from"
                      >
                        {{ form.errors.from }}
                      </p>
                    </div>
                  </div>
                  <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label
                      class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                      for="to"
                    >
                      Para
                    </label>
                    <div class="relative">
                      <select
                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="to"
                        list="cities"
                        placeholder="São Paulo - SP"
                        v-model="form.to"
                      >
                        <option
                          v-for="item in stops"
                          :key="item.id"
                          :data-value="item.id"
                          :value="item.id"
                        >
                          {{ item.name }}
                        </option>
                      </select>
                      <p
                        class="text-red-500 text-xs italic mt-2"
                        v-if="form.errors.to"
                      >
                        {{ form.errors.to }}
                      </p>
                    </div>
                  </div>
                  <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label
                      class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                      for="travelDate"
                    >
                      Data
                    </label>
                    <div class="relative">
                      <vue-tailwind-datepicker
                        id="travelDate"
                        i18n="pt-BR"
                        as-single
                        :formatter="formatter"
                        v-model="form.travelDate"
                        input-classes="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                      />
                      <p
                        class="text-red-500 text-xs italic mt-2"
                        v-if="form.errors.travelDate"
                      >
                        {{ form.errors.travelDate }}
                      </p>
                    </div>
                  </div>
                </div>
                <div
                  class="flex flex-wrap -mx-3 mb-2 justify-end items-center mt-10"
                >
                  <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <div class="relative">
                      <button
                        class="w-full shadow bg-red-700 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white text-sm uppercase font-bold py-2 px-4 rounded"
                        type="button"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="searchTravels"
                      >
                        Procurar viagem
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-16">
        <div class="grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-10">
          <TravelCard v-for=" item in usePage().props?.flash?.travels?.travels" :key="item" :item="item" />
        </div>
      </div>
      <div
        class="flex justify-center mt-16 px-6 sm:items-center sm:justify-between"
      >
        <div
          class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0"
        >
          Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
        </div>
      </div>
    </div>
  </div>
</template>

<style>
.bg-dots-darker {
  background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
  .dark\:bg-dots-lighter {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
  }
}
</style>
