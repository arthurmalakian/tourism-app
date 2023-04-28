<script setup>
import Modal from "@/Components/Modal.vue";
import { ref } from "vue";
import axios from "axios";
import { onMounted } from "vue";

defineProps({
  item: {
    type: Object,
  },
});

const openModal = ref(false);
const seats = ref(null);

const closeModal = () => {
  openModal.value = false;
};

const checkSeats = async (seatId) => {
  let response = await axios.get(route("api.seats", { id: seatId }));
  seats.value = response.data.data;
  openModal.value = true;
};
</script>
<template>
  <div
    class="w-full scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none max-w-sm w-full lg:max-w-full lg:flex"
  >
    <div class="text-truncate w-full">
      <div class="font-bold text-xl mb-2 text-white">
        {{ item.company.name }}
      </div>
      <div class="text-white text-md mb-2">
        <span class="font-bold">De:</span> {{ item.from.name }}
      </div>
      <div class="text-white text-md mb-2">
        <span class="font-bold">Para:</span> {{ item.to.name }}
      </div>
      <div class="text-green-500 text-md mb-2">
        R$ {{ item.price.price.toFixed(2).replace(".", ",") }}
      </div>
      <div class="text-white text-md mb-2">
        {{ item.availableSeats > 0 ? item.availableSeats : " &#128557 Não há" }}
        poltronas disponíveis
      </div>
      <div v-if="item.availableSeats > 0" class="text-white text-md mb-2">
        <button
          class="w-full shadow bg-red-700 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white text-sm uppercase font-bold py-2 px-4 rounded"
          @click="checkSeats(item.id)"
        >
          Ver Poltronas
        </button>
      </div>
    </div>
    <Modal :show="openModal" @close="closeModal">
        <div class="grid grid-cols-4 gap-4 justify-center py-5 px-5">
            <div v-for=" seat in seats" :key="seat.seat" class="p-6 bg-gray-900/50 bg-gradient-to-bl rounded-lg dark:shadow-none text-center text-bold text-lg" v-bind:class = "seat.occupied ? 'text-red-700':'text-green-900'"> Poltrona {{seat.seat}}</div>
        </div>
    </Modal>
  </div>
</template>
