
import { defineStore } from 'pinia';

export const useMainStore = defineStore('main', {
  state: () => ({

    products: []
  }),
  actions: {

    addProduct(product) {
      this.products.push(product);
    }
  },
  getters: {

    productCount: (state) => state.products.length
  }
});
